<div style="background-color: black;">
<link rel="stylesheet" href="{{asset('assets/services.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>


<div class="content-section-2" >
    <h1 style="color: white; margin-top:300px">Service Categories</h1>
</div>

<div class="filter-title">
    <div class="title-header">
        <h2 style="color:#fff;">BOOK A SERVICE</h2>
        <p class="lead">Book a service at a very affordable price.</p>
    </div>
    <div class="filter-header">
        <form id="sform" action="{{route('searchService')}}" method="post">
            @csrf
            <input type="text" id="q" name="q" required="required" placeholder="What Services do you want?"
                class="input-large typeahead" autocomplete="off">
            <input type="submit" name="submit" value="Search">
        </form>
    </div>
</div>

<div class="slick-carousel">
    <div class="slick-slider">
        @foreach($scategories as $scategory)
            <div class="slick-frame" data-href="{{ $scategory->url }}">
                <a href="{{ route('home.services_by_category', ['category_slug' => $scategory->slug]) }}">
                    <img src="{{ asset('images/categories') }}/{{ $scategory->image }}" alt="{{ $scategory->name }}" style="width:70rem; height:8rem">
                    <div class="description" style="position: absolute; bottom: 35%; left: 10%;">
                        <p>{{$scategory->name}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>


<div style="color:white; text-align:center; font-size:40px; margin-top:150px;margin-bottom:50px">AYS Services</div>

<div class="table-grid">
    <!-- Table 1 -->
    @if($services)
        @foreach($services as $service)
            <div class="table">
            <a class="g-list" href="{{route('home.services_details', ['service_slug' => $service->slug])}}">
                <div class="img-hover">
                    <img src="{{asset('images/services')}}/{{$service->image}}" 
                    alt="{{ $service->name }}" class="img-responsive">
                </div>
                <div class="title">{{ $service->name }}</div>
                <div class="description2">{{ $service->description }}</div>
                <br><br>
                <div class="price">₱{{ $service->price }}</div>
            </a>
                @if(auth()->check())
                    @if(auth()->user()->utype == 'CST')
                        <button class="btn" style="background-color:#dd6737;color:black" onclick="togglePopup()">Book Now</button>
                    @else
                        <p>Available only for customers</p>
                    @endif
                @else
                    <a  href="{{route('login')}}" class="btn" style="background-color: #df6732; color:white;"><b>Login to Book</b></a>
                @endif
            </div>

            <!-- Popup overlay -->
            <div class="overlay" id="overlay"></div>
            @auth
                @if(auth()->user()->utype == 'CST')
            <!-- Popup container -->
            <div class="popup-container" id="popupContainer">
                <button class="close-button" onclick="togglePopup()">x</button>
                <form action="/service/{{ $service->slug }}" method="post" id="loginForm" class="login-form form-horizontal">
                    @csrf
                    <h2>Booking Form</h2>
                        <input type="hidden" name="image" value="{{$service->image}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="booking_status" value="processing">
                        <input type="hidden" name="service_id" value="{{$service->id}}">
                        <div class="form-group">
                        <label for="service_title">Service Title:</label>
                        <input type="text" class="form-control" id="service_title" name="service_title" value="{{$service->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="price">price:</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{$service->price}}" readonly>
                    </div>
                        <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  id="name" name="name" value="{{Auth::user()->name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="phone" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="user_location">Your Location:</label> 
                        <input type="text" class="form-control" id="user_location" name="user_location" value="{{Auth::user()->user_location}}" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Set Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Set Time:</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="form-group">
                        <label for="service_locations">Select Branch Location:</label> 
                        <select class="form-control" id="service_locations" name="service_locations" required>
                            @foreach($sproviders as $sprovider)
                                <option value="{{$sprovider->service_locations}}">{{$sprovider->service_locations}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" style="background-color:#dd6737;color:black">Done Booking</button>
                </form>
            </div>
            @endif
            @endauth
        @endforeach
    @endif
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    function toggleDropdown(event) {
        event.preventDefault();
        const dropdownContent = document.getElementById("dropdownContent");
        dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    }

    function togglePopup() {
        const popup = document.getElementById('popupContainer');
        const overlay = document.getElementById('overlay');
        popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
        overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
    }

    $(document).ready(function () {
        $('.slick-slider').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            arrows: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1
        });
    });
</script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the date and time input elements
            var dateInput = document.getElementById('date');
            var timeInput = document.getElementById('time');

            // Set the current date as the default date
            var today = new Date();
            var year = today.getFullYear();
            var month = (today.getMonth() + 1).toString().padStart(2, '0');
            var day = today.getDate().toString().padStart(2, '0');
            var todayString = `${year}-${month}-${day}`;
            dateInput.setAttribute('min', todayString);
            dateInput.value = todayString;

            // Set the default time to the current time in the Philippines (Manila) time zone (UTC+8)
            var currentTimeInManila = new Date(new Date().toLocaleString("en-US", { timeZone: "Asia/Manila" }));
            var currentHours = currentTimeInManila.getHours();
            var currentMinutes = currentTimeInManila.getMinutes();
            var currentTimeString = (currentHours < 10 ? '0' : '') + currentHours + ':' + (currentMinutes < 10 ? '0' : '') + currentMinutes;
            timeInput.value = currentTimeString;

            // Calculate the deadline 5 minutes from now
            var deadline = new Date(today.getTime() + 5 * 60 * 1000);

            // Optionally, you can also add an event listener to handle changes in the selected date
            dateInput.addEventListener('change', function () {
                // Validate the selected date against the current date
                var selectedDate = new Date(dateInput.value);
                today.setHours(0, 0, 0, 0); // Set time to midnight for comparison
                if (selectedDate < today) {
                    alert('Please select a future date for your booking.');
                    dateInput.value = todayString; // Reset to the current date if invalid
                }
            });

            // Add an event listener to the time input for validation
            timeInput.addEventListener('blur', function () {
                // Get the selected time and set it to the current date
                var selectedTime = new Date(todayString + ' ' + timeInput.value);

                // Validate the selected time against the current time
                if (selectedTime < currentTimeInManila) {
                    alert('Please select a future time for your booking.');
                    timeInput.value = currentTimeString; // Set the time back to the current time if invalid
                }

                // Validate against the 5-minute deadline
                if (selectedTime > deadline) {
                    alert('You have exceeded the 5-minute limit for booking.');
                    timeInput.value = currentTimeString; // Reset to the current time if exceeded the deadline
                }
            });
        });
    </script>
</div>