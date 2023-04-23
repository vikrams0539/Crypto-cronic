<section class="com_p_t">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text_typeography max-width popular-route">
                    <h3>POPULAR ROUTES</h3>
                    <p>We have increased fleet on numerous occasions to cater to celebrities and businesspeople in order to save time and effort. The flying experience is exquisitely planned and private chartered jet services help high-ranking prominent experts on their route to achieving their goals in the air. The premium-designed offerings are well suited to the tastes of the elite.</p>
                </div>
            </div>
        </div>
    </div>    
    <div class="popular-route-slider">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="img-block">
                            <img src="images/popular/image1.jpg" alt="Popular" class='img-fluid' />
                            <div class='img-text'>
                                <div class="text-top">
                                    <p><span>London (BQH)<i class="fas fa-long-arrow-alt-right"></i>Zurich (ZRH)</span>
                                    <p class='text-danger'>from €5,790</p>
                                </div>
                                <div class="text-bottom">
                                    <p>Flight time: 01:46 h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        var owl = $('.popular-route-slider .owl-carousel');
        owl.owlCarousel({
        margin: 10,
        loop: true,
        responsive: {
            0: {
            items: 1
            },
            600: {
            items: 2
            },
            1000: {
            items: 4
            }
        }
        })
    })
</script>