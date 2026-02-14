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
    console.log("STORE SCRIPT CARGADO");

    document.addEventListener("DOMContentLoaded", function () {

        console.log("DOM LISTO");

        const form = document.getElementById('filterForm');
        const searchInput = document.getElementById('searchInput');
        const resetBtn = document.getElementById('resetFilters');
        const container = document.getElementById('productContainer');

        console.log("form:", form);
        console.log("container:", container);

        if (!form || !container) {
            console.warn("No se encontraron elementos del filtro");
            return;
        }

        let timer;

        if (searchInput) {
            searchInput.addEventListener('input', () => {
                clearTimeout(timer);
                timer = setTimeout(() => fetchProducts(1), 400);
            });
        }

        form.addEventListener('change', function (e) {
            e.preventDefault();
            fetchProducts(1);
        });

        if (resetBtn) {
            resetBtn.addEventListener('click', () => {
                form.reset();
                updateURL('');
                fetchProducts(1);
            });
        }

        function fetchProducts(page = 1) {
            const params = new URLSearchParams(new FormData(form));
            params.set('page', page);

            fetch(`{{ route('store') }}?${params.toString()}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                credentials: 'same-origin'
            })
            .then(r => r.text())
            .then(html => {
                container.innerHTML = html;
                updateURL(params.toString());
            });
        }

        function updateURL(params) {
            const url = params ? `?${params}` : location.pathname;
            history.replaceState({}, '', url);
        }

    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/gsap.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin3.min.js"></script>
<script>
    gsap.registerPlugin(MorphSVGPlugin)

    document.querySelectorAll('.add-to-cart').forEach(button => {
        let morph = button.querySelector('.morph path'),
            shirt = button.querySelectorAll('.shirt svg > path')
        button.addEventListener('pointerdown', e => {
            if(button.classList.contains('active')) {
                return
            }
            gsap.to(button, {
                '--background-scale': .97,
                duration: .15
            })
        })
        button.addEventListener('click', e => {
            e.preventDefault()
            if(button.classList.contains('active')) {
                return
            }
            button.classList.add('active')
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
            })
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
                    duration: .25,
                    ease: 'none'
                }, {
                    '--shirt-scale': 0,
                    duration: .3,
                    ease: 'none'
                }]
            })
            gsap.to(button, {
                '--shirt-second-y': '0px',
                delay: .835,
                duration: .12
            })
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
                    duration: .2,
                    onComplete() {
                        button.style.overflow = 'hidden'
                    }
                }, {
                    '--cart-x': '52px',
                    '--cart-rotate': '-15deg',
                    duration: .2
                }, {
                    '--cart-x': '104px',
                    '--cart-rotate': '0deg',
                    duration: .2,
                    clearProps: true,
                    onComplete() {
                        button.style.overflow = 'hidden'
                        button.style.setProperty('--text-o', 0)
                        button.style.setProperty('--text-x', '0px')
                        button.style.setProperty('--cart-x', '-104px')
                    }
                }, {
                    '--text-o': 1,
                    '--text-x': '12px',
                    '--cart-x': '-48px',
                    '--cart-scale': .75,
                    duration: .25,
                    clearProps: true,
                    onComplete() {
                        button.classList.remove('active')
                    }
                }]
            })
            gsap.to(button, {
            keyframes: [{
                '--text-o': 0,
                duration: .3
            }]
            })

            gsap.to(morph, {
            keyframes: [{
                morphSVG: 'M0 12C6 12 20 10 32 0C43.9024 9.99999 58 12 64 12V13H0V12Z',
                duration: .25,
                ease: 'power1.out'
            }, {
                morphSVG: 'M0 12C6 12 17 12 32 12C47.9024 12 58 12 64 12V13H0V12Z',
                duration: .15,
                ease: 'none'
            }]
            })

            gsap.to(shirt, {
            keyframes: [
                {
                morphSVG: 'M4.99997 3L8.99997 1.5C8.99997 1.5 10.6901 3 12 3C13.3098 3 15 1.5 15 1.5L19 3L23.5 8L20.5 11L19 9.5L18 22.5C18 22.5 14 21.5 12 21.5C10 21.5 5.99997 22.5 5.99997 22.5L4.99997 9.5L3.5 11L0.5 8L4.99997 3Z',
                duration: .25,
                delay: .25
                },
                {
                morphSVG: 'M4.99997 3L8.99997 1.5C8.99997 1.5 10.6901 3 12 3C13.3098 3 15 1.5 15 1.5L19 3L23.5 8L20.5 11L19 9.5L18.5 22.5C18.5 22.5 13.5 22.5 12 22.5C10.5 22.5 5.5 22.5 5.5 22.5L4.99997 9.5L3.5 11L0.5 8L4.99997 3Z',
                duration: .85,
                ease: 'elastic.out(1, .5)'
                },
                {
                morphSVG: 'M12 2C6.48 2 2 6.48 2 12V17C2 18.1 2.9 19 4 19H5C6.1 19 7 18.1 7 17V13C7 11.9 6.1 11 5 11H4.5C4.5 7.36 7.36 4.5 11 4.5H13C16.64 4.5 19.5 7.36 19.5 11H19C17.9 11 17 11.9 17 13V17C17 18.1 17.9 19 19 19H20C21.1 19 22 18.1 22 17V12C22 6.48 17.52 2 12 2Z',
                duration: 0,
                delay: 1.25
                }
            ]
            })
        })
    })

</script>




@endpush

@endsection