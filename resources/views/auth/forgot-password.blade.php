<x-base-layout>
    <div class="section-title-01 honmob border-bottom">
        <div><img src="{{ asset('images/bg.jpg') }}" style="width: 100%;"/></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Forgot Password</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Forgot Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="content-central">
        <div class="content_info border-top border-bottom">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-xs-12 col-sm-3 col-md-3 profile1"></div>

                        <div class="col-xs-12 col-sm-6 col-md-6 profile1" style="min-height: 300px; border: 1px solid black;border-radius:10px; padding: 15px; margin-bottom: 20px;">
                            <div class="thinborder-ontop">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <h3>Forgot Password</h3>
                                <x-validation-errors class="mb-4" />
                                <form id="userloginform" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="" required autofocus autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-primary pull-right">Forgot Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 profile1"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-twitter border-top">
            <i class="fa fa-twitter icon-big"></i>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-base-layout>
