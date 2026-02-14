@extends('layouts.app')

@section('content')

    @include('partials.topbar')

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light"> 
                <a href="/" class="navbar-brand p-0">
                    <!-- <h1 class="text-primary mb-0"><i class="fab fa-slack me-2"></i> LifeSure</h1> -->
                    <img src="{{asset('storage/' . $business->image)}}" width="200" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-0 mx-lg-auto">
                        <a href="/" class="nav-item nav-link">Inicio</a>
                        <a href="/about" class="nav-item nav-link">Nosotros</a>
                        <div class="nav-item dropdown">
                            <a href="" class="nav-link" data-bs-toggle="dropdown">
                                <span class="dropdown-toggle">Servicios</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="/facturacion" class="dropdown-item">Facturación Electrónica</a>
                                @foreach($services as $service)
                                <a href="{{route('service.detail', $service)}}" class="dropdown-item">{{$service->title}}</a>
                                @endforeach
                                <a href="/services" class="dropdown-item">Todos los servicios</a>
                            </div>
                        </div>
                        <a href="/store" class="nav-item nav-link active">Tienda</a>
                        
                        @if(config('features.vistas'))
                        <a href="/blog" class="nav-item nav-link">Blog</a>
                        @endif
                        <a href="/contact" class="nav-item nav-link">Contáctanos</a>
                       
                        @if(config('features.vistas'))
                        <a href="/sorteo" class="nav-item nav-link">Sorteo</a>
                        @endif
                        
                        <div class="nav-btn px-3">
                            <!-- <button class="btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button> -->
                            <a href="/cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary" style="font-size: 20px;"></i>
                                <span id="cartCount" class="badge text-secondary border border-secondary rounded-circle">
                                    {{\Cart::count()}}
                                </span>
                            </a>
                            <!-- <a href="#" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"> Live Chat</a> -->
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

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb-store" style="background: linear-gradient(rgba(1, 95, 201, 0.9), rgba(0, 0, 0, 0.2)), url('{{ asset(str_replace('\\', '/', 'storage/' . $page->image)) }}');background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="max-width: 1200px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{$product->name}}</h4>
              
        </div>
    </div>
    <!-- Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid pb-5 pt-5">
    <div class="row px-xl-5">
        <!-- <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    @php
                        $imagenes = json_decode($product->images)
                    @endphp
                    @if($imagenes && count($imagenes) > 0)
                        @foreach($imagenes as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img class="w-100 h-100" src="{{asset('storage/' . $item)}}" alt="Image">
                        </div>
                        @endforeach
                    @else
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{asset('img/defectomaster.png')}}" alt="Image">
                    </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div> -->

        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">

                {{-- INDICADORES (puntitos) --}}
                <div class="carousel-indicators">
                    @foreach($imagenes as $key => $item)
                        <button type="button"
                                data-bs-target="#product-carousel"
                                data-bs-slide-to="{{ $key }}"
                                class="{{ $key == 0 ? 'active' : '' }}"
                                aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $key + 1 }}">
                        </button>
                    @endforeach
                </div>

                {{-- IMÁGENES --}}
                <div class="carousel-inner bg-light">
                    @foreach($imagenes as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $item) }}"
                                class="d-block w-100"
                                style="object-fit: contain; height: 400px;"
                                alt="Imagen {{ $key + 1 }}">
                        </div>
                    @endforeach
                </div>

                {{-- CONTROLES --}}
                <button class="carousel-control-prev"
                        type="button"
                        data-bs-target="#product-carousel"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next"
                        type="button"
                        data-bs-target="#product-carousel"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            {{-- MINIATURAS --}}
            <div class="d-flex mt-3 gap-2 justify-content-center flex-wrap">
                @foreach($imagenes as $key => $item)
                    <img src="{{ asset('storage/' . $item) }}"
                        class="img-thumbnail"
                        style="width: 70px; height: 70px; object-fit: cover; cursor: pointer;"
                        data-bs-target="#product-carousel"
                        data-bs-slide-to="{{ $key }}">
                @endforeach
            </div>
        </div>


        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-4">
                <h3>{{$product->name}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(99 Reviews)</small>
                </div>
               
                <div class="mt-2">
                    @auth
                    <h5 class="text-muted ml-2 mx-2"><del>S/. {{number_format($product->price, 2)}}</del></h5><h3 class="price-tecnico">S/. {{number_format($product->price_tecnico * $business->tipo_cambio, 2)}} - $ {{number_format($product->price_tecnico, 2)}}</h3>
                    @else
                    <h3 class="price-tecnico">S/. {{number_format($product->price * $business->tipo_cambio, 2)}} - $ {{number_format($product->price, 2)}}</h3>
                    @endauth
                </div>
                <p class="mb-4">{{$product->description_corta}}</p>

                <div class="d-flex mb-3">
                    <strong class="text-dark me-2">Código : </strong>
                    <label class=""> {{$product->codigo}}</label>
                </div>
                <div class="d-flex mb-3">
                    <strong class="text-dark me-2">Categoría : </strong>
                    <label class=""> {{$product->taxonomy->name}}</label>
                </div>
                <div class="d-flex mb-4">
                    <strong class="text-dark me-2">Marca : </strong>
                    <label class=""> {{$product->brand->name}}</label>
                </div>
                <div class="d-flex mb-4">
                    <strong class="text-dark me-2">Stock : </strong>
                    <label class=""> {{$product->stock}} Unidades</label>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3 px-2" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary border-0 text-center" value="1" id="qty">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary px-3 addcart" data-id="{{$product->id}}">
                        <i class="fa fa-shopping-cart mr-1"></i> 
                        Agregar al carrito
                    </a>
                </div>
                <!-- <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="row px-xl-5 pt-4">
        <div class="col">
            <div class="bg-light p-30">

                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active"
                    data-bs-toggle="tab"
                    href="#tab-info">
                        Información
                    </a>
                    <a class="nav-item nav-link text-dark"
                    data-bs-toggle="tab"
                    href="#tab-description">
                        Descripción
                    </a>
                </div>

                <div class="tab-content">

                    <div class="tab-pane fade show active p-4" id="tab-info">
                        <h4 class="mb-3">Información del Producto</h4>
                        <p>{!! Str::markdown($product->information) !!}</p>
                    </div>

                    <div class="tab-pane fade p-4" id="tab-description">
                        <h4 class="mb-3">Descripción del Producto</h4>
                        <p>{!! Str::markdown($product->description) !!}</p>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- <div class="row px-xl-5 pt-4">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active">Información</a>
                    <a class="nav-item nav-link text-dark">Descripcion</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active p-4" id="tab-pane-1">
                        <h4 class="mb-3">Información del Producto</h4>
                        <p>{!! Str::markdown($product->information) !!}</p>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade p-4" id="tab-pane-1">
                        <h4 class="mb-3">Información del Producto</h4>
                        <p>{!! Str::markdown($product->information) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<!-- Shop Detail End -->
 
<!-- Products Start -->
<div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="pr-3">También te puede interesar</span></h2>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                @foreach($relatedProducts as $product)
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        @php
                            $imagenes = json_decode($product->images)
                        @endphp
                        @if(is_array($imagenes) && count($imagenes) > 0)
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $imagenes[0]) }}" alt="">
                        @else
                        <img class="img-fluid w-100" src="{{asset('img/defectomaster.jpeg')}}" alt="">
                        @endif
                        <div class="product-action">
                            <input type="hidden" id="qty" value="1">
                            <a class="btn btn-outline-dark addcart" href="#" data-id="{{$product->id}}">
                                <i class="fa fa-shopping-cart"></i>
                                Agregar al carrito
                            </a>
                            <a class="btn btn-outline-dark" href="{{route('product.detail', $product)}}">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>S/. {{$product->price}}</h5><h6 class="text-muted ml-2"><del>S/. {{$product->price*1.20}}</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small>Stock ({{$product->stock}} {{$product->unidad_medida}})</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Products End -->

    @include('partials.footer')
    @include('partials.whatsapp')

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{asset('js/addcart.js')}}"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.related-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive:{
                    0:{ items:1 },
                    576:{ items:2 },
                    768:{ items:3 },
                    992:{ items:4 }
                }
            });
        });
    </script>
    @endpush

@endsection