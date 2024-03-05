<div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    .rating {
        display:block;
        flex-direction: row-reverse;
    }

    .rating label {
        font-size: 30px;
        color: #fff;
        cursor: pointer;
    }

    .rating label:hover,
    .rating label:hover ~ label {
        color: #ffcc00;
    }

    .rating input:checked ~ label {
        color: #ffcc00;
    }

    .rating .highlight label {
        color: #ffcc00;
    }
</style>

    <section class="content-central" style="background-color: #120803;">
        <div class="content_info">
            <div class="paddings-mini" style="background-color: #120803;">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-8 col-md-offset-2 profile1">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                    <div class="row" style="background-color:#1c0d06">
                                        <div class="col-md-6 table-title">
                                            <a href="{{route('customer.booking_history')}}" class="btn" style="color:#1c0d06; background-color:#dd6737" >Booking History</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body" style="background-color: #120803;">
                                <form class="form-horizontal" wire:submit.prevent="storefeedback">
                                        @csrf
                                        <div class="form-group">
                                            <label for="rating" class="control-label col-sm-3" style="color: white;">Ratings: </label>
                                            <div class="col-sm-9">
                                                <div class="rating">
                                                    <input type="radio" id="star5" name="rating" wire:model="rating" value="5" required/>
                                                    <label for="star5" title="5 stars">&#9733;</label>
                                                    <input type="radio" id="star4" name="rating" wire:model="rating" value="4" required/>
                                                    <label for="star4" title="4 stars">&#9733;</label>
                                                    <input type="radio" id="star3" name="rating" wire:model="rating" value="3" required/>
                                                    <label for="star3" title="3 stars">&#9733;</label>
                                                    <input type="radio" id="star2" name="rating" wire:model="rating" value="2" required/>
                                                    <label for="star2" title="2 stars">&#9733;</label>
                                                    <input type="radio" id="star1" name="rating" wire:model="rating" value="1" required/>
                                                    <label for="star1" title="1 star">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="service_title" class="control-label col-sm-3" style="color: white;">Service Title: </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="service_title" wire:model="service_title" readonly>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="image" class="control-label col-sm-3" style="color: white;">Service Image: </label>
                                        <div class="col-sm-9">
                                            @if($image)
                                                <img src="{{asset('images/services') }}/{{$image}}" alt="Service Image" class="img-thumbnail" style="width: 20%; height: auto;">
                                            @endif
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="message" class="control-label col-sm-3" style="color: white;">Message: </label>
                                                <div class="col-sm-9">
                                                <textarea placeholder="Your Message" class="form-control" name="message" id="message" wire:model="message"></textarea>
                                                </div>
                                        </div>
                                        <button type="submit" class="btn pull-right" style="color:#1c0d06; background-color:#dd6737">Submit Feedback</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll('.rating input');

        stars.forEach((star) => {
            star.addEventListener('change', function () {
                resetStars();
                highlightStars(this);
            });
        });

        function resetStars() {
            stars.forEach((star) => {
                star.parentNode.classList.remove('highlight');
            });
        }

        function highlightStars(selectedStar) {
            let currentStar = selectedStar;
            while (currentStar) {
                currentStar.parentNode.classList.add('highlight');
                currentStar = currentStar.previousElementSibling;
            }
        }
    });
</script>

</div>
 