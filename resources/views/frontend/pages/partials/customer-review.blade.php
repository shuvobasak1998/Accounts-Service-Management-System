<section class="section" id="customer-reviews">
    <div class="container background-custom-style">
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Customer Review</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>We are proud to collaborate with these industry-leading companies.</p>
                </div>
            </div>
        </div>

        <!-- Owl Carousel for Customer Reviews -->
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel review-carousel">
                    <!-- Review Item 1 -->
                    <div class="review-item">
                        <div class="review-ribbon pink">
                            <h3>"This product is amazing! Highly recommend to everyone."</h3>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/150" alt="Customer 1">
                            <div>
                                <h5>John Doe</h5>
                                <span>CEO, Company</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review Item 2 -->
                    <div class="review-item">
                        <div class="review-ribbon orange">
                            <h3>"Great service and fantastic quality. I'm very very satisfied!"</h3>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/150" alt="Customer 2">
                            <div>
                                <h5>Jane Smith</h5>
                                <span>Manager, Business</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review Item 3 -->
                    <div class="review-item">
                        <div class="review-ribbon purple">
                            <h3>"The team is very very responsive, and the experience was seamless."</h3>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/150" alt="Customer 3">
                            <div>
                                <h5>Mark Wilson</h5>
                                <span>Designer, Agency</span>
                            </div>
                        </div>
                    </div>
                    <!-- Add more review items as needed -->
                </div>
            </div>
        </div>
    </div>
</section>

<style>
            /* review-ribbon Style */
            .review-ribbon {
            color: var(--white);
            background: var(--background);
            font-family: "Pridi", serif;
            text-align: center;
            padding: 32px 0;
            margin: 0 15px;
        }

        .review-ribbon h3 {
            background: var(--color1);
            font-size: 22px;
            font-weight: 600;
            position: relative;
            padding: 15px 15px;
            margin: 0 -15px;
        }

        .review-ribbon h3:before,
        .review-ribbon h3:after {
            content: "";
            background: linear-gradient(to top right, transparent 49%, var(--color2) 50%);
            width: 15px;
            height: 15px;
            position: absolute;
            bottom: -15px;
            left: 0;
        }

        .review-ribbon h3:after {
            left: auto;
            right: 0;
            bottom: auto;
            top: -15px;
            background: linear-gradient(to top right, var(--color2) 49%, transparent 50%);
        }

        .review-ribbon.pink {
            --color1: #e056fd;
        }

        .review-ribbon.pink h3:before,
        .review-ribbon.pink h3:after {
            --color2: #be2edd;
        }

        .review-ribbon.orange {
            --color1: #fe8b3b;
        }

        .review-ribbon.orange h3:before,
        .review-ribbon.orange h3:after {
            --color2: #fe8b3b;
        }

        .review-ribbon.purple {
            --color1: #8261ee;
        }

        .review-ribbon.purple h3:before,
        .review-ribbon.purple h3:after {
            --color2: #4834d4;
        }

        /* Mobile adjustments */
        @media screen and (max-width: 990px) {
            .review-ribbon {
                margin-bottom: 50px;
            }
        }

        /* Review Item Author Section */
        .testimonial-author {
            display: flex;
            align-items: center;
            /* Align image and text in a row */
            justify-content: space-around;
            /* Center the content */
            margin-top: 15px;
            /* Add margin to space out the content */
        }

        .testimonial-author img {
            border-radius: 50%;
            max-width: 80px;
            /* Max width for the image */
            height: auto;
            margin-right: 15px;
        }

        .testimonial-author h5 {
            font-weight: bold;
            margin: 0;
        }

        .testimonial-author span {
            display: block;
            font-size: 14px;
            color: #777;
        }

        /* Review Item Style */
        .review-item {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px;
        }

        .review-item p {
            color: #333;
        }
</style>