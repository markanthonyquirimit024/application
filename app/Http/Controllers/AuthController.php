<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ServiceProvider;
use App\Models\User;
use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\PasswordReset;
use App\Notifications\PasswordResetNotification;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Password;


class AuthController extends Controller
{
    use PasswordValidationRules;

    public function index()
{
    $adminauth = Auth::user();

    if ($adminauth && $adminauth->utype === 'ADM') {
        $users = User::all();
        return Response::json($users);
    } else {
        return Response::json(['error' => 'Unauthorized'], 401);
    }
}

    public function login(Request $request)
    {
        $input = $request->all();

        if (!isset($input['email']) || !isset($input['password'])) {
            return Response::json(['error' => 'email and password are required'], 422);
        }

        $user = User::where('email', $input['email'])->first();

        if (!$user || !Hash::check($input['password'], $user->password)) {
            return Response::json(['error' => 'Invalid Credentials'], 401);
        }

        $token = $user->createToken('sanctum-token')->plainTextToken;

        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];

        return Response::json($response, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => 'required|numeric|min:11',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            //added admin value for accessing the admin panel. 
            //after creating an admin then redeploy again to unable access creating admin value
            'registeras' => ['required', 'in:CST,ADM'],
        ]);

        if ($validator->fails()) {
            return Response::json(['success' => false, 'error' => $validator->errors()], 422);
        }

        $registeras = $input['registeras'];

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'utype' => $registeras,
        ]);

        $token = $user->createToken('sanctum-token')->plainTextToken;

        return Response::json(['success' => true, 'user' => $user, 'token' => $token]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();

            return Response::json(['message' => 'Logged out successfully'], 200);
        } else {
            return Response::json(['error' => 'Unauthorized', 'message' => 'User not authenticated'], 401);
        }
    }

    public function sproviderLogout(Request $request)
    {
        $user = $request->user();

        if ($user && $user->utype === 'SVP') {
            $user->tokens()->delete();

            return Response::json(['message' => 'Service Provider logged out successfully'], 200);
        } else {
            return Response::json(['error' => 'Unauthorized', 'message' => 'Service Provider not authenticated'], 401);
        }
    }

    public function adminLogout(Request $request)
    {
        $user = $request->user();

        if ($user && $user->utype === 'ADM') {
            $user->tokens()->delete();

            return Response::json(['message' => 'Admin logged out successfully'], 200);
        } else {
            return Response::json(['error' => 'Unauthorized', 'message' => 'Admin not authenticated'], 401);
        }
    }

    public function forgot(ForgotPasswordRequest $request){
        $validatedData = $request->validated(); 
    
        $user = User::where('email', $validatedData['email'])->first();
        if (!$user || !$user->email) {
            return response()->error('No Record Found', 'Incorrect Email Address Provided', 404);
        }
    
        $resetPasswordToken = str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);
    
        if (!$userPassReset = PasswordReset::where('email', $user->email)->first()) {
            PasswordReset::create([
                'email' => $user->email,
                'token' => $resetPasswordToken,
            ]);
        } else {
            $userPassReset->update([
                'email' => $user->email,
                'token' => $resetPasswordToken,
            ]);
        }
    
        $user->notify(
            new PasswordResetNotification($resetPasswordToken)
        );
    
        return response()->json(['message' => 'A code has been sent to your email address']);
    }

    public function reset(ResetPasswordRequest $request){
        $attributes = $request->validated();

        $user = User::where('email', $attributes['email'])->first();


        if(!$user){
            return response()->error('No Record Found', 'Incorrect Email Adress Provided', 404);
        }

        $resetRequest = PasswordReset::where('email', $user->email)->first();

        if(!$resetRequest || $resetRequest->token !== $request->token){
            return response()->error('An Error Occured', 'Please Try Again','Token Mismatch', 404);
        }

        $user->fill([
            'password' => Hash::make($attributes['password']),
        ]);
        $user->save();

        $user->tokens()->delete();

        $resetRequest->delete();

        $token = $user->createToken('sanctum-token')->plainTextToken;

        $loginResponse = [
            'user'  => new UserResource($user),
            'token' => $token,
        ];

            return response()->json($loginResponse, 201);
    }
}
