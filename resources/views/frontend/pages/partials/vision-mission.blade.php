<section class="section" id="vision-mission">
    <div class="container background-custom-style">
        <div class="row">
            <!-- Left Side: Our Vision, Our Mission, Our History -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="vison-mission-left">
                    <div class="mb-4 left-content">
                        <button class="btn-heading">Our Vision</button>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor, sit amet
                            consectetur adipisicing elit. Necessitatibus,?</p>
                    </div>
                    <div class="mb-4 left-content">
                        <button class="btn-heading">Our Mission</button>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor, sit amet
                            consectetur adipisicing elit. commodi?</p>
                    </div>
                    <div class="left-content">
                        <button class="btn-heading">Our History</button>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor, sit amet
                            consectetur adipisicing elit. Necessitatibus, sit. Adipisci, commodi?</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Skill Progress Bars -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="vison-mission-right">
                    <h6>Why Choose Us</h6>
                    <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus, minus!</h2>
                    <div>
                        <div class="mb-4">
                            <h6 class="progress-title">Web Development</h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100">80%</div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6 class="progress-title">Graphic Design</h6>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 70%;"
                                    aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6 class="progress-title">Digital Marketing</h6>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%;"
                                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="button-custom-style" style="border-radius: 8px; float:inline-end;">
                        <i class="fa fa-phone"></i>
                        <span class="button-text">Contact Us</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .section .row {
        display: flex;
        align-items: stretch;
    }

    .vison-mission-left {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .vison-mission-left .left-content {
        height: 33.33%;
        background: #8261ee;
        padding: 20px;
        border-radius: 16px;
        color: white;
        transition: all 0.4s ease-in-out;
        border: 1px solid #8261ee;
    }

    .vison-mission-left .left-content:hover {
        background-color: #fff;
        box-shadow: 0px 25px 65px 0px rgba(0, 0, 0, 0.1);
        color: #000000;
        cursor: pointer;
        border: 1px solid #8261ee;
        transition: all 0.4s ease-in-out;
    }

    .vison-mission-left .left-content:hover .btn-heading {
        background: #8261ee;
        color: white;
        cursor: pointer;
        transition: all 0.4s ease-in-out;
    }

    .btn-heading {
        background: #fff;
        color: #8261ee;
        font-size: 18px;
        font-weight: bold;
        border: none;
        padding: 5px 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s ease-in-out;
    }

    .vison-mission-left .left-content p {
        margin-top: 10px;
    }

    .btn-heading:hover {
        background: #6a50d8;
        color: #fff;
    }

    .vison-mission-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* background-color: #e3f2fd; */
        padding: 30px;
        border: 1px solid #000000;
        border-radius: 16px;
        /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
        transition: all 0.3s ease;
        height: 100%;
    }

    .vison-mission-right h6 {
        color: #8261ee;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }
    .vison-mission-right h2 {
        margin-top: 20px;
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }
</style>
