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
<script src="js/addcart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('filterForm');
    const searchInput = document.getElementById('searchInput');
    const resetBtn = document.getElementById('resetFilters');
    const container = document.getElementById('productContainer');
    let timer;

    // Buscar con debounce
    searchInput.addEventListener('input', () => {
        clearTimeout(timer);
        timer = setTimeout(fetchProducts, 300);
    });

    // Filtros
    form.addEventListener('change', fetchProducts);

    // Limpiar
    resetBtn.addEventListener('click', () => {
        form.reset();
        updateURL('');
        fetchProducts();
    });

    function fetchProducts(page = 1) {
        const data = new FormData(form);
        data.append('page', page);

        fetch(`{{ route('store') }}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: data
        })
        .then(r => r.text())
        .then(html => {
            container.innerHTML = html;
            updateURL(new URLSearchParams(data).toString());
        });
    }

    function updateURL(params) {
        const url = params ? `?${params}` : location.pathname;
        history.replaceState({}, '', url);
    }

});
</script>

@endpush

@endsection