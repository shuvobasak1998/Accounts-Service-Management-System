@extends('frontend.layout.master')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/service-details.css') }}">
@endsection

@section('content')
    @include('frontend.pages.partials.hero-area')

    <section class="section colored" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="service-categories">
                        <h5>Service Categories</h5>
                        <hr>
                        <ul class="list-unstyled">

                            <li class="active">
                                <span class="bullet">•</span>
                                <span class="category-name">Category 1</span>
                                <span class="arrow">→</span>
                            </li>
                            <li class="{{ request()->get('category') == 'category2' ? 'active' : '' }}">
                                <span class="bullet">•</span>
                                <span class="category-name">Category 2</span>
                                <span class="arrow">→</span>
                            </li>
                            
                            <li class="{{ request()->get('category') == 'category3' ? 'active' : '' }}">
                                <span class="bullet">•</span>
                                <span class="category-name">Category 3</span>
                                <span class="arrow">→</span>
                            </li>
                            
                            <li >
                                <span class="bullet">•</span>
                                <span class="category-name">Category 1</span>
                                <span class="arrow">→</span>
                            </li>
                            <li class="">
                                <span class="bullet">•</span>
                                <span class="category-name">Category 2</span>
                                <span class="arrow">→</span>
                            </li>
                            <li class="{{ request()->get('category') == 'category3' ? 'active' : '' }}">
                                <span class="bullet">•</span>
                                <span class="category-name">Category 3</span>
                                <span class="arrow">→</span>
                            </li>
                        </ul>
                    </div>
                    <div class="consultancy">
                        <h5>Need An Consultancy</h5>
                        <a href="tel:+1234567890" class="call-btn">
                            <i class="fas fa-phone-alt"></i> Call Now
                        </a>
                    </div>
                    <div class="brochure-section">
                        <h5>Download Our Brochure</h5>
                        <a href="{{ asset('path-to-your-brochure.pdf') }}" class="download-btn" download>
                            <i class="fas fa-download"></i> Download Now
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-12 pt-lg-0 mt-sm-5" >
                    <div class="service-details-right">
                        <div class="service-details-right-heading">
                            <img src="{{ asset('frontend/images/service-details.jpg') }}" alt="Icon"
                                style="vertical-align: middle;">
                            <h6>Our Service Overview Obcaecati quod vitae repudiandae at,
                                aliquam qui illo laborum repellat numquam dolore alias vero doloribus facere iure voluptatum
                                odit similique perferendis quibusdam sequi tempora! Molestiae unde blanditiis eveniet?</h6>
                        </div>
                        <hr>
                        <img src="{{ asset('frontend/images/service-details.jpg') }}" alt="Service Image" class="img-fluid"
                            style="width: 100%; border-radius: 20px;">

                        <!-- Description -->
                        <h3 class="service-overview-header">Service Overview</h3>
                        <p style="margin-top: 16px">This section provides a detailed overview of our services. We aim to provide the best solutions
                            tailored to your needs. Our experts work diligently to ensure that every project is completed
                            with the highest quality.</p>

                        <div class="circular-chart-container">
                            <div>
                                <h4>Performance Over the Years</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, tempora?</p>
                                <a href="#" class="button-custom-style">
                                    <i class="fas fa-phone-alt fa-rotate-90"></i>
                                    <span class="button-text">Book a Call Now</span>
                                </a>
                            </div>
                            <div class="charts">
                                <div class="chart" data-percentage="40">
                                    <svg width="120" height="120" viewBox="0 0 80 80">
                                        <circle class="background-circle" cx="40" cy="40" r="35"></circle>
                                        <circle class="progress-circle" cx="40" cy="40" r="35"></circle>
                                    </svg>
                                    <div class="chart-text">0%</div>
                                    <div class="chart-label">Build Quality</div>
                                </div>

                                <div class="chart" data-percentage="40">
                                    <svg width="120" height="120" viewBox="0 0 80 80">
                                        <circle class="background-circle" cx="40" cy="40" r="35"></circle>
                                        <circle class="progress-circle" cx="40" cy="40" r="35"></circle>
                                    </svg>
                                    <div class="chart-text">0%</div>
                                    <div class="chart-label">Technology</div>
                                </div>

                                <div class="chart" data-percentage="55">
                                    <svg width="120" height="120" viewBox="0 0 80 80">
                                        <circle class="background-circle" cx="40" cy="40" r="35"></circle>
                                        <circle class="progress-circle" cx="40" cy="40" r="35"></circle>
                                    </svg>
                                    <div class="chart-text">0%</div>
                                    <div class="chart-label">Sustainability</div>
                                </div>
                            </div>
                        </div>
                        <h3 class="service-benefits-header">Service Benefits</h3>
                        <ul class="benefit-list">
                            <li><i class="fas fa-check-circle"></i> Benefit 1: High quality and reliable service.</li>
                            <li><i class="fas fa-check-circle"></i> Benefit 2: Customizable to your requirements.</li>
                            <li><i class="fas fa-check-circle"></i> Benefit 3: Professional support team available 24/7.</li>
                        </ul>
                        <section id="process">
                            <h3>Frequently Ask Question about this Service </h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="our-process-right">
                                        <div class="our-process-accordion">
                                            <input type="radio" name="unique-accordion" id="unique-accordion-1" checked>
                                            <div class="unique-item">
                                                <label class="unique-title" for="unique-accordion-1">
                                                    <span>Accordion 1</span>
                                                    <i class="fa fa-plus"></i>
                                                </label>
                                                <div class="unique-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus commodi, vitae eaque aspernatur ipsa minus.</p>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="our-process-accordion">
                                            <input type="radio" name="unique-accordion" id="unique-accordion-2">
                                            <div class="unique-item">
                                                <label class="unique-title" for="unique-accordion-2">
                                                    <span>Accordion 2</span>
                                                    <i class="fa fa-plus"></i>
                                                </label>
                                                <div class="unique-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut sapien eu felis pharetra luctus.</p>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="our-process-accordion">
                                            <input type="radio" name="unique-accordion" id="unique-accordion-3">
                                            <div class="unique-item">
                                                <label class="unique-title" for="unique-accordion-3">
                                                    <span>Accordion 3</span>
                                                    <i class="fa fa-plus"></i>
                                                </label>
                                                <div class="unique-content">
                                                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="our-process-accordion">
                                            <input type="radio" name="unique-accordion" id="unique-accordion-4">
                                            <div class="unique-item">
                                                <label class="unique-title" for="unique-accordion-4">
                                                    <span>Accordion 4</span>
                                                    <i class="fa fa-plus"></i>
                                                </label>
                                                <div class="unique-content">
                                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            let animated = false;

            function isElementInViewport(el) {
                let rect = el.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            function animateCharts() {
                if (!animated && isElementInViewport($(".circular-chart-container")[0])) {
                    animated = true;
                    $(".circular-chart-container .chart").each(function() {
                        let $chart = $(this);
                        let percentage = parseInt($chart.attr("data-percentage"));
                        let $circle = $chart.find(".progress-circle");
                        let $text = $chart.find(".chart-text");

                        let currentValue = 0;
                        const totalLength = 219.9;
                        const targetOffset = totalLength - (totalLength * percentage / 100);

                        // Animate the stroke-dashoffset
                        setTimeout(() => {
                            $circle.css("stroke-dashoffset", targetOffset);
                        }, 200);

                        // Animate the text counting
                        let interval = setInterval(() => {
                            if (currentValue >= percentage) {
                                clearInterval(interval);
                            } else {
                                currentValue++;
                                $text.text(currentValue + "%");
                            }
                        }, 20);
                    });
                }
            }

            // Run animation when section comes into view
            $(window).on("scroll", function() {
                animateCharts();
            });

            // Check if already in viewport on page load
            animateCharts();
        });
    </script>
@endsection
