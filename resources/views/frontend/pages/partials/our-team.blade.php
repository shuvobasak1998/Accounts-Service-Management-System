<section class="section colored" id="our-team">
    <div class="container background-custom-style">
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Our Team</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>We are proud to collaborate with these industry-leading companies.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="https://cdn.yahoobaba.net/our-team/demo11/images/img-1.jpg" alt="">
                    </div>
                    <div class="team-prof">
                        <h5 class="post-title">Williamson</h5>
                        <div class="border"></div>
                        <span class="post">Web Designer</span>
                        <ul class="team_social">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="https://cdn.yahoobaba.net/our-team/demo11/images/img-2.jpg" alt="">
                    </div>
                    <div class="team-prof">
                        <h5 class="post-title">Miranda Joy</h5>
                        <div class="border"></div>
                        <span class="post">Web Developer</span>
                        <ul class="team_social">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="https://cdn.yahoobaba.net/our-team/demo11/images/img-3.jpg" alt="">
                    </div>
                    <div class="team-prof">
                        <h5 class="post-title">Steve Thomas</h5>
                        <div class="border"></div>
                        <span class="post">Web Developer</span>
                        <ul class="team_social">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="https://cdn.yahoobaba.net/our-team/demo11/images/img-4.jpg" alt="">
                    </div>
                    <div class="team-prof">
                        <h5 class="post-title">Kristiana</h5>
                        <div class="border"></div>
                        <span class="post">Web Designer</span>
                        <ul class="team_social">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .our-team {
        position: relative;
        text-align: center;
        overflow: hidden;
        padding: 24px 10px;
        border: 1px solid #ebebeb;
        transition: all 0.3sease 0s;
        border-radius: 10px;
        z-index: 5;
    }

    .pic img {
        border: 10px solid #f8f8f8;
        border-radius: 50%;
        transition: all 0.3s ease 0s;
    }

    .post-title {
        position: relative;
        margin: 38px 0 18px 0;
        font-weight: bold;
        text-transform: uppercase;
        color: #333;
    }

    .border {
        width: 100px;
        border-bottom: 3px solid #37cfd7;
        display: block;
        margin: 0 auto;
        transition: all 0.3s ease 0s;
    }

    .border:after {
        content: "";
        width: 34px;
        display: block;
        position: relative;
        top: 3px;
        border-bottom: 3px solid #F43662;
        margin: auto;
    }

    .post {
        overflow: hidden;
        display: block;
        margin-top: 20px;
        text-transform: capitalize;
        opacity: 1;
        transition: all 0.3s ease 0s;
    }

    .team_social {
        list-style: none;
        padding: 0;
        text-align: center;
        position: relative;
        bottom: -100px;
        opacity: 0;
        transition: all 0.3s ease 0s;
    }

    .team_social>li {
        display: inline-block;
        margin-right: 20px;
    }

    .team_social>li:last-child {
        margin-right: 0;
    }

    .team_social>li>a {
        font-size: 15px;
        font-weight: 400;
        color: #333;
        transition: all 0.3s ease 0s;
    }

    .team_social>li>a:hover {
        color: #fff;
    }

    .our-team:hover {
        cursor: pointer;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 25px 65px 0px rgba(0, 0, 0, 0.1);
    }

    .our-team:hover .pic img {
        border-color: #8261ee;
    }

    .our-team:hover .border {
        border-color: #8261ee;
    }

    .our-team:hover .border:after {
        border-color: #fff;
    }

    .our-team:hover .post {
        margin-top: 0;
        opacity: 0;
    }

    .our-team:hover .team_social {
        opacity: 1;
        bottom: 0;
    }

    @media screen and (max-width: 990px) {
        .our-team {
            margin-bottom: 30px;
        }
    }
</style>