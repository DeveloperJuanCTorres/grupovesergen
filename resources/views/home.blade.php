@extends('layouts.app')

@section('content')

    @include('partials.topbar')


    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light"> 
                <a href="/" class="navbar-brand p-0">
                    <!-- <h1 class="text-primary mb-0"><i class="fab fa-slack me-2"></i> LifeSure</h1> -->
                    <img src="storage/{{$business->image}}" width="200" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-0 mx-lg-auto">
                        <a href="/" class="nav-item nav-link active">Inicio</a>
                        <a href="/about" class="nav-item nav-link">Nosotros</a>
                        <div class="nav-item dropdown">
                            <a href="" class="nav-link" data-bs-toggle="dropdown">
                                <span class="dropdown-toggle">Servicios</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="/facturacion" class="dropdown-item">Facturación Electrónica</a>
                                @foreach($services as $service)
                                <a href="" class="dropdown-item">{{$service->title}}</a>
                                @endforeach
                                <a href="/services" class="dropdown-item">Todos los servicios</a>
                            </div>
                        </div>
                        <a href="/store" class="nav-item nav-link">Tienda</a>
                        <a href="/blog" class="nav-item nav-link">Blog</a>
                        <!-- <a href="blog.html" class="nav-item nav-link">Blog</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <span class="dropdown-toggle">Pages</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="feature.html" class="dropdown-item">Our Features</a>
                                <a href="team.html" class="dropdown-item">Our team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="FAQ.html" class="dropdown-item">FAQs</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div> -->
                        <a href="/contact" class="nav-item nav-link">Contáctanos</a>
                        <div class="nav-btn px-3">
                            <!-- <button class="btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button> -->
                            <a href="/cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary" style="font-size: 20px;"></i>
                                <span id="cartCount" class="badge text-secondary border border-secondary rounded-circle">
                                    {{\Cart::count()}}
                                </span>
                            </a>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"> Live Chat</a>
                        </div>
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                    <a href="#" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                        <i class="fa fa-phone-alt fa-2x"></i>
                        <div class="position-absolute" style="top: 7px; right: 12px;">
                            <span><i class="fa fa-comment-dots text-secondary"></i></span>
                        </div>
                    </a>
                    <div class="d-flex flex-column ms-3">
                        <span>Llama a nuestros expertos</span>
                        <a href="tel:+ 0123 456 7890"><span class="text-dark">{{$business->phone}}</span></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center bg-primary">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel destock">
        @foreach($banners as $banner)
        <div class="header-carousel-item" style="background: linear-gradient(rgba(1, 95, 201, 0.9), rgba(0, 0, 0, 0.2)),url('{{ asset(str_replace('\\', '/', 'storage/' . $banner->image)) }}');background-size: cover; background-position: center;">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-start">
                                <h4 class="text-white text-uppercase fw-bold mb-4">{{$banner->subtitulo}}</h4>
                                <h1 class="display-1 text-white mb-4">{{$banner->titulo}}</h1>
                                <p class="mb-5 fs-5">{{$banner->description}}
                                </p>
                                @if($banner->texto_boton)
                                <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                    <!-- <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a> -->
                                    <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="{{$banner->enlace_boton}}">{{$banner->texto_boton}}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="col-lg-5 animated fadeInRight">
                            <div class="calrousel-img" style="object-fit: cover;">
                                <img src="storage/{{$banner->image}}" class="img-fluid w-100" alt="">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach        
    </div>

    <div class="header-carousel owl-carousel mobil">
        @foreach($banners as $banner)
        <div class="header-carousel-item" style="background: linear-gradient(rgba(1, 95, 201, 0.9), rgba(0, 0, 0, 0.2)),url('{{ asset(str_replace('\\', '/', 'storage/' . $banner->image_mobil)) }}');background-size: cover; background-position: center;">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-start">
                                <h4 class="text-white text-uppercase fw-bold mb-4">{{$banner->subtitulo}}</h4>
                                <h1 class="display-1 text-white mb-4">{{$banner->titulo}}</h1>
                                <p class="mb-5 fs-5">{{$banner->description}}
                                </p>
                                @if($banner->texto_boton)
                                <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                    <!-- <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a> -->
                                    <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="{{$banner->enlace_boton}}">{{$banner->texto_boton}}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="col-lg-5 animated fadeInRight">
                            <div class="calrousel-img" style="object-fit: cover;">
                                <img src="storage/{{$banner->image}}" class="img-fluid w-100" alt="">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- <div class="header-carousel-item bg-primary">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">
                        <div class="col-lg-5 animated fadeInLeft">
                            <div class="calrousel-img">
                                <img src="img/img-facturacion.png" class="img-fluid w-100" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 animated fadeInRight">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-white text-uppercase fw-bold mb-4">Bienvenido a VesergenPeru</h4>
                                <h1 class="display-1 text-white mb-4">Facturación Electrónica</h1>
                                <p class="mb-5 fs-5">Para más información sobre nuestras soluciones de facturación electrónica y cómo pueden beneficiar a tu empresa, no dudes en contactarnos.
                                </p>
                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="/facturacion">Más información</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Carousel End -->

    <!-- Feature Start -->
    <!-- <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Nuestras Características</h4>
                <h1 class="display-4 mb-4">El seguro te proporciona un futuro mejor</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                @foreach($caracteristicas as $item)
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            @if($item->icon)
                            {!! Str::markdown($item->icon) !!}
                            @else
                            <svg class="icon-svg" id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300">
                                <path d="M3.61,165.6c0-8.37,0-16.74,0-25.11.12-.65.29-1.3.36-1.95,2.68-26,11.51-49.69,26.81-70.92C66.49,18.03,127.93-3.87,186.16,11.26c74.93,19.47,121.91,92.04,107.31,168-11.36,59.16-47.64,97.27-105.2,115.02-8.65,2.67-17.63,3.77-26.59,4.85h-23.97c-4.79-.69-9.64-1.09-14.36-2.1-58.66-12.6-96.87-47.67-114.78-104.87-2.7-8.64-3.8-17.62-4.97-26.56ZM149.75,30.02c-68.08.59-122.83,54.18-122.94,122.9-.1,67.95,53.85,122.85,122.7,123,68.3.16,123.07-54.19,123.07-122.91,0-68.32-54.33-122.34-122.84-123Z""/>
                                <path d="M137.68,80c8.55.25,16.96-.58,25.25.93,19.21,3.48,33.49,21.13,32.72,41.46-.68,18.27-15.06,34.79-33.73,37.76q-5.82.92-6.34,6.71c-.52,5.72-5.84,10.4-11.75,10.31-5.95-.08-11.23-4.83-11.4-10.62-.19-6.17-.16-12.36-.01-18.54.13-5.34,4.48-9.84,9.86-10.56,4.92-.66,9.88-.07,14.82-.45,7.16-.56,13.33-6.08,14.67-13.09,2.05-10.78-5.65-20.17-16.8-20.26-13.12-.11-26.24.02-39.37-.06-7.47-.04-12.57-5.99-11.7-13.4.58-4.97,4.86-9.28,10.05-9.8,7.97-.79,15.96-.1,23.74-.38Z"/>
                                <path d="M159.61,206.32c-.03,8.72-6.84,15.49-15.6,15.5-8.87.01-15.67-6.84-15.64-15.76.03-8.68,6.92-15.54,15.6-15.55,8.81,0,15.67,6.93,15.64,15.8Z"/>
                            </svg>
                            @endif
                        </div>
                        <h4 class="mb-4">{{$item->title}}</h4>
                        <p class="mb-4" style="text-align: justify;">{!! Str::markdown($item->description) !!}
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Leer más</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> -->
    <!-- Feature End -->

    <!-- About Start -->
    <div class="container-fluid bg-light about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item-content bg-white rounded p-5 h-100">
                        <h4 class="text-primary">Grupo VesergenPerú</h4>
                        <h1 class="display-4 mb-4">¿Quiénes somos?</h1>
                        <p>Bienvenidos a Grupo VesergenPerú, su aliado estratégico en soluciones informáticas.
                            Somos una empresa peruana dedicada a ofrecer servicios y productos tecnológicos de alta calidad, diseñados para potenciar el crecimiento y la eficiencia de su negocio.
                        </p>
                        <p>Grupo VesergenPerú nació con la visión de transformar la manera en que las empresas peruanas interactúan con la tecnología. Con años de experiencia en el sector, hemos evolucionado y crecido junto a nuestros clientes, adaptándonos a los cambios tecnológicos y a las necesidades del mercado.
                        </p>
                        <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>We can save your money.</p>
                        <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Production or trading of good</p>
                        <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Our life insurance is flexible</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Information</a>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-white rounded p-5 h-100">
                        <div class="row g-4 justify-content-center">
                            <div class="col-12">
                                <div class="rounded bg-light">
                                    <img src="storage/{{$business->banner}}" class="img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">129</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Insurance Policies</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">99</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Awards WON</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">556</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Skilled Agents</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">967</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Team Members</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Nuestros Servicios</h4>
                <h1 class="display-4 mb-4">¿Tienes algún problema informático?</h1>
                <p class="mb-0">Podemos resolver de manera rápida y eficiente cualquier problema informático que su empresa esté enfrentando a través de nuestra atención remota y presencial. Nuestro equipo de expertos está listo para ofrecer soluciones precisas y efectivas.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($services as $service)
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="storage/{{$service->image}}" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-users fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4">{{$service->title}}</a>
                                <p class="">{!! Str::markdown($service->description) !!}</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="/services">Más servicios</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- FAQs Start -->
    <div class="container-fluid faq-section bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="h-100">
                        <div class="mb-5">
                            <h4 class="text-primary">Algunas preguntas frecuentes importantes</h4>
                            <h1 class="display-4 mb-0">Preguntas frecuentes comunes</h1>
                        </div>
                        <div class="accordion" id="accordionExample">
                            @foreach($questions as $key => $item)
                            <div class="accordion-item">                                
                                @if($key == 0)
                                <h2 class="accordion-header" id="heading{{$key}}">
                                    <button class="accordion-button border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                        Q: {{$item->pregunta}}
                                    </button>
                                </h2>
                                <div id="collapse{{$key}}" class="accordion-collapse collapse show active" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body rounded">
                                        {{$item->respuesta}}
                                    </div>
                                </div>
                                @else
                                <h2 class="accordion-header" id="heading{{$key}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                        Q: {{$item->pregunta}}
                                    </button>
                                </h2>
                                <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{$item->respuesta}}
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <img src="img/questions.png" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->

    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pt-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Nuestro Equipo</h4>
                <h1 class="display-4 mb-4">Conozca a los miembros de nuestro equipo de expertos</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                @foreach($teams as $team)
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="storage/{{$team->image}}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="{{$team->link_facebook}}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" target="_blank" href="{{$team->link_linkeding}}"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" target="_blank" href="{{$team->link_instagram}}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">{{$team->name}}</h4>
                            <p class="mb-0">{{$team->profesion}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial pb-5 py-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Testimonial</h4>
                <h1 class="display-4 mb-4">What Our Customers Are Saying</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="img/testimonial-1.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="img/testimonial-2.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="img/testimonial-3.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
   
    @include('partials.footer')
    @include('partials.whatsapp')

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/addcart.js"></script>
<script>
    const baseUrl = "{{ url('/product.detail') }}"; // Esto será "/producto"
</script>
@endpush

@endsection
