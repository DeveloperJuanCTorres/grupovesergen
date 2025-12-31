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
    <div class="container-fluid bg-breadcrumb1" style="background: url('{{ asset(str_replace('\\', '/', 'storage/' . $page->image)) }}');background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Sorteos disponibles</h4>
              
        </div>
    </div>
    <!-- Header End -->


    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Sorteos disponibles</h4>
                <h1 class="display-4 mb-4">No pierdas la oportunidad de ser el ganador de estos increibles premios!</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($sorteos as $key => $sorteo)
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            @php
                                $imagenes = json_decode($sorteo->images);
                                $primeraImagen = $imagenes[0];
                            @endphp
                            <img src="{{ asset('storage/' . $primeraImagen) }}" class="img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="javascript:void(0)" class="d-inline-block h4 open-video" data-video="{{ $sorteo->video_url }}">{{$sorteo->name}}</a>
                                @if($sorteo->fecha_sorteo)
                                <p class="">Sorteo: {{$sorteo->fecha_sorteo}}</p>
                                @endif
                                <p class="">{!! Str::markdown($sorteo->description) !!}</p>
                                
                                <div class="text-center">
                                    <a class="btn btn-primary rounded-pill px-4 btn-participar" 
                                    href="javascript:void(0)" 
                                    data-id="{{ $sorteo->id }}"
                                    data-credito="{{ $sorteo->credito }}">
                                    Participar con {{ $sorteo->credito }} créditos
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    @include('partials.footer')
    @include('partials.whatsapp')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        document.querySelectorAll(".btn-participar").forEach(btn => {

            btn.addEventListener("click", function () {

                let costoPorParticipacion = parseInt(this.dataset.credito);
                let sorteoId = this.dataset.id;

                // === 1️⃣ Verificar login ===
                fetch("/user/credit-check")
                    .then(res => res.json())
                    .then(data => {

                        if (!data.logged) {

                            Swal.fire({
                                icon: "warning",
                                title: "Debe iniciar sesión",
                                text: "Para participar debe iniciar sesión.",
                                showCancelButton: true,
                                confirmButtonText: "Ir al login",
                                cancelButtonText: "Cancelar",
                            }).then(result => {
                                if (result.isConfirmed) {
                                    window.location.href = "/login";
                                }
                            });

                            return;
                        }

                        // === 2️⃣ Usuario logueado ===
                        let creditosDisponibles = parseInt(data.creditos);

                        if (creditosDisponibles < costoPorParticipacion) {
                            Swal.fire({
                                icon: "error",
                                title: "Créditos insuficientes",
                                html: `
                                    <p>Tienes <b>${creditosDisponibles}</b> créditos.</p>
                                    <p>Una participación requiere <b>${costoPorParticipacion}</b> créditos.</p>
                                `
                            });
                            return;
                        }

                        // === 3️⃣ Calcular cantidad máxima de participaciones ===
                        let maxParticipaciones = Math.floor(creditosDisponibles / costoPorParticipacion);

                        // === 4️⃣ SweetAlert2 con selector ===
                        Swal.fire({
                            title: "Participar en el sorteo",
                            html: `
                                <p>Tienes <b>${creditosDisponibles}</b> créditos disponibles.</p>
                                <p>Cada participación cuesta <b>${costoPorParticipacion}</b> créditos.</p>
                                <hr>
                                <label>Cantidad de participaciones:</label>
                                <br>
                                <br>
                                <select class="form-control" id="cantidadParticipaciones" class="swal2-input">
                                    ${Array.from({ length: maxParticipaciones }, (_, i) => 
                                        `<option value="${i+1}">${i+1} Participación</option>`
                                    ).join('')}
                                </select>
                            `,
                            showCancelButton: true,
                            confirmButtonText: "Confirmar participación",
                            cancelButtonText: "Cancelar",
                            preConfirm: () => {
                                return document.getElementById("cantidadParticipaciones").value;
                            }
                        }).then(result => {
                            if (!result.isConfirmed) return;

                            let cantidad = parseInt(result.value);

                            // Redirigir al controlador con la cantidad seleccionada
                            window.location.href = `/sorteo/participar/${sorteoId}/${cantidad}`;
                        });

                    });

            });

        });

    });
</script>

<script>
    // Mostrar mensajes del backend con Toast
    @if (session('success'))
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        })
    @endif

    @if (session('error'))
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "error",
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 3000
        })
    @endif
</script>

<script>
    document.querySelectorAll(".open-video").forEach(btn => {
        btn.addEventListener("click", function () {

            let video = this.dataset.video;

            if (!video) {
                Swal.fire({
                    icon: "error",
                    text: "Este sorteo no tiene video disponible."
                });
                return;
            }

            Swal.fire({
                title: "Vista previa del premio",
                html: `
                    <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                        <iframe src="${video}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen
                            style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        </iframe>
                    </div>
                `,
                width: "800px",
                showCloseButton: true,
                showConfirmButton: false
            });
        });
    });
</script>
    
@endsection