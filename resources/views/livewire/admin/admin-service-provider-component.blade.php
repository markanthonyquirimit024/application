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
                                            All Service Providers
                                        </div>
                                        <div class="col-md-6">

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
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Service Locations</th>
                                        <th scope="col">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sproviders as $sprovider)
                                        <tr>
                                            <td>{{$sprovider->id}}</td>
                                            <td>{{$sprovider->user->name}}</td>
                                            <td>{{$sprovider->user->email}}</td>
                                            <td>{{$sprovider->user->phone}}</td>
                                            <td>{{$sprovider->service_locations}}</td>
                                            <td>
                                                <a href="#" onclick="confirm('Are you sure you want to delete this Provider?') || event.stopImmediatePropagation()"  wire:click.prevent="deleteServiceprovider({{$sprovider->id}})"  style="margin-left: 10px;"><i class="fa fa-times text-danger btn btn-danger">Delete Account</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $sproviders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
