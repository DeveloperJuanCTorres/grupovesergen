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
    <div class="container-fluid bg-breadcrumb1" style="background: linear-gradient(rgba(1, 95, 201, 0.9), rgba(0, 0, 0, 0.2)), url('{{ asset(str_replace('\\', '/', 'storage/' . $page->image)) }}');background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Checkout</h4>
              
        </div>
    </div>
    <!-- Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5 p-4">
                    <div class="row">
                        <div class="custom-control custom-checkbox d-flex align-items-center mb-3">
                            <input type="radio" id="tipo_cliente" name="tipo_cliente" value="natural" checked onclick="mostrarCampos()">Natural
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center mb-3">
                            <input type="radio" id="tipo_cliente" name="tipo_cliente" value="empresa" onclick="mostrarCampos()">Empresa
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="campo_cliente">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="John">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Apellidos</label>
                                    <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Doe">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display: none;" id="campo_empresa">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>RUC</label>
                                    <input class="form-control" type="text" id="ruc" name="ruc">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Razon social</label>
                                    <input class="form-control" type="text" id="company" name="company">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" id="email" name="email" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            @include('partials.phone')
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Dirección</label>
                            <input class="form-control" type="text" id="direccion" name="direccion" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Departamento</label>
                            <select id="departamento" class="form-control departamento" name="mauticform[departamento]">    
                                <option data-id="" value="">-Seleccionar-</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Provincia</label>
                            <select id="provincia" class="form-control provincia" name="mauticform[provincia1]">
                                <option data-id="" value="Chachapoyas">-Seleccionar-</option>                
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Distrito</label>
                            <select id="distrito" class="form-control distrito" name="mauticform[distrito1]">
                                <option data-id="" value="">-Seleccionar-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-5 p-4" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected>United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">Total del pedido</span></h5>
                <div class="bg-light p-30 mb-5 p-4">
                    <div class="border-bottom">
                        <h6 class="mb-3">Productos</h6>
                        @foreach(Cart::content() as $item)
                        <div class="d-flex justify-content-between">
                            <p>[ x{{$item->qty}} ] - {{$item->name}}</p>
                            <p style="width: 220px;text-align: end;">S/. {{number_format($item->price * $item->qty, 2)}}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>S/. {{number_format(Cart::subtotal() - Cart::subtotal()*0.18,2)}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">IGV</h6>
                            <h6 class="font-weight-medium">S/. {{number_format(Cart::subtotal()*0.18,2)}}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>S/. {{number_format(Cart::subtotal(),2)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">Pago</span></h5>
                    <div class="bg-light p-4">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3 pedido">Realizar pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

    @include('partials.footer')
    @include('partials.whatsapp')

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function mostrarCampos() {
        const tipo = document.querySelector('input[name="tipo_cliente"]:checked').value;
        document.getElementById('campo_cliente').style.display = tipo === 'natural' ? 'block' : 'none';
        document.getElementById('campo_empresa').style.display = tipo === 'empresa' ? 'block' : 'none';
    }

    // Por si acaso se recarga la página con un valor diferente ya seleccionado
    document.addEventListener('DOMContentLoaded', mostrarCampos);
</script>
<script>
    let token = $('meta[name="csrf-token"]').attr('content');

    $(function() {
        $(".pedido").on('click',function () {
            var nombre = $("#nombre").val();
            var apellidos = $("#apellidos").val();
            var ruc = $("#ruc").val();
            var empresa = $("#company").val();
            var codigo = $("#codigo").val();
            var telefono = $("#telefono").val();
            var email = $("#email").val();
            var direccion = $("#direccion").val();
            var hoy = new Date();   
                                
            if (document.querySelector('input[name="tipo_cliente"]:checked').value == 'natural') {
                if (nombre == '') {
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
                    title: "El nombre es requerido"
                    });
                    $('#nombre').focus();
                    return false;
                }
                if (apellidos == '') {
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
                    title: "El apellido es requerido"
                    });
                    $('#apellidos').focus();
                    return false;
                }
            }

            if (document.querySelector('input[name="tipo_cliente"]:checked').value == 'empresa') {
                if (ruc == '') {
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
                    title: "El RUC es requerido"
                    });
                    $('#ruc').focus();
                    return false;
                }
                if (empresa == '') {
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
                    title: "La razon Social es requerido"
                    });
                    $('#company').focus();
                    return false;
                }
            }
            
            if (telefono == '') {
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
                title: "El teléfono es requerido"
                });
                $('#telefono').focus();
                return false;
            }
            if (direccion == '') {
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
                title: "La dirección es requerido"
                });
                $('#direccion').focus();
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
                url: "/enviar_pedido",
                method: "post",
                dataType: 'json',
                data: {
                    _token: token,
                    nombre: nombre,
                    apellidos : apellidos,
                    empresa : empresa,
                    codigo : codigo,
                    telefono: telefono,
                    email: email,
                    direccion: direccion
                },
                success: function (response) {   
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pedido',
                            text: response.msg,   
                            confirmButtonColor: "#e75e8d",                           
                        })
                        .then(resultado => {
                            window.location.href = "/";
                        })                 
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ups, algo salio mal',
                            text: response.msg,
                            confirmButtonColor: "#e75e8d",
                        })
                    }
                },
                error: function (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!!',
                        text: response.msg,
                    })
                }
            });
        });
    })
</script>
@endpush

@endsection