    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
        <div class="container">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <div class="border-end border-primary pe-3">
                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($business->address) }}"
                            target="_blank"
                            class="text-muted small">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                {{ $business->address }}
                            </a>
                        </div>
                        <div class="border-end border-primary px-3">
                            <a href="mailto:{{ trim($business->email) }}"
                            class="text-muted small"
                            title="Enviar correo">
                                <i class="fas fa-envelope text-primary me-2"></i>
                                {{ $business->email }}
                            </a>
                        </div>
                        <div class="ps-3 d-flex" style="right: 0;">
                            @auth
                            <span class="text-primary"> Tienes {{auth::user()->creditos}} créditos disponibles</span>
                            @endauth
                        </div>
                        
                    </div>
                </div>
                    
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex border-end border-primary pe-3">
                            @if($business->link_facebook)
                            <a class="btn p-0 text-primary me-3" target="_blank" href="{{$business->link_facebook}}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($business->link_youtube)
                            <a class="btn p-0 text-primary me-3" target="_blank" href="{{$business->link_youtube}}"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if($business->link_instagram)
                            <a class="btn p-0 text-primary me-3" target="_blank" href="{{$business->link_instagram}}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($business->link_linkedin)
                            <a class="btn p-0 text-primary me-0" target="_blank" href="{{$business->link_linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                        </div>
                        @auth
                        <div class="dropdown ms-3">
                            <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown">
                                <small>
                                    <i class="fas fa-user text-primary me-2"></i> {{auth::user()->name}}
                                </small>
                            </a>
                            <div class="dropdown-menu rounded">      
                                {{-- BOTÓN SOLO PARA ADMIN --}}
                                @if(auth()->user()->email === 'admin@admin.com')
                                    <button type="button"
                                            class="dropdown-item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#importModal">
                                        Importar Productos
                                    </button>
                                    <div class="dropdown-divider"></div>
                                @endif                          
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </div>
                        </div>
                        @else
                        <a class="ms-3 text-dark" href="{{ route('login') }}">
                            <i class="fas fa-user text-primary me-2"></i>Iniciar sesión
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">
                        Importar Productos desde Excel
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('products.import') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="form-label">Seleccionar archivo Excel</label>
                            <input type="file"
                                name="file"
                                class="form-control"
                                accept=".xlsx,.xls,.csv"
                                required>
                        </div>

                        <div class="text-end">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                Cancelar
                            </button>

                            <button type="submit"
                                    class="btn btn-primary">
                                Importar
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>