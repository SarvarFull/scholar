<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Main | Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">



    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <h1>Scholar</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Serach Start ***** -->
                        {{-- <div class="search-input">
                            <form id="search" action="#">
                                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                                    onkeypress="handle" />
                                <i class="fa fa-search"></i>
                            </form>
                        </div> --}}
                        <!-- ***** Serach Start ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#courses">Courses</a></li>
                            <li class="scroll-to-section"><a href="#team">Team</a></li>
                            <li class="scroll-to-section"><a href="#events">Events</a></li>
                            <li class="scroll-to-section"><a href="#contact">Register Now!</a></li>
                            <li><a href="{{ route('admin.register.page') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                                        <path
                                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                                    </svg>
                                </a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-banner">

                        @foreach ($sliders as $slider)
                            <div class="item item-{{ $slider->id }}">
                                <div class="header-text">
                                    <span class="category">Our Courses</span>
                                    <h2>{{ $slider->title }}</h2>
                                    <p>{{ $slider->content }}</p>
                                    <div class="buttons">
                                        <div class="main-button">
                                            <a href="#courses">Our Courses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ $slider->index }}
                            <style>
                                .main-banner .item-{{ $slider->id }} {
                                    background-image: url({{ asset($slider->image) }});
                                }
                            </style>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services section" id="services">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="icon">
                                <img src="{{ asset($service->image) }}" alt="online degrees">
                            </div>
                            <div class="main-content">
                                <h4>{{ $service->title }}</h4>
                                <p>{{ $service->about }}</p>
                                <div class="main-button">
                                    {{-- <a href="#">Read More</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-1">
                    <div class="accordion" id="accordionExample">
                        @foreach ($about_us as $about)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $about->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $about->id }}"
                                        aria-expanded="{{ $about->id == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $about->id }}">
                                        {{ $about->q_title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $about->id }}"
                                    class="accordion-collapse collapse {{ $about->id == 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $about->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $about->q_content }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <div class="section-heading">
                        <h6>About Us</h6>
                        <h2>What make us the best academy online?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravid risus commodo.</p>
                        <div class="main-button">
                            <a href="#">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section courses" id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>Latest Courses</h6>
                        <h2>Latest Courses</h2>
                    </div>
                </div>
            </div>
            {{-- <ul class="event_filter">
                <li>
                    <a class="is_active" href="#!" data-filter="*">Show All</a>
                </li>
                <form method="GET">
                    <input type="hidden" name="categories" id="categories" value="{{ $category_id }}">
                </form>
                @foreach ($categories as $category)
                    <li>
                        <a href="#!" data-filter="">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul> --}}
            <div class="row event_box">
                @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
                        <div class="events_item">
                            <div class="thumb">
                                <a href=""><img src="{{ asset($course->image) }}" alt=""></a>
                                <span class="category">{{ $course->category->name }}</span>
                                <span class="price">
                                    <h6><em>$</em>{{ $course->price }}</h6>
                                </span>
                            </div>
                            <div class="down-content">
                                <span class="author">{{ $course->teacher }}</span>
                                <h4>{{ $course->course }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="section fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="row">
                            @foreach ($indicators as $indicator)
                                <div class="col-lg-3 col-md-6">
                                    <div class="counter">
                                        <h2 class="timer count-title count-number"
                                            data-to="{{ $indicator->happy_students }}" data-speed="1000"></h2>
                                        <p class="count-text ">Happy Students</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="counter">
                                        <h2 class="timer count-title count-number"
                                            data-to="{{ $indicator->course_hours }}" data-speed="1000"></h2>
                                        <p class="count-text ">Course Hours</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="counter">
                                        <h2 class="timer count-title count-number"
                                            data-to="{{ $indicator->employed_students }}" data-speed="1000"></h2>
                                        <p class="count-text ">Employed Students</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="counter end">
                                        <h2 class="timer count-title count-number"
                                            data-to="{{ $indicator->years_experience }}" data-speed="1000"></h2>
                                        <p class="count-text ">Years Experience</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="team section" id="team">
        <div class="container">
            <div class="row">
                @foreach ($teachers as $teacher)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member">
                            <div class="main-content">
                                <img src="{{ asset($teacher->image) }}" alt="">
                                <span class="category">{{ $teacher->field }}</span>
                                <h4>{{ $teacher->fullname }}</h4>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-carousel owl-testimonials">
                        @foreach ($users as $user)
                            <div class="item">
                                <p>“{{ $user->message }}”</p>
                                <div class="author">
                                    @if ($user->image == null)
                                        <img src="{{ asset('none_logo.webp') }}" alt="">
                                    @else
                                        <img src="{{ asset($user->image) }}" alt="">
                                    @endif
                                    <h4>{{ $user->name }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <div class="section-heading">
                        <h6>TESTIMONIALS</h6>
                        <h2>What they say about us?</h2>
                        <p>You can search free CSS templates on Google using different keywords such as templatemo
                            portfolio, templatemo gallery, templatemo blue color, etc.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section events" id="events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>Schedule</h6>
                        <h2>Upcoming Events</h2>
                    </div>
                </div>
                @foreach ($events as $event)
                    <div class="col-lg-12 col-md-6">
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="image">
                                        <img src="{{ asset($event->image) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <ul>
                                        <li>
                                            <span class="category">{{ $event->category->name }}</span>
                                            <h4>{{ $event->course }}</h4>
                                        </li>
                                        <li>
                                            <span>Date:</span>
                                            <h6>{{ $event->date }}</h6>
                                        </li>
                                        <li>
                                            <span>Duration:</span>
                                            <h6>{{ $event->duration }}</h6>
                                        </li>
                                        <li>
                                            <span>Price:</span>
                                            <h6>${{ $event->price }}</h6>
                                        </li>
                                    </ul>
                                    <a href="#courses"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  align-self-center">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        @foreach ($contact_us as $contact)
                            <h2>{{ $contact->title }}</h2>
                            <p>{{ $contact->content }}</p>
                            <div class="special-offer">
                                <span class="offer">off<br><em>{{ $contact->discount }}%</em></span>
                                <h4>{{ $contact->d_contact }}</h4>
                                <a href="#courses"><i class="fa fa-angle-right"></i></a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <form id="contact-form" action="{{ route('users.register') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="name" name="name" id="name"
                                            placeholder="Your Name..." autocomplete="on">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 p-3">
                                    <fieldset>
                                        <input type="file" name="image" class="mt-3" id="image">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="email" name="email" id="email"
                                            placeholder="Your E-mail...">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="orange-button">Send Message
                                            Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright © 2036 Scholar Organization. All rights reserved. &nbsp;&nbsp;&nbsp; Design: <a
                        href="https://templatemo.com" rel="nofollow" target="_blank">TemplateMo</a> Distribution: <a
                        href="https://themewagon.com" rel="nofollow" target="_blank">ThemeWagon</a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
