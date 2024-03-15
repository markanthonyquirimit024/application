<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>


    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Service 
                                        </div>
                                        <div class="col-md-6">
                                        <a href="{{route('admin.add_service')}}" class="btn btn-info pull-right">Add New</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">category</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->id}}</td>
                                            <td><img src="{{asset('/images/services')}}/{{$service->image}}" style="width:60px; height:auto"/> </td>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->price}}</td>
                                            <td>
                                                @if($service->status)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>
                                                @if($service->featured)
                                                Yes
                                                @else
                                                No
                                                @endif
                                            </td>
                                            <td>{{$service->category->name}}</td>
                                            <td>{{$service->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.edit_service', ['service_slug' => $service->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                <a href="#" onclick="confirm('Are you sure you want to delete this service?') || event.stopImmediatePropagation()"  wire:click.prevent="deleteService({{$service->id}})"  style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $services->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
