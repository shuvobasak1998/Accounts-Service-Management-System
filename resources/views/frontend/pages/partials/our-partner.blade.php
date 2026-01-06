<section class="section colored " id="partners">
    <div class="container background-custom-style">
        <!-- Section Title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Our Partners</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>We are proud to collaborate with these industry-leading companies.</p>
                </div>
            </div>
        </div>

        <!-- Owl Carousel -->
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel partner-carousel">
                    @for ($i = 1; $i <= 12; $i++)
                        <div class="partner-item">
                            <div class="partner-img">
                                <img src="https://placehold.co/150" alt="Company {{ $i }}">
                                <div class="overlay">
                                    <p>Company {{ $i }}</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>