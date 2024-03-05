<div>

    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-8 col-md-offset-2 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Profile
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-md-4">
                                            <img src="{{asset('images/customers/default.jpg')}}" width="100%" />
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Name: {{Auth::user()->name}}</h3>
                                            <p><b>Email: </b>{{Auth::user()->email}}</p>                                            
                                            <p><b>Phone: </b>{{Auth::user()->phone}}</p>
                                            <a href="{{ route('customer.edit_profile', ['id' => Auth::user()->id]) }}" class="btn btn-info pull-right">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


