@extends('layouts.app')

@section('content')

@include('partials.topbar')

<style>
    .participantes-scroll::-webkit-scrollbar {
        width: 6px;
    }

    .participantes-scroll::-webkit-scrollbar-thumb {
        background: #0d6efd;
        border-radius: 10px;
    }

    .participantes-scroll::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
</style>

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
                    <a href="/services" class="nav-item nav-link">Servicios</a>
                    <a href="/store" class="nav-item nav-link">Tienda</a>
                    
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

<!-- Header igual que la vista anterior -->
<div class="container-fluid bg-breadcrumb1" 
    style="background: url('{{ asset(str_replace('\\', '/', 'storage/' . $page->image)) }}');
    background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4">{{ $sorteo->name }}</h4>
    </div>
</div>

<!-- CONTENIDO -->
<div class="container py-5">
    <div class="row py-5">

        <!-- IZQUIERDA -->
        <div class="col-lg-8">

            <h3 class="mb-4">Descripción del sorteo</h3>

            <div class="mb-4">
                {!! Str::markdown($sorteo->description) !!}
            </div>

            @if($sorteo->video_url)
                <h4 class="mt-5 mb-3">Video Unboxing</h4>

                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                    <iframe src="{{ $sorteo->video_url }}" 
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    </iframe>
                </div>
            @endif

        </div>

        <!-- DERECHA -->
        <div class="col-lg-4">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Participantes ({{ $participantes->count() }})
                </div>

                <div class="card-body participantes-scroll">

                    @forelse($participantes as $p)

                        @php
                            $nombreCompleto = $p->user->name ?? 'Usuario';
                            $primerNombre = explode(' ', trim($nombreCompleto))[0];
                        @endphp

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <span>{{ $primerNombre }}</span>
                            <span class="text-muted">Código: {{ $p->user->id ?? '-' }}</span>
                        </div>

                    @empty
                        <p class="text-muted">Aún no hay participantes.</p>
                    @endforelse

                </div>
            </div>

        </div>

    </div>
</div>

@include('partials.footer')
@include('partials.whatsapp')

@endsection
