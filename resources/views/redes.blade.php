@extends('layouts.app')

@section('content')
<style>
    body, .full-bg {
        min-height: 100vh;
        background: linear-gradient(135deg, #044969 0%, #044969 100%);
        color: #fff;
        padding: 20px;
    }

    .social-card {
        width: 100%;
        max-width: 520px;
        background: color-mix(in srgb, #041928 88%, white 12%);
        color: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(2,6,23,0.6);
        overflow: hidden;
    }

    .social-card .card-header {
        padding: 20px;
        color: #fff;
        text-align: center;
        border-bottom: 1px solid rgba(30,35,48,0.2);
        background: color-mix(in srgb, #041928 88%, white 12%);
    }

    .company-logo {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        object-fit: cover;
        margin: 0 auto 12px auto;
    }

    .company-name {
        font-weight: 700;
        font-size: 1.3rem;
        line-height: 1;
        color: #fff;
    }
    .company-tagline {
        font-size: 0.90rem;
        color: #fff;
    }

    .social-body {
        padding: 18px;
    }

    .social-btn {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 10px 12px;
        border-radius: 15px;
        background: #044969;
        box-shadow: 0 2px 8px 0
                    color-mix(in srgb, var(--button-style-shadow-color) 8%, transparent);
        color: #fff;
        text-decoration: none;
        margin-bottom: 10px;
        transition: transform .08s ease, box-shadow .08s ease, background .2s ease;
    }
    .social-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(2,6,23,0.12);
        color: #fff;
        background: #044975;
    }

    .social-icon {
        width: 34px;
        height: 34px;
        object-fit: cover;
        border-radius: 6px;
        flex: 0 0 34px;
        margin-right: 12px;
    }

    .social-label {
        flex: 1 1 auto;
        text-align: center;
        font-weight: 600;
        font-size: 0.98rem;
    }

    .spacer {
        width: 34px;
        flex: 0 0 34px;
        visibility: hidden;
    }

     @media (max-width: 480px) {
        body, .full-bg {
        padding: 0;
    }
    }
   
</style>

<div class="full-bg d-flex align-items-center justify-content-center">
    <div class="social-card">
        {{-- Cabecera con logo de empresa + nombre --}}
        <div class="card-header text-center d-flex flex-column align-items-center justify-content-center">
            {{-- Cambia la ruta de la imagen por la de tu empresa --}}
            <img src="{{ asset('img/logo-vesergen.png') }}" alt="vesergenperu" class="company-logo mb-2">
            <div>
                <div class="company-name">{{$business->name}}</div>
                <div style="font-size:0.82rem; color: #fff;">
                    {{$business->description}}
                </div>
            </div>
        </div>

        {{-- Cuerpo con botones de redes sociales --}}
        <div class="social-body">

            @foreach($redes as $red)
                <a href="{{ $red->link }}" target="_blank" rel="noopener" class="social-btn" aria-label="Ir a {{ $red->name }}">
                    <img src="storage/{{ $red->image }}" alt="{{ $red->name }} icon" class="social-icon">
                    <div class="social-label">{{ $red->name }}</div>
                    <div class="spacer">&nbsp;</div>
                </a>
            @endforeach

            <div class="card">
                <iframe class="rounded w-100"
                    style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1981.0335958378207!2d-79.8404645!3d-6.7616618!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904cef1e2d024143%3A0xea6fe9b4ff3b26d4!2sGrupo%20VesergenPeru%20-%20Electronic%20invoice%20Peru!5e0!3m2!1ses-419!2spe!4v1754666327986!5m2!1ses-419!2spe"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
                    
            </div>
            <a href="https://google.com/maps?ll=-6.761866,-79.839262&z=22&t=m&hl=es-419&gl=PE&mapclient=embed&cid=16892977690875471572" target="_blank" rel="noopener" class="social-btn mt-4" aria-label="Ir a Google Maps">
                <div class="social-label">Ir a Google Maps</div>
                <div class="spacer">&nbsp;</div>
            </a>

            <!-- Copyright Start -->
            <div class="container-fluid py-4">
                <div class="container">
                    <div class="g-4 align-items-center text-center">
                        <div class="mb-md-0">
                            <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Grupo VesergenPerú</a>, Todos los derechos reservados.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright End -->
        </div>
    </div>
</div>
@endsection