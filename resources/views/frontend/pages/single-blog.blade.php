@extends('frontend.layout.master')

@section('css')
    <style>
        /* Service Categories */
        .blog-categories {
            padding: 15px;
            background-color: #f7f7f7;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.4);
        }

        .blog-categories h5 {
            margin-bottom: 10px;
            font-weight: 700;
        }

        .blog-categories ul {
            padding-left: 0;
        }

        .blog-categories li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            border-top: 1px solid rgba(0, 123, 255, 0.2);
            border-bottom: 1px solid rgba(0, 123, 255, 0.2);
            padding: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .blog-categories .bullet {
            font-size: 30px;
            margin-right: 10px;
            color: black;
        }

        .blog-categories .category-name {
            font-weight: bold;
            flex-grow: 1;
            color: #000;
        }

        .blog-categories .arrow {
            font-size: 20px;
            color: #28a745;
            margin-left: 10px;
        }

        /* Active state */
        .blog-categories li.active {
            background-color: #8261ee;
            border-color: #8261ee;
        }

        .blog-categories li.active .bullet,
        .blog-categories li.active .category-name,
        .blog-categories li.active .arrow {
            color: #fff;
        }
    </style>
    <style>
        /* Recent Posts */
        .recent-post {
            padding: 15px;
            background-color: #f7f7f7;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.4);
            margin: 16px 0;
        }

        .recent-post h5 {
            margin-bottom: 10px;
            font-weight: 700;
        }

        .recent-post ul {
            padding-left: 0;
        }

        .recent-post li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(0, 123, 255, 0.2);
            padding: 10px 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .recent-post img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 5px;
        }

        .recent-post div {
            flex-grow: 1;
        }

        .recent-post p {
            margin: 0;
            font-size: 14px;
            color: #000;
        }

        .recent-post li:hover {
            background-color: #8261ee;
            border-color: #8261ee;
            color: #fff;
        }

        .recent-post li:hover p {
            color: #fff;
        }
    </style>

    <style>
        /* Tags Section */
        .blog-tags {
            padding: 15px;
            background-color: #f7f7f7;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.4);
        }

        .blog-tags h5 {
            margin-bottom: 10px;
            font-weight: 700;
        }

        .blog-tags .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .blog-tags .tag {
            background-color: #8261ee;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .blog-tags .tag:hover {
            background-color: #28a745;
        }
    </style>
    <style>
        /* Consultancy */
        .consultancy {
            position: relative;
            background-size: cover;
            padding: 60px 70px;
            border-radius: 10px;
            text-align: center;
            overflow: hidden;
            margin-top: 24px;
        }


        /* Overlay shade */
        .consultancy::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            /* Dark shade overlay */
            border-radius: 10px;
        }

        /* Text styling */
        .consultancy h5 {
            position: relative;
            color: #fff;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
            z-index: 2;
        }

        /* Call button */
        .consultancy .call-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            background: black;
            color: #fff;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
            z-index: 2;
        }

        .consultancy .call-btn:hover {
            background: #218838;
        }

        /* Phone icon */
        .consultancy .call-btn i {
            font-size: 18px;
            margin-right: 8px;
        }
    </style>

<style>
    /* Blog Image Overlay */
    .blog-image {
        position: relative;
        overflow: hidden;
        border-radius: 16px;

    }

    .blog-image img {
        width: 100%;
        display: block;
        border-radius: 16px;
    }

    .blog-image::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        transition: background 0.3s ease;
    }

    .blog-image:hover::after {
        background: rgba(0, 0, 0, 0.7);
    }
    /* Author Info */
    .author-info {
        margin-top: 20px;
        padding: 15px;
        background: #f7f7f7;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        border-radius: 16px;
    }

    .author-info img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 15px;
    }
    .author-info h5{
        font-weight: 600;
    }
    .blog-details{
        margin: 16px 0;
    }
    .blog-details h5 {
    font-size: 22px;
    margin-bottom: 15px;
}

.blog-details p {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
}
</style>
@endsection

@section('content')
    @include('frontend.pages.partials.hero-area')
    <section class="section colored" id="single-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="blog-categories">
                        <h5>Blog Categories</h5>
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

                            <li>
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
                    <div class="recent-post">
                        <h5>Recent Posts</h5>
                        <hr>
                        <ul class="list-unstyled">
                            <li>
                                <img src="https://random.imagecdn.app/500/150">
                                <div>
                                    <p>28 October 2024</p>
                                    <p>Lorem ipsum dolor sit amet consectetur </p>
                                </div>
                            </li>
                            <li>
                                <img src="https://random.imagecdn.app/500/150">
                                <div>
                                    <p>28 October 2024</p>
                                    <p>Lorem ipsum dolor sit amet consectetur </p>
                                </div>
                            </li>
                            <li>
                                <img src="https://random.imagecdn.app/500/150">
                                <div>
                                    <p>28 October 2024</p>
                                    <p>Lorem ipsum dolor sit amet consectetur </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="blog-tags">
                        <h5>Tags</h5>
                        <hr>
                        <div class="tag-list">
                            <span class="tag">Technology</span>
                            <span class="tag">Education</span>
                            <span class="tag">Health</span>
                            <span class="tag">Business</span>
                            <span class="tag">Design</span>
                            <span class="tag">Marketing</span>
                            <span class="tag">Science</span>
                            <span class="tag">Food</span>
                            <span class="tag">Travel</span>
                            <span class="tag">Lifestyle</span>
                        </div>
                    </div>
                    <div class="consultancy">
                        <h5>Need An Consultancy</h5>
                        <a href="tel:+1234567890" class="call-btn">
                            <i class="fas fa-phone-alt"></i> Call Now
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-12">
                    <div class="blog-right-side">
                        <div class="blog-image">
                            <img src="{{ asset('frontend/images/blog-image-1.PNG') }}" alt="">
                            
                        </div>
                        <div class="author-info">
                            <img src="https://random.imagecdn.app/500/150" alt="Author">
                            <div>
                                <h5>John Doe</h5>
                                <p>Published on: {{ date('F d, Y') }}</p>
                            </div>
                        </div>
                        <div class="blog-details">
                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia quam sit amet arcu feugiat, sit amet efficitur ligula tincidunt. Suspendisse potenti. Aenean nec libero non urna eleifend viverra. Sed et purus mauris. Duis scelerisque urna a orci venenatis, ac vehicula felis sollicitudin.</p>
                            <p>Curabitur et varius odio. Sed ut pharetra arcu. Nullam iaculis, mauris ac tincidunt egestas, nunc dui ullamcorper metus, id facilisis orci urna eu urna. Integer hendrerit urna non nisl hendrerit, nec tempor nulla tincidunt. Nam scelerisque est non erat tempus, id suscipit purus elementum.</p>
                            
                            <p>Aliquam erat volutpat. Donec consectetur sapien quis lorem volutpat, vel fermentum sem ullamcorper. Vivamus ac turpis ac risus malesuada feugiat. Phasellus at nisi libero. Aliquam luctus nisi in ligula feugiat, vitae tincidunt lorem convallis. Cras consequat mollis turpis, a volutpat felis tincidunt vel.</p>
                            
                            <p>Donec et libero ac elit auctor sodales. Nulla ultricies, felis vel iaculis facilisis, sapien nunc bibendum purus, non aliquam dui mi nec ipsum. In ultricies dolor sit amet felis mollis, non aliquet felis tristique. Ut euismod libero at lectus venenatis, sed vulputate ipsum gravida.</p>
                            
                            <p><strong>Key Takeaways:</strong></p>
                            <ul>
                                <li>Understanding the importance of responsive design for modern web applications.</li>
                                <li>Best practices for structuring code to enhance readability and maintainability.</li>
                                <li>The role of cross-browser compatibility in ensuring a seamless user experience.</li>
                            </ul>
                            
                            <p>In conclusion, adopting a user-centric approach to web development is essential. By focusing on both functionality and design, developers can create more intuitive and effective applications that meet user needs and expectations.</p>
                            
                            <div class="tags">
                                <p><strong>Tags:</strong> Web Development, Programming, Frontend, UX/UI Design, Technology</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
