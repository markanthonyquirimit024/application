<div>

        <section class="content-central">
            <div class="container">
                <div class="row" style="margin-top: -30px;">
                    <div class="titles">
                        <h2>{{$scategory->name}} <span>Services</span></h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div class="content_info" style="margin-top: -70px;">
                <div>
                    <div class="container">
                        <div class="portfolioContainer">
                            @if($scategory->services->count() > 0)
                            @foreach($scategory->services as $service)
                            <div class="col-xs-6 col-sm-4 col-md-3 nature hsgrids"
                                style="padding-right: 5px;padding-left: 5px;">
                                <a class="g-list" href="{{route('home.services_details', ['service_slug' => $service->slug])}}">
                                    <div class="img-hover">
                                        <img src="{{ asset('images/categories') }}/{{ $service->image }}" alt="{{$service->name}}"
                                            class="img-responsive">
                                    </div>
                                    <div class="info-gallery">
                                        <h3>{{$service->name}}</h3>
                                        <hr class="separator">
                                        <p>{{$service->tagline}}</p>
                                        <div class="content-btn"><a href="{{route('home.services_details', ['service_slug' => $service->slug])}}"
                                                class="btn" style="background-color:#dd6737;color:black">Book Now</a></div>
                                        <div class="price"><span>&#36;</span><b>From</b>{{$service->price}}</div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-12"><p class="text-center">There is any services.</p></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>            
        </section>
</div>
