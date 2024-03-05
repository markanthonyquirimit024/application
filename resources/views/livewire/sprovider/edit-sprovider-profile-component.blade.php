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
                                                <a href="{{route('sprovider.profile')}}" class="btn btn-info pull-right">View Profile</a>
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
                                                    <label for="newimage" class="control-label col-md-3">Profile Image:</label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="form-control-file" name="newimage" wire:model="newimage">
                                                        @if($newimage)
                                                            <img src="{{ $newimage->temporaryUrl() }}" width="220" />
                                                        @elseif ($newimage)
                                                            <img src="{{ asset('images/sproviders') }}" width="220" />
                                                        @else
                                                            <img src="{{ asset('images/sproviders/default.jpg') }}" width="220" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="about" class="control-label col-md-3">About:</label>
                                                    <div class="col-md-9">
                                                        <textarea type="text" class="form-control" name="about" wire:model="about"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="service_category_id" class="control-label col-md-3">Service Category:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="service_category_id" wire:model="service_category_id">
                                                            @foreach($scategories as $scategory)
                                                                <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="service_locations" class="control-label col-md-3">Service Location:</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="service_locations" wire:model="service_locations" required>
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
