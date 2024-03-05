<x-base-layout>
    <section class="content-central">
        <div class="semiboxshadow text-center"></div>
        <div class="content_info">
            <div class="paddings-mini" style="background-color: black; display: flex; align-items: center;">

                <!-- Logo -->
                <div>
                    <img src="{{asset('images/logo.png')}}" style="max-width: 400px; height: auto;margin-left:100px">
                </div>

                <!-- Form Container -->
                <div class="container" style="margin-left: 20px;">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 profile1" style="background-color: black;">
                        <div class="thinborder-ontop" style="background-color: white; padding: 20px; width:450px">
                            <h3>Login Info</h3>
                            <x-validation-errors class="mb-4"/>
                            <form id="userloginform" method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="form-group row">
                                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="" required="" autofocus="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">Password</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id="remember_me" name="remember"> Remember Me </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn pull-right" style="color:#1c0d06; background-color:#dd6737">Login</button>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-10">
                                                <a class="" href="{{route('password.request')}}">Forgot Your Password?</a>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-10">
                                                <center><p>Don't have an account?<a href="{{route('register')}}"> Click here </a>to Signup</p></center>
                                            </div>
                                        </div>
                                        
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
</x-base-layout>
