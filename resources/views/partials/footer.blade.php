    <!-- Footer Start -->
    <div class="container-fluid footer wow fadeIn" data-wow-delay="0.2s">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-9">
                    <div class="mb-5">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-5">
                                <div class="footer-item">
                                    <a href="index.html" class="p-0">
                                        <!-- <h3 class="text-white"><i class="fab fa-slack me-3"></i> LifeSure</h3> -->
                                        <img src="{{asset('storage/' . $business->image)}}" width="250" alt="Logo">
                                    </a>
                                    <p class="text-white mb-4">{{$business->description}}</p>
                                    <div class="footer-btn d-flex">
                                        @if($business->link_facebook)
                                        <a class="btn btn-md-square rounded-circle me-3" target="_blank" href="{{$business->link_facebook}}"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if($business->link_youtube)
                                        <a class="btn btn-md-square rounded-circle me-3" target="_blank" href="{{$business->link_youtube}}"><i class="fab fa-youtube"></i></a>
                                        @endif
                                        @if($business->link_instagram)
                                        <a class="btn btn-md-square rounded-circle me-3" target="_blank" href="{{$business->link_instagram}}"><i class="fab fa-instagram"></i></a>
                                        @endif
                                        @if($business->link_linkedin)
                                        <a class="btn btn-md-square rounded-circle me-0" target="_blank" href="{{$business->link_linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="footer-item">
                                    <h4 class="text-white mb-4">Enlaces Útiles</h4>
                                    <a href="/"><i class="fas fa-angle-right me-2"></i> Inicio</a>
                                    <a href="/about"><i class="fas fa-angle-right me-2"></i> Nosotros</a>
                                    <a href="/services"><i class="fas fa-angle-right me-2"></i> Servicios</a>
                                    <a href="/store"><i class="fas fa-angle-right me-2"></i> Tienda</a>
                                    <a href="/blog"><i class="fas fa-angle-right me-2"></i> Blog</a>
                                    <a href="/contact"><i class="fas fa-angle-right me-2"></i> Contáctanos</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="footer-item">
                                    <h4 class="mb-4 text-white">Instagram</h4>
                                    <div class="row g-3">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="d-flex">
                                                <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h4 class="text-white" style="height: 15px;">Dirección</h4>
                                                    <p class="mb-0">{{$business->address}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="d-flex">
                                                <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                    <i class="fas fa-envelope fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h4 class="text-white" style="height: 15px;">Correo</h4>
                                                    <p class="mb-0">{{$business->email}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="d-flex">
                                                <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                    <i class="fa fa-phone-alt fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h4 class="text-white" style="height: 15px;">Teléfono</h4>
                                                    <p class="mb-0">{{$business->phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="row g-4">
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Dirección</h4>
                                                <p class="mb-0">{{$business->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-envelope fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Correo</h4>
                                                <p class="mb-0">{{$business->email}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fa fa-phone-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Teléfono</h4>
                                                <p class="mb-0">{{$business->phone}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                
                <div class="col-xl-3">
                    <div class="footer-item">
                        <h4 class="text-white mb-4 text-center">Libro Reclamaciones</h4>
                        <a class="m-auto" href="/libro-reclamaciones">
                            <img src="{{asset('img/libro.png')}}" width="100" alt="">
                        </a>
                        <h6 class="text-white text-center">RUC: {{$business->ruc}}</h6>
                        <h6 class="text-white text-center">{{$business->name}}</h6>
                        <!-- <div class="d-flex flex-shrink-0 pt-4">
                            <div class="footer-btn">
                                <a href="#" class="btn btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                    <div class="position-absolute" style="top: 2px; right: 12px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column ms-3 flex-shrink-0">
                                <span>¿Alguna sugerencia?</span>
                                <a href="tel:+ 0123 456 7890"><span class="text-white">Llámanos: {{$business->phone}}</span></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    
    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="g-4 align-items-center text-center">
                <div class="mb-md-0">
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Grupo VesergenPerú</a>, Todos los derechos reservados.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>  