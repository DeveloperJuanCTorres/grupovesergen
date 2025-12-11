@extends('layouts.app')

@section('content')

    @include('partials.topbar')

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light"> 
                <a href="/" class="navbar-brand p-0">
                    <!-- <h1 class="text-primary mb-0"><i class="fab fa-slack me-2"></i> LifeSure</h1> -->
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
                        <a href="/store" class="nav-item nav-link">Tienda</a>
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
    <div class="container-fluid bg-breadcrumb" style="background: url('{{ asset(str_replace('\\', '/', 'storage/' . $page->image)) }}');background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{$page->title}}</h4>
              
        </div>
    </div>
    <!-- Header End -->

<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content px-4">
                <div class="header-text">
                    <h3 class="pt-4">1. DATOS DE LA PERSONA QUE PRESENTA LA QUEJA O RECLAMO</h3>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input required type="date" class="form-control" id="fecha_nac" placeholder="Fecha Nacimiento">
                                <label for="name">Fecha Nacimiento</label>
                            </div>                      
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <select required class="form-control" name="tipo_doc" id="tipo_doc">
                                    <option value="0">-Seleccionar-</option>
                                    <option value="DNI">DNI</option>
                                    <option value="PASAPORTE">PASAPORTE</option>
                                </select>
                                <label for="name">Tipo documento</label>
                            </div>                       
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="number" class="form-control" id="numero_doc" placeholder="Número de documento" max="9999999999" oninput="this.value = this.value.slice(0, 10)">
                                <label for="name">Número de documento</label>
                            </div>                       
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="text" class="form-control inputTexto" id="nombres" placeholder="Nombre">
                                <label for="name">Nombre</label>
                            </div>                        
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="text" class="form-control inputTexto" id="apellido_pat" placeholder="Apellido paterno">
                                <label for="name">Apellido paterno</label>
                            </div>                        
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="text" class="form-control inputTexto" id="apellido_mat" placeholder="Apellido materno">
                                <label for="name">Apellido materno</label>
                            </div>                        
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="email" class="form-control inputTexto" id="email" placeholder="Email">
                                <label for="name">Email</label>
                            </div>                       
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                @include('partials.phone')
                            </div>                       
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <select id="departamento" class="form-control departamento" name="mauticform[departamento]">    
                                    <option data-id="" value="">-Seleccionar-</option>
                                </select>
                                <label for="name">Departamento</label>
                            </div>                       
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <select id="provincia" class="form-control provincia" name="mauticform[provincia1]">
                                    <option data-id="" value="Chachapoyas">-Seleccionar-</option>                
                                </select>
                                <label for="name">Provincia</label>
                            </div>                         
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <select id="distrito" class="form-control distrito" name="mauticform[distrito1]">
                                    <option data-id="" value="">-Seleccionar-</option>
                                </select>
                                <label for="name">Distrito</label>
                            </div>                        
                        </div>

                        <div class="col-lg-9 col-md-12 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input maxlength="100" type="text" class="form-control" id="direccion" placeholder="Direccion">
                                <label for="name">Dirección fiscal</label>
                            </div>                       
                        </div>
                    </div>
                    <h3 class="pt-4">2. INFORMACIÓN GENERAL</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="text" maxlength="10" class="form-control inputTexto" id="orden_compra" placeholder="Orden de compra">
                                <label for="name">Orden de compra</label>
                            </div>                      
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="number" class="form-control" id="monto" placeholder="Monto del producto/servicio" max="99999" oninput="this.value = this.value.slice(0, 5)">
                                <label for="name">Monto del producto/servicio</label>
                            </div>                       
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <textarea maxlength="500" class="form-control inputTexto" id="reclamo" style="height: 120px;" placeholder="Escribe"></textarea>
                                <label for="name">Detalla tu queja/reclamo</label>
                            </div>                        
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <textarea maxlength="500" class="form-control inputTexto" id="pedido" style="height: 120px;" placeholder="Escribe"></textarea>
                                <label for="name">Pedido</label>
                            </div>                         
                        </div>
                        <div class="col-lg-12 my-4 text-center">
                            <button class="btn btn-primary py-3 EnviarReclamo">Enviar reclamo</button>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>


@include('partials.footer')
@include('partials.whatsapp')

<script>
document.querySelectorAll('.inputTexto').forEach(function (input) {
    input.addEventListener('input', function (e) {
        const prohibido = /[<>{};*$%=()&]/g; // Caracteres que quieres bloquear
        if (prohibido.test(e.target.value)) {
            e.target.value = e.target.value.replace(prohibido, '');
        }
    });
});
</script>  

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let token = $('meta[name="csrf-token"]').attr('content');

    $(function() {
        $(".EnviarReclamo").on('click',function () {
            var fechanac = $("#fecha_nac").val();
            var tipodoc = $("#tipo_doc").val();
            var numerodoc = $("#numero_doc").val();
            var nombres = $("#nombres").val();
            var apellidopat = $("#apellido_pat").val();
            var apellidomat = $("#apellido_mat").val();
            var email = $("#email").val();
            var telefono = $("#telefono").val();
            var departamento = $("#departamento").val();
            var provincia = $("#provincia").val();
            var distrito = $("#distrito").val();
            var direccion = $("#direccion").val();
            var ordencompra = $("#orden_compra").val();
            var monto = $("#monto").val();
            var reclamo = $("#reclamo").val();
            var pedido = $("#pedido").val();

            if(fechanac == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu fecha de nacimiento"
                });
                return false;
            }            
            if(tipodoc == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar tu Tipo de Documento"
                });
                return false;
            }
            if(numerodoc == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar tu Numero de Documento"
                });
                return false;
            }
            if(nombres == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar tu nombre"
                });
                return false;
            }
            if(apellidopat == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar tu Apellido Paterno"
                });
                return false;
            }
            if(email == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar un correo electrónico"
                });
                return false;
            }
            else
            {
                const valido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                if (!valido) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "error",
                    title: "Correo no válido"
                    });
                    return false;
                }
            }
            if(apellidomat == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Apellido Materno"
                });
                return false;
            }
            if(telefono == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Teléfono de contacto"
                });
                return false;
            }
            if(departamento == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que seleccionar tu Departamento"
                });
                return false;
            }
            if(provincia == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que seleccionar tu Provincia"
                });
                return false;
            }
            if(distrito == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que seleccionar tu Distrito"
                });
                return false;
            }
            if(direccion == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Dirección"
                });
                return false;
            }
            if(ordencompra == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Orden de Compra"
                });
                return false;
            }
            if(monto == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar el Monto del producto/servicio"
                });
                return false;
            }
            if(reclamo == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Reclamo"
                });
                return false;
            }
            if(pedido == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Pedido"
                });
                return false;
            }

            Swal.fire({
                header: '...',
                title: 'loading...',
                allowOutsideClick:false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: "/reclamo",
                method: "post",
                dataType: 'json',
                data: {
                    _token: token,
                    fechanac : fechanac,
                    tipodoc : tipodoc,
                    numerodoc: numerodoc,
                    nombres: nombres,
                    apellidopat: apellidopat,
                    apellidomat: apellidomat,
                    email: email,
                    telefono: telefono,
                    departamento: departamento,
                    provincia: provincia,
                    distrito: distrito,
                    direccion: direccion,
                    ordencompra: ordencompra,
                    monto: monto,
                    reclamo: reclamo,
                    pedido: pedido,
                },
                success: function (response) {
                    if (response.status) {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                        });
                        Toast.fire({
                        icon: "success",
                        title: response.msg
                        });
                        $("#fecha_nac").val('');
                        $("#tipo_doc").val('');
                        $("#numero_doc").val('');
                        $("#nombres").val('');
                        $("#apellido_pat").val('');
                        $("#apellido_mat").val('');
                        $("#email").val('');
                        $("#telefono").val('');
                        $("#departamento").val('');
                        $("#provincia").val('');
                        $("#distrito").val('');
                        $("#direccion").val('');
                        $("#orden_compra").val('');
                        $("#monto").val('');
                        $("#reclamo").val('');
                        $("#pedido").val('');
                        return false;
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: response.msg,
                        })
                    }
                    $("#fecha_nac").val('');
                    $("#tipo_doc").val('');
                    $("#numero_doc").val('');
                    $("#nombres").val('');
                    $("#apellido_pat").val('');
                    $("#apellido_mat").val('');
                    $("#email").val('');
                    $("#telefono").val('');
                    $("#departamento").val('');
                    $("#provincia").val('');
                    $("#distrito").val('');
                    $("#direccion").val('');
                    $("#orden_compra").val('');
                    $("#monto").val('');
                    $("#reclamo").val('');
                    $("#pedido").val('');
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!!',
                        text: 'Algo salió mal, Inténtalo más tarde!',
                    })
                }
            });
        });
    })
</script>

@endsection