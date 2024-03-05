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
                            <h3>User Info</h3>
                            <x-validation-errors class="mb-4"/>
                            <form id="userregistrationform" method="POST" action="{{route('register')}}">
                                @csrf
                                <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="" required="" autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="" required="">
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
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control" name="phone" value="" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Register As</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="registeras" id="registeras">
                                                <option value="CST">Customer</option>
                                                <option value="SVP">Service Provider</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">   
                                        <div class="col-md-10">
                                            <span style="font-size: 14px;">If you have already registered <a
                                                    href="{{route('login')}}" title="Login">click here</a> to login</span>
                                            <button type="submit" class="btn pull-right" style="color:#1c0d06; background-color:#dd6737">Register</button>
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
