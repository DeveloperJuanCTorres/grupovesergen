@extends('layouts.app')

@section('content')

    @include('partials.topbar')

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light"> 
                <a href="/" class="navbar-brand p-0">
                    <img src="img/logo-vesergen.png" width="200" alt="Logo">
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
                        <a href="/blog" class="nav-item nav-link">Blog</a>
                        <a href="/contact" class="nav-item nav-link">Contáctanos</a>
                      
                        <a href="/sorteo" class="nav-item nav-link">Sorteo</a>
                        
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
            <div class="col-lg-3 col-md-4 pt-4">
                <!-- Category Start -->
                <!-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">Filtrar por categoría</span></h5> -->
                 <form id="filterForm">
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control p-3" placeholder="Buscar producto" id="searchInput" value="{{ request('search') }}">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>                    
                    </div>

                    <div class="filtro-mobil pb-4">
                        <h4>Filtros</h4>
                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategoria" aria-controls="offcanvasCategoria">
                            <span class="badge bg-info text-dark">Categorías</span>                            
                        </a>
                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMarca" aria-controls="offcanvasMarca">
                            <span class="badge bg-info text-dark">Marcas</span>
                        </a>
                    </div>

                    <div class="offcanvas offcanvas-end offcanvas-70" tabindex="-1" id="offcanvasCategoria" aria-labelledby="offcanvasCategoriaLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasCategoriaLabel">Categorías</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            @foreach($categories as $key => $category)                        
                            <div class="additional-product-item d-flex align-items-center justify-content-between py-2">
                                <div class="d-flex align-items-center flex-grow-1 me-2">
                                    <input type="radio" class="me-2" id="categorym-{{$key}}" name="categories[]" value="{{ $category->id }}" {{ request('categories') == $category->id ? 'checked' : '' }}>
                                    <label for="categorym-{{$key}}" class="text-dark mb-0" style="font-size: 14px; word-break: break-word;">{{$category->name}}</label>
                                </div>
                                <span class="badge border font-weight-normal bg-primary">{{$category->productsInStock->count()}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="offcanvas offcanvas-end offcanvas-70" tabindex="-1" id="offcanvasMarca" aria-labelledby="offcanvasMarcaLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasMarcaLabel">Marcas</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            @foreach($brands as $key => $brand)
                            <div class="additional-product-item d-flex align-items-center justify-content-between py-2">
                                <div class="d-flex align-items-center flex-grow-1 me-2">
                                    <input type="radio" class="me-2" id="brandm-{{$key}}" name="brands[]" value="{{ $brand->id }}">
                                    <label for="brandm-{{$key}}" class="text-dark mb-0" style="font-size: 13px; word-break: break-word;">{{$brand->name}}</label>
                                </div>
                                <span class="badge border font-weight-normal bg-primary">{{$brand->productsInStock->count()}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-4 w-100">
                        <button type="button" id="resetFilters" class="btn btn-sm btn-danger">Limpiar filtros</button>
                    </div>
                    <h4 class="filtro-destock">Categorías</h4>
                    <div class="additional-product mb-4 overflow-auto filtro-destock" style="max-height: 400px;">
                        
                        @foreach($categories as $key => $category)                        
                        <div class="additional-product-item d-flex align-items-center justify-content-between py-2">
                            <div class="d-flex align-items-center flex-grow-1 me-2">
                                <input type="radio" class="me-2" id="category-{{$key}}" name="categories[]" value="{{ $category->id }}" {{ request('categories') == $category->id ? 'checked' : '' }}>
                                <label for="category-{{$key}}" class="text-dark mb-0" style="font-size: 14px; word-break: break-word;">{{$category->name}}</label>
                            </div>
                            <span class="badge border font-weight-normal bg-primary">{{$category->productsInStock->count()}}</span>
                        </div>
                        @endforeach
                    </div>
                    <hr class="filtro-destock">
                    <h4 class="filtro-destock">Marcas</h4>
                    <div class="additional-product mb-4 overflow-auto filtro-destock" style="max-height: 400px;">
                        
                        @foreach($brands as $key => $brand)
                        <div class="additional-product-item d-flex align-items-center justify-content-between py-2">
                            <div class="d-flex align-items-center flex-grow-1 me-2">
                                <input type="radio" class="me-2" id="brand-{{$key}}" name="brands[]" value="{{ $brand->id }}">
                                <label for="brand-{{$key}}" class="text-dark mb-0" style="font-size: 14px; word-break: break-word;">{{$brand->name}}</label>
                            </div>
                            <span class="badge border font-weight-normal bg-primary">{{$brand->productsInStock->count()}}</span>
                        </div>
                        @endforeach
                    </div>
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
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('filterForm');
    const productContainer = document.getElementById('productContainer');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const searchInput = document.getElementById('searchInput');
    const resetFilters = document.getElementById('resetFilters');

    let debounceTimeout;

    searchInput.addEventListener('input', function () {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            fetchProducts();
        }, 300);
    });

    // 🟥 Limpiar todos los filtros
    resetFilters.addEventListener('click', function () {
        form.reset(); // limpia todos los inputs del formulario
        searchInput.value = '';  
        $('#buscar').val('');
        form.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(el => el.checked = false);
        updateURLWithoutParams();
        fetchProducts(); // recarga todos los productos
    });

    form.addEventListener('change', function () {
        fetchProducts();
    });

    function fetchProducts(page = 1) {
        const formData = new FormData(form);
        const params = new URLSearchParams(formData);

        loadingSpinner.classList.remove('hidden'); // Mostrar spinner

        fetch(`{{ route('store') }}?${params.toString()}&page=${page}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            productContainer.innerHTML = html;
            updateURLParams(params);
        })
        .finally(() => {
            loadingSpinner.classList.add('hidden'); // Ocultar spinner
        });
    }

    // Paginación AJAX
    document.addEventListener('click', function(e) {
        if (e.target.closest('.pagination a')) {
            e.preventDefault();
            const url = new URL(e.target.href);
            const page = url.searchParams.get('page');
            fetchProducts(page);
        }
    });

    // 🧩 Actualiza la URL en tiempo real sin recargar la página
    function updateURLParams(params) {
        const newUrl = `${window.location.pathname}?${params.toString()}`;
        window.history.replaceState({}, '', newUrl);
    }

    // 🧼 Limpia la URL completamente (sin parámetros)
    function updateURLWithoutParams() {
        const cleanUrl = window.location.origin + window.location.pathname;
        window.history.replaceState({}, '', cleanUrl);
    }
});
</script>
@endpush

@endsection