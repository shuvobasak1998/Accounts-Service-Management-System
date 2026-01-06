<section class="section " id="process">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Frequently Ask Your question</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum molestiae temporibus eos facilis,
                        quod doloribus, voluptatibus </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Accordion 1 -->
            <div class="col-lg-5 col-sm-12 mt-4 mt-lg-0">
                <div class="row g-3">
                    <div class="col-lg-12 col-12 left-side ">
                        <div class="faq-bottom-text background-image-container">
                            <h3>Here We are to answer all your questions</h3>
                        </div>
                    </div>
                </div>
            </div>
            


            <div class="col-lg-7 col-sm-12 mt-4 mt-lg-0">
                <div class="our-process-right">
                    <div class="our-process-accordion">
                        <input type="radio" name="unique-accordion" id="unique-accordion-1" checked>
                        <div class="unique-item">
                            <label class="unique-title" for="unique-accordion-1">
                                <span>What is your return policy?</span>
                                <i class="fa fa-plus"></i>
                            </label>
                            <div class="unique-content">
                                <p>We offer a 30-day return policy. If you’re not satisfied with your purchase, you can return it within 30 days for a full refund.</p>
                            </div>
                        </div>
                    </div>
            
                    <div class="our-process-accordion">
                        <input type="radio" name="unique-accordion" id="unique-accordion-2">
                        <div class="unique-item">
                            <label class="unique-title" for="unique-accordion-2">
                                <span>How long does shipping take?</span>
                                <i class="fa fa-plus"></i>
                            </label>
                            <div class="unique-content">
                                <p>Shipping usually takes 5-7 business days within the U.S. International shipping times vary based on location.</p>
                            </div>
                        </div>
                    </div>
            
                    <div class="our-process-accordion">
                        <input type="radio" name="unique-accordion" id="unique-accordion-3">
                        <div class="unique-item">
                            <label class="unique-title" for="unique-accordion-3">
                                <span>Do you offer international shipping?</span>
                                <i class="fa fa-plus"></i>
                            </label>
                            <div class="unique-content">
                                <p>Yes, we ship to most countries worldwide. Shipping fees and delivery times may vary depending on your location.</p>
                            </div>
                        </div>
                    </div>
            
                    <div class="our-process-accordion">
                        <input type="radio" name="unique-accordion" id="unique-accordion-4">
                        <div class="unique-item">
                            <label class="unique-title" for="unique-accordion-4">
                                <span>How can I track my order?</span>
                                <i class="fa fa-plus"></i>
                            </label>
                            <div class="unique-content">
                                <p>Once your order is shipped, you will receive a tracking number via email. You can use this number to track your package online.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<style>
 .background-image-container {
    position: relative;
    background-image: url('{{ asset('frontend/images/house.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 20px; /* Adjust padding if needed */
}

.background-image-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
    border-radius: 16px;
}


</style>
