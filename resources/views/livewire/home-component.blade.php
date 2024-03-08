<div style="background-color: black;">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<style>body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-image: url('bg.jpg');
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-color: #120803;
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(19, 2, 2, 0.6);
        z-index: -1;
    }

    .navbar .nav-link,
    .navbar .nav-link.book-now {
        transition: background-color 0.3s, padding 0.3s;
    }

    .navbar .nav-link:hover {
        background-color: #df6732;
        padding: 15px 10px;
    }

    .navbar .nav-link.book-now:hover {
        background-color: #ffffff;
        color: #000000;
    }
/* Dropdown styles */
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #1c0d06;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {
    background-color: #df6732;
    color: white;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.toggle-btn {
    font-size: 30px;
    cursor: pointer;
    margin-right: 20px;
    width: auto;
}
.dashboard {
    position: fixed; 
    top: 85px; 
    width: 250px;
    background-color: #1c0d06;
    color: #fff;
    padding: 20px;
    box-sizing: border-box;
    transition: left 0.5s;
    box-shadow: 0 4px 6px rgba(24, 2, 2, 0.822);
    z-index: 1; 
    left: -250px; 
}
.dashboard a {
    color: #fff;
    text-decoration: none;
    display: block;
    margin-bottom: 10px;
    font-family: sans-serif;
    font-size: inherit;
    font-weight: inherit;
}
.dashboard a:hover {
    background-color: #df6732; 
    transition: background-color 0.3s;
}
.dashboard-open .dashboard {
    left: 0;
}
.logo-img {
    max-width: 13%;
    height: auto;
    margin-right: 15px;
    margin-top: 1px;
    vertical-align: middle;
}  
.content-section {
    padding: 20px;
    color: #fff;
    margin-left: 4%; 
    font-size: 30px; 
    line-height: 1.2;   
    margin-top: 15%;
    letter-spacing: 2px;
}
.content-section .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #df6732;
    color: #000000;
    text-decoration: none;
    border-radius: 8px;
    font-size: 16px;
    transition: background-color 0.3s;
    border: 3px solid #1c0d06;     
}
.content-section .btn:hover {
    background-color: #fff;
}
.content-section-2 {
    padding: 20px;
    color: #fff;
    text-align: center; 
    font-size: 25px;
    line-height: 1.2;
    margin-top: 200px; 
    letter-spacing: 2px;
}
.top-branches {
    display: flex;
    justify-content: space-around;
    padding: 20px;
    margin-top: 50px; 
    
}
.branch-container {
    display: flex; 
    flex-direction: column; 
    align-items: center; 
    width: 250px;
    height: 260px;
    text-align: center;
    border-radius: 10px;
    overflow: hidden; 
    background-color: #fff; 
    margin: 0 2px; 
}
.branch-container img {
    width: 50%; 
    height: auto;
    margin-top: 10px; 
}

.branch-container .loc-img {
    width: 30px; 
    height: auto;
    margin-top: 10px; 
}

.branch-container p {
    color: #000; 
    margin-top: 10px; 
}
.new-bg-section {
    position: relative; 
    background-image: url('bg2.png');    
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 500px; 
    margin-top: 10%; 
    z-index: 0; 
}
.new-bg-section::before {
    content: ''; 
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.61); 
    z-index: -1; 
}
.new-bg-section h1 {
    padding: 20px;
    color: #ffffff;
    text-align: center; 
    font-size: 35px;
    line-height: 1.2;
    letter-spacing: 2px;
}
.contact-section {
    padding: 20px;
    color: #ffffff;
    text-align: center;
    font-size: 25px;
    line-height: 1.2;
    margin-top: 100px;
    letter-spacing: 2px;
}
.dropdown-box {
    width: 500px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}
.display-box {
    width: 500px;
    background-color: #f0f0f0;
    color: #000000;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: left;
    text-align: left;
    margin: 20px auto;
    border-radius: 5px;
    padding: 10px;
}
.about {
    margin-top: 100px;
}
.about h1 {
	color: white;
}
.about h1 span {
	color: #df6732;
}
.slick-carousel {
  margin: auto; 
  max-width: 100%; 
}

.frame {
  display: flex;
  background-color: #AE5626; 
  padding: 20px;
  color: white;
  height: 400px;
  margin: auto; 
}

.left-side {
  padding: 20px; 
  max-width: 50%;
  text-align: justify;
}

.right-side {
  padding: 20px; 
  max-width: 100%;
  position: relative;
  bottom: 65%;
  left: 50%;
}

.right-side img {
    width: 50%; /* Adjust the width as needed */
    height: auto;
    border-radius: 10px; /* Add border-radius for rounded corners */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Add a subtle box shadow */
}

.left-side h2 {
    margin-top: 50px; 
    position: relative;
}

.stars {
    position: relative;
    top: 5px;
}

.stars span {
    color: #FFD700;
    margin-right: 2px;
    font-size: 18px;
}

.left-side {
    position: relative;
    top: 5px;
    left: 1%;
}
/* Styling for Slick Carousel dots */
.slick-dots {
    bottom: 5px; 
}
.welcome-message {
    color: #ffffff; 
    font-size: 24px; 
    line-height: 1.5; 
    margin-top: 50px; 
    padding: 0 30px; 
}
.about {
    margin-left: 3%;
}
.fabout {
    display: flex;
    background-color: #30170F;
    padding: 20px; 
    height: 550px;
    margin: auto; 
    margin-top: 7%;
    color: #ffffff;
}

.faq {
    margin-right: 40px; 
    margin-top: 70px;
    margin-left: 50px; 
}

.faq-columns {
    display: flex;
    flex-direction: column;
    margin-left: 50px; 
}

.faq span {
    color: #df6732; 
}

.faq h2 {
    color: #ffffff; 
    font-size: 30px; 
    margin-top: 20px; 
}
.question {
    cursor: pointer;
    padding: 10px;
    background-color: #97401E;
    margin-bottom: 10px;
    border-radius: 4px;
    transition: background-color 0.3s;
    color: white;
    width: 600px;
    position: relative;
    top: 60px;
    margin-left: 5px; 
}
.question:hover {
    background-color: #b65f3d;
}
.answer {
    display: none;
    margin-left: 10px;
    margin-bottom: 10px;
    animation: slideDown 0.5s ease-out;
    width: 600px;
    position: relative;
    top: 60px;
}
  
  @keyframes slideDown {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>


<div class="tp-banner">
    <ul>
        @foreach($slides as $slide)
        <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
            data-saveperformance="off" data-title="Slide">
            <img src="{{ asset('images/slider') }}/{{$slide->image}}" alt="{{$slide->title}}" data-bgposition="center center"
                data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                data-bgfitend="100" data-bgpositionend="right center">
        </li>
        @endforeach
    </ul>
    <div class="tp-bannertimer"></div>
</div>

<div class="content-section" style="background-color:#97401E">

    <h1 style="color: white;"><b>Having trouble?</b></h1>
    <h2 style="color: white;">We Are <b>At Your Service!</b></h2>
    <h4 style="color: white;">Repair estimate for your vehicles</h4>

</div>

<div class="about">
    <center><h1><b>What They Say About Us?</b></h1></center>
</div>

<div class="slick-carousel">
    @foreach($feedbacks as $feedback)
    <div class="frame">
      <div class="left-side">
        <p style="color: white;"><b>{{$feedback->message}}</b></p>
        <h2 style="color: white;"><b>{{$feedback->name}}</b></h2>

        <div class="stars">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $feedback->rating)
                    <span>&#9733;</span>
                @else
                    <span>&#9734;</span>
                @endif
            @endfor
        </div>
      </div>
      <div class="right-side">
        <img src="{{asset('images/services') }}/{{$feedback->image}}" alt="Image">
      </div>
    </div>
    @endforeach
  </div>

  <h1 class="welcome-message"><b>Welcome to At Your Service, where we go the extra mile to keep you moving. Established with a passion for automotive excellence and a commitment to exceptional customer service, we are your trusted partner in all things related to vehicle repair and maintenance.</b></h1>
  
  <div class="about mission-section">
    <h1><b>Our <span>Mission</span></b></h1>
</div>

<h1 class="welcome-message"><b>At At Your Service Vehicle Repairment, our mission is clear: to provide unparalleled automotive repair and maintenance services with a focus on quality, integrity, and customer satisfaction. We strive to exceed expectations at every turn, ensuring that every client leaves our facility with their vehicle in optimal condition and a smile on their face.</b></h1>

<div class="fabout">
    <div class="faq">
        <h3><b><span>FREQUENTLY ASKED QUESTIONS</span></b></h3>
        <br><br>
        <h2><b>HERE'S OUR MOST ASKED <br>QUESTIONS</b></h2>
    </div>

    <div class="faq-columns">
        <div class="faqs">
            <div class="question"><b>How long does it take to detail a car?</b></div>
            <div class="answer"><b>The time it takes to detail a car can vary widely depending on several factors such as the size and condition of the vehicle, the level of detail desired, and the expertise and efficiency of the person or team performing the detailing.</b></div>
        </div>
        <div class="faqs">
            <div class="question"><b>How do I create a new account?</b></div>
            <div class="answer"><b>To create a new account, click on the <a href="{{route('register')}}">Sign Up</a> button and fill out the required information.</b></div>
        </div>
        <div class="faqs">
            <div class="question"><b>What types of car services do you offer?</b></div>
            <div class="answer"><b>Oil and Fluid Service, Brake System Maintenance and Repair Service, Tire Services, Diagnostic Services, Battery and Charging System Services, Suspension and Steering Repairs. Click Book Now to learn more about it!</b></div>
        </div>
    </div>
</div>

<div class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <aside>
                                    <h4>The Office</h4>
                                    <address>
                                        <strong>At Your Service.</strong><br>
                                        <i class="fa fa-map-marker"></i><strong>Address: </strong>Dagupan City, Pangisinan,
                                        Philippines<br>
                                        <i class="fa fa-phone"></i><strong>Phone: </strong> +91-1234567890
                                    </address>
                                    <address>
                                        <strong>At Your Service Emails</strong><br>
                                        <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                            href="mailto:contact@atyourservice.in"> contact@atyourservice.in</a><br>
                                        <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                            href="mailto:support@atyourservice.in"> support@atyourservice.in</a>
                                    </address>
                                </aside>
                                <hr class="tall">
                            </div>
                            <div class="col-md-8">
                                <h3>Contact Form</h3>
                                <p class="lead">
                                </p>
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form id="contactform" class="form-theme" method="post" wire:submit.prevent="sendMessage">
                                    <input type="text" placeholder="Name" name="name" id="name" wire:model="name" required="">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                    <input type="email" placeholder="Email" name="email" id="email" wire:model="email" required="">
                                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                    <input type="text" placeholder="Phone" name="phone" id="phone" wire:model="phone" required="">
                                    @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                    <textarea placeholder="Your Message" name="message" id="message" wire:model="message" required=""></textarea>
                                    @error('message') <p class="text-danger">{{$message}}</p> @enderror
                                    <input type="submit" name="Submit" value="Send Message" class="btn btn-primary">
                                </form>
                                <div id="result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    function toggleDashboard() {
        const dashboard = document.querySelector('.dashboard');
        const navbar = document.querySelector('.navbar h1');
        const currentLeft = parseInt(getComputedStyle(dashboard).left);

        if (currentLeft === 0) {
            dashboard.style.left = '-250px';
            navbar.classList.remove('dashboard-open');
        } else {
            dashboard.style.left = '0';
            navbar.classList.add('dashboard-open');
        }
    }

    function toggleDropdown(event) {
        event.preventDefault();
        const dropdownContent = document.getElementById("dropdownContent");
        dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    
    }$(document).ready(function(){

$('.slick-carousel').slick({
  autoplay: true,
  autoplaySpeed: 3000, 
  arrows: false,
  infinite: true,
  speed: 500,
  slidesToShow: 1,
  slidesToScroll: 1
});
});
document.addEventListener("DOMContentLoaded", function() {
const questions = document.querySelectorAll(".question");
questions.forEach(function(question) {
question.addEventListener("click", function() {
  const answer = this.nextElementSibling;
  if (answer.style.display === "block") {
    answer.style.display = "none";
  } else {
    answer.style.display = "block";
  }
});
});
});

</script>

</div>