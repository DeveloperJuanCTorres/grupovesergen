@extends('layouts.app')

@section('content')
<style>
    body {
        display: block !important;
    }

    .filter-panel {
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        border: 1px solid #eee;
    }

    .filter-scroll {
        max-height: 260px;
        overflow-y: auto;
    }

    .filter-option {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 14px;
        padding: 6px 0;
        cursor: pointer;
    }

    .filter-option input {
        margin-right: 8px;
    }

    .filter-option span {
        flex: 1;
    }

    .filter-option small {
        background: #f1f1f1;
        border-radius: 10px;
        padding: 2px 6px;
        font-size: 12px;
    }

    .filter-option:hover {
        color: #0d6efd;
    }

    .promo-bar {
        background: linear-gradient(90deg, #007dc3, #005fa3);
        color: #fff;
        overflow: hidden;
        white-space: nowrap;
        position: relative;
        padding: 12px 0;
        font-weight: 500;
        font-size: 15px;
    }

    .promo-track {
        display: flex;
        width: max-content;
        animation: scrollPromo 15s linear infinite;
    }

    .promo-content {
        display: inline-block;
        padding-right: 50px;
    }

    @keyframes scrollPromo {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-50%);
        }
    }






    .add-to-cart {
    --background-default: #015fc9;
    --background-hover: #0A0A0C;
    --background-scale: 1;
    --text-color: #fff;
    --text-o: 1;
    --text-x: 12px;
    --cart: #fff;
    --cart-x: -68px;
    --cart-y: 0px;
    --cart-rotate: 0deg;
    --cart-scale: .75;
    --cart-clip: 0px;
    --cart-clip-x: 0px;
    --cart-tick-offset: 10px;
    --cart-tick-color: #FF328B;
    --shirt-y: -16px;
    --shirt-scale: 0;
    --shirt-color: #17171B;
    --shirt-logo: #fff;
    --shirt-second-y: 24px;
    --shirt-second-color: #fff;
    --shirt-second-logo: #17171B;
    -webkit-tap-highlight-color: transparent;
    -webkit-appearance: none;
    outline: none;
    background: none;
    border: none;
    padding: 8px 0;
    width: 164px;
    margin: 0;
    cursor: pointer;
    position: relative;
    font-family: inherit;
    }
    .add-to-cart:before {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    border-radius: 10px;
    transition: background 0.25s;
    background: var(--background, var(--background-default));
    transform: scaleX(var(--background-scale)) translateZ(0);
    }
    .add-to-cart:not(.active):hover {
    --background: var(--background-hover);
    }
    .add-to-cart span {
    display: block;
    text-align: center;
    position: relative;
    z-index: 1;
    font-size: 14px;
    font-weight: 600;
    line-height: 24px;
    color: var(--text-color);
    opacity: var(--text-o);
    transform: translateX(var(--text-x)) translateZ(0);
    }
    .add-to-cart svg {
    display: block;
    width: var(--svg-width, 24px);
    height: var(--svg-height, 24px);
    position: var(--svg-position, relative);
    left: var(--svg-left, 0);
    top: var(--svg-top, 0);
    stroke-linecap: round;
    stroke-linejoin: round;
    }
    .add-to-cart svg path {
    fill: var(--svg-fill, none);
    stroke: var(--svg-stroke, none);
    stroke-width: var(--svg-stroke-width, 2);
    }
    .add-to-cart .morph {
    --svg-width: 64px;
    --svg-height: 13px;
    --svg-left: 50%;
    --svg-top: -12px;
    --svg-position: absolute;
    --svg-fill: var(--background, var(--background-default));
    transition: fill 0.25s;
    pointer-events: none;
    margin-left: -32px;
    }
    .add-to-cart .shirt,
    .add-to-cart .cart {
    pointer-events: none;
    position: absolute;
    left: 50%;
    }
    .add-to-cart .shirt {
    margin: -12px 0 0 -12px;
    top: 0;
    transform-origin: 50% 100%;
    transform: translateY(var(--shirt-y)) scale(var(--shirt-scale));
    }
    .add-to-cart .shirt svg {
    --svg-fill: var(--shirt-color);
    }
    .add-to-cart .shirt svg g {
    --svg-fill: var(--svg-g-fill, var(--shirt-logo));
    }
    .add-to-cart .shirt svg.second {
    --svg-fill: var(--shirt-second-color);
    --svg-g-fill: var(--shirt-second-logo);
    --svg-position: absolute;
    -webkit-clip-path: polygon(0 var(--shirt-second-y), 24px var(--shirt-second-y), 24px 24px, 0 24px);
            clip-path: polygon(0 var(--shirt-second-y), 24px var(--shirt-second-y), 24px 24px, 0 24px);
    }
    .add-to-cart .cart {
    --svg-width: 36px;
    --svg-height: 26px;
    --svg-stroke: var(--cart);
    top: 7px;
    margin-left: -18px;
    transform: translate(var(--cart-x), var(--cart-y)) rotate(var(--cart-rotate)) scale(var(--cart-scale)) translateZ(0);
    }
    .add-to-cart .cart:before {
    content: "";
    display: block;
    width: 22px;
    height: 12px;
    position: absolute;
    left: 7px;
    top: 7px;
    background: var(--cart);
    -webkit-clip-path: polygon(0 0, 22px 0, calc(22px - var(--cart-clip-x)) var(--cart-clip), var(--cart-clip-x) var(--cart-clip));
            clip-path: polygon(0 0, 22px 0, calc(22px - var(--cart-clip-x)) var(--cart-clip), var(--cart-clip-x) var(--cart-clip));
    }
    .add-to-cart .cart path.wheel {
    --svg-stroke-width: 1.5;
    }
    .add-to-cart .cart path.tick {
    --svg-stroke: var(--cart-tick-color);
    stroke-dasharray: 10px;
    stroke-dashoffset: var(--cart-tick-offset);
    }

    .white,
    .dark {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .dark {
    background: #17171B;
    }
    .dark .add-to-cart {
    --background-default: #fff;
    --background-hover: #F2F2F9;
    --text-color: #17171B;
    --cart: #17171B;
    --cart-tick-color: #FF328B;
    --shirt-color: #fff;
    --shirt-logo: #17171B;
    --shirt-second-color: #17171B;
    --shirt-second-logo: #fff;
    }

    html {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    }

    * {
    box-sizing: inherit;
    }
    *:before, *:after {
    box-sizing: inherit;
    }

    body {
    min-height: 100vh;
    display: flex;
    font-family: "Inter", Arial;
    background: #F2F2F9;
    }
    body .dribbble {
    position: fixed;
    display: block;
    right: 20px;
    bottom: 20px;
    }
    body .dribbble img {
    display: block;
    height: 28px;
    }
    body .twitter {
    position: fixed;
    display: block;
    right: 64px;
    bottom: 14px;
    }
    body .twitter svg {
    width: 32px;
    height: 32px;
    fill: #1da1f2;
    }

</style>

    @include('partials.topbar')

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light"> 
                <a href="/" class="navbar-brand p-0">
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
    <div class="container-fluid bg-breadcrumb-store" style="background: url('{{ asset(str_replace('\\', '/', 'storage/' . $page->image)) }}');background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-black display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{$page->title}}</h4>
              
        </div>
    </div>
    <!-- Header End -->

    <!-- Promo Bar Start -->
    <div class="promo-bar">
        <div class="promo-track">
            <div class="promo-content">
                @foreach($promociones as $promocion)
                @if($promocion->active == 1)
                    @if($promocion->product_id)
                        <a class="text-white" href="{{ route('product.detail', $promocion->product) }}">
                            {{ $promocion->name }}
                        </a>
                        &nbsp;&nbsp; | &nbsp;&nbsp;
                    @else                       
                        {{ $promocion->name }}
                        &nbsp;&nbsp; | &nbsp;&nbsp;
                    @endif
                @endif
                @endforeach
                <!-- 🚀 Envíos a todo el Perú &nbsp;&nbsp; | &nbsp;&nbsp;
                🔥 Descuentos exclusivos esta semana &nbsp;&nbsp; | &nbsp;&nbsp;
                💳 Paga con transferencia, Yape o Plin &nbsp;&nbsp; | &nbsp;&nbsp;
                🎁 Garantía en todos nuestros productos &nbsp;&nbsp; | &nbsp;&nbsp; -->
            </div>
            <div class="promo-content">
                @foreach($promociones as $promocion)
                @if($promocion->active == 1)
                    @if($promocion->product_id)
                        <a class="text-white" href="{{ route('product.detail', $promocion->product) }}">
                            {{ $promocion->name }}
                        </a>
                        &nbsp;&nbsp; | &nbsp;&nbsp;
                    @else
                        {{ $promocion->name }}
                        &nbsp;&nbsp; | &nbsp;&nbsp;
                    @endif
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Promo Bar End -->


    <!-- Shop Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <form id="filterForm" class="filter-panel">

                    <!-- Buscar -->
                    <div class="mb-3">
                        <input type="text" name="search" id="searchInput"
                            class="form-control form-control-sm"
                            placeholder="Buscar productos...">
                    </div>

                    <!-- Accordion -->
                    <div class="accordion" id="filterAccordion">

                        <!-- Categorías -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button py-2" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#filterCategories">
                                    Categorías
                                </button>
                            </h2>
                            <div id="filterCategories" class="accordion-collapse collapse show">
                                <div class="accordion-body filter-scroll">
                                    @foreach($categories as $category)
                                    <label class="filter-option">
                                        <input type="radio" name="category"
                                            value="{{ $category->id }}">
                                        <span>{{ $category->name }}</span>
                                        <small>{{ $category->productsInStock->count() }}</small>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Marcas -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button py-2 collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#filterBrands">
                                    Marcas
                                </button>
                            </h2>
                            <div id="filterBrands" class="accordion-collapse collapse">
                                <div class="accordion-body filter-scroll">
                                    @foreach($brands as $brand)
                                    <label class="filter-option">
                                        <input type="radio" name="brand"
                                            value="{{ $brand->id }}">
                                        <span>{{ $brand->name }}</span>
                                        <small>{{ $brand->productsInStock->count() }}</small>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Caracteristicas -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button py-2 collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#filterTypes">
                                    Características
                                </button>
                            </h2>
                            <div id="filterTypes" class="accordion-collapse collapse">
                                <div class="accordion-body filter-scroll">
                                    @foreach($types as $type)
                                    <label class="filter-option">
                                        <input type="radio" name="type"
                                            value="{{ $type->id }}">
                                        <span>{{ $type->name }}</span>
                                        <small>{{ $type->productsInStock->count() }}</small>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Limpiar -->
                    <button type="button" id="resetFilters"
                            class="btn btn-outline-danger btn-sm w-100 mt-3">
                        Limpiar filtros
                    </button>

                </form>
            </div>

            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <!-- Spinner oculto al principio -->
                <div id="loadingSpinner" class="hidden absolute inset-0 flex items-center justify-center bg-white bg-opacity-75 z-10">
                    <div class="w-12 h-12 border-4 border-blue-500 border-dashed rounded-full animate-spin"></div>
                </div>
                <div class="row pb-3" id="productContainer">
                    @include('product-list')
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    @include('partials.footer')
    @include('partials.whatsapp')
    

@push('scripts')


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/addcart.js') }}?v={{ time() }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const container = document.getElementById('productContainer');

        if (!container) {
            console.error("No existe #product-container");
            return;
        }

        function fetchProducts(page = 1) {

            const params = new URLSearchParams();

            const search = document.querySelector('[name="search"]')?.value;
            const category = document.querySelector('[name="category"]:checked')?.value;
            const brand = document.querySelector('[name="brand"]:checked')?.value;
            const type = document.querySelector('[name="type"]:checked')?.value;

            if (search) params.append('search', search);
            if (category) params.append('category', category);
            if (brand) params.append('brand', brand);
            if (type) params.append('type', type);

            params.append('page', page);

            console.log("Enviando filtros:", params.toString());

            container.style.opacity = "0.4";

            fetch(`{{ route('store') }}?${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(response => response.text())
            .then(html => {
                container.innerHTML = html;
                container.style.opacity = "1";
            })
            .catch(error => {
                console.error("Error AJAX:", error);
                container.style.opacity = "1";
            });
        }

        // EVENTO FILTROS
        document.addEventListener('change', function (e) {
            if (
                e.target.matches('[name="category"]') ||
                e.target.matches('[name="brand"]') ||
                e.target.matches('[name="type"]')
            ) {
                fetchProducts(1);
            }
        });

        // BUSCADOR
        document.addEventListener('input', function (e) {
            if (e.target.matches('[name="search"]')) {
                fetchProducts(1);
            }
        });

        // PAGINACIÓN
        document.addEventListener('click', function (e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                const url = new URL(e.target.closest('a').href);
                const page = url.searchParams.get('page');
                fetchProducts(page);
            }
        });

        // LIMPIAR FILTROS
        document.addEventListener('click', function (e) {
            if (e.target.closest('#resetFilters')) {

                // limpiar radios
                document.querySelectorAll('[name="category"]').forEach(el => el.checked = false);
                document.querySelectorAll('[name="brand"]').forEach(el => el.checked = false);
                document.querySelectorAll('[name="type"]').forEach(el => el.checked = false);

                // limpiar buscador
                const searchInput = document.querySelector('[name="search"]');
                if (searchInput) searchInput.value = '';

                // volver a cargar productos
                fetchProducts(1);
            }
        });

    });
</script>



<!-- ==============================
     ANIMACIÓN ADD TO CART (DELEGADO)
============================== -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/gsap.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin3.min.js"></script>

<script>
    gsap.registerPlugin(MorphSVGPlugin);

    /* EVENTO DELEGADO → NO SE ROMPE CON AJAX */
    document.addEventListener('click', function(e) {

        const button = e.target.closest('.add-to-cart');
        if (!button) return;

        e.preventDefault();
        if(button.classList.contains('active')) return;

        const morph = button.querySelector('.morph path');
        const shirt = button.querySelectorAll('.shirt svg > path');

        button.classList.add('active');

        gsap.to(button, {
            keyframes: [{
                '--background-scale': .97,
                duration: .15
            }, {
                '--background-scale': 1,
                delay: .125,
                duration: 1.2,
                ease: 'elastic.out(1, .6)'
            }]
        });

        gsap.to(button, {
            keyframes: [{
                '--shirt-scale': 1,
                '--shirt-y': '-42px',
                '--cart-x': '0px',
                '--cart-scale': 1,
                duration: .4,
                ease: 'power1.in'
            }, {
                '--shirt-y': '-40px',
                duration: .3
            }, {
                '--shirt-y': '16px',
                '--shirt-scale': .9,
                duration: .25
            }, {
                '--shirt-scale': 0,
                duration: .3
            }]
        });

        gsap.to(button, {
            keyframes: [{
                '--cart-clip': '12px',
                '--cart-clip-x': '3px',
                delay: .9,
                duration: .06
            }, {
                '--cart-y': '2px',
                duration: .1
            }, {
                '--cart-tick-offset': '0px',
                '--cart-y': '0px',
                duration: .2
            }, {
                '--cart-x': '52px',
                '--cart-rotate': '-15deg',
                duration: .2
            }, {
                '--cart-x': '104px',
                '--cart-rotate': '0deg',
                duration: .2,
                onComplete() {
                    button.classList.remove('active');
                }
            }]
        });

    });
</script>


@endpush

@endsection