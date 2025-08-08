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
                                <a href="" class="dropdown-item">{{$service->title}}</a>
                                @endforeach
                                <a href="/services" class="dropdown-item">Todos los servicios</a>
                            </div>
                        </div>
                        <a href="/store" class="nav-item nav-link">Tienda</a>
                        <a href="/blog" class="nav-item nav-link">Blog</a>
                        <a href="/contact" class="nav-item nav-link active">Contáctanos</a>
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contáctanos</h4>

        </div>
    </div>
    <!-- Header End -->

     <!-- Contact Start -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Contáctanos</h4>
                <h1 class="display-4 mb-4">Si tienes algún comentario, envíalo ahora</h1>
            </div>
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="contact-img d-flex justify-content-center" >
                        <div class="contact-img-inner">
                            <img src="img/contact-img.png" class="img-fluid w-100"  alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <div>
                        <!-- <form> -->
                        <h4 class="text-primary">Envía tu mensaje</h4>
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 inputTexto" id="name" placeholder="Tu nombre">
                                        <label for="name">Tu nombre</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 inputTexto" id="email" placeholder="Tu Email">
                                        <label for="email">Tu Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control border-0" id="phone" placeholder="Teléfono" max="99999999999" oninput="this.value = this.value.slice(0, 11)">
                                        <label for="phone">Teléfono</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input maxlength="100" type="text" class="form-control border-0 inputTexto" id="project" placeholder="Proyecto">
                                        <label for="project">Proyecto</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input maxlength="100" type="text" class="form-control border-0 inputTexto" id="subject" placeholder="Asunto">
                                        <label for="subject">Asunto</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea maxlength="500" class="form-control border-0 inputTexto" placeholder="Leave a message here" id="message" style="height: 120px"></textarea>
                                        <label for="message">Mensaje</label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3 Enviarconsulta">Enviar mensaje</button>
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Dirección</h4>
                                        <p class="mb-0">{{$business->address}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Correo de contacto</h4>
                                        <p class="mb-0">{{$business->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fa fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Teléfono</h4>
                                        <p class="mb-0">{{$business->phone}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-globe fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>vesergenperu.com</h4>
                                        <p class="mb-0">{{$business->phone}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="rounded">
                        <iframe class="rounded w-100"
                        style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1981.0335958378207!2d-79.8404645!3d-6.7616618!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904cef1e2d024143%3A0xea6fe9b4ff3b26d4!2sGrupo%20VesergenPeru%20-%20Electronic%20invoice%20Peru!5e0!3m2!1ses-419!2spe!4v1754666327986!5m2!1ses-419!2spe"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

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
        $(".Enviarconsulta").on('click',function () {
            var nombre = $("#name").val();
            var email = $("#email").val();
            var telefono = $("#phone").val();
            var proyecto = $("#project").val();
            var asunto = $("#subject").val();
            var mensaje = $("#message").val();

            if(nombre == ''){
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
                title: "Tienes que ingresar tu nombre"
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
                title: "Tiene que ingresar un Teléfono para contacto"
                });
                return false;
            }
            if(proyecto == ''){
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
                title: "Tiene que ingresar el nombre de su proyecto"
                });
                return false;
            }
            if(asunto == ''){
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
                title: "Tiene que ingresar el asunto del mensaje"
                });
                return false;
            }
            if(mensaje == ''){
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
                title: "Tiene que ingresar el mensaje"
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
                url: "/correo",
                method: "post",
                dataType: 'json',
                data: {
                    _token: token,
                    nombre : nombre,
                    email : email,
                    telefono: telefono,
                    proyecto: proyecto,
                    asunto: asunto,
                    mensaje: mensaje,
                },
                success: function (response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: response.msg,
                        })
        // window.location.href = "https://elsvan.onfleekmedia.com/brochure.pdf";
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: response.msg,
                        })
                    }
                    $("#name").val('');
                    $("#email").val('');
                    $("#phone").val('');
                    $("#project").val('');
                    $("#subject").val('');
                    $("#message").val('');
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