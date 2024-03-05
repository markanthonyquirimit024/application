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
                                            Edit Profile
                                        </div>
                                        <div class="col-md-6">
                                                <a href="{{route('customer.profile')}}" class="btn btn-info pull-right">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                            <form class="form-horizontal" wire:submit.prevent="updateProfile">
                                            <div class="form-group">
                                                    <label for="name" class="control-label col-md-3">Name:</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="name" wire:model="name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="control-label col-md-3">Email:</label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control" name="email" wire:model="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="control-label col-md-3">Phone:</label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control" name="phone" wire:model="phone">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success pull-right" >Update Profile</button>
                                            </form>
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
