@extends('layouts.app')
<link href="{{asset('css/login.css')}}" rel="stylesheet">
@section('content')

<div class="login-root">
  <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
    <div class="loginbackground box-background--white padding-top--64">
      <div class="loginbackground-gridContainer">
        <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
          <div class="box-root" style="flex-grow: 1;">
          </div>
        </div>
        <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
          <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
        </div>
        <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
          <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
        </div>
        <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
          <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
        </div>
        <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
          <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
        </div>
        <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
          <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
        </div>
        <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
          <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
        </div>
        <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
          <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
        </div>
        <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
          <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
        </div>
      </div>
    </div>
    <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
      <div class="box-root padding-top--48 flex-flex flex-justifyContent--center">
        <a href="/">
            <img src="img/logo-vesergen.png" width="300" alt="CompactSeguridad">
        </a>
        
      </div>
      <div class="formbg-outer">
        <div class="formbg_r">
          <div class="formbg-inner padding-horizontal--48">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="field padding-bottom--24">
                    <label for="name">Tipo documento</label>
                    <select class="form-control" name="tipo_doc" id="tipo_doc">
                      <option value="DNI">DNI</option>
                      <option value="PASAPORTE">PASAPORTE</option>
                      <option value="CARNET">CARNET EXTRANJERIA</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="field padding-bottom--24">
                    <label for="name">Número documento</label>
                    <input type="text" name="numero_doc" id="numero_doc">
                  </div>
                </div>
              </div>
                <div class="field padding-bottom--24">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="field padding-bottom--24">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="field padding-bottom--24">
                      <div class="form-floating">
                          
                          <select id="departamento" class="form-control departamento" name="mauticform[departamento]">    
                              <option data-id="" value="">-Seleccionar-</option>
                          </select>
                          <label for="name">Departamento</label>
                      </div>   
                    </div>                    
                  </div>
                  <div class="col-md-4">
                    <div class="field padding-bottom--24">
                      <div class="form-floating">
                          
                          <select id="provincia" class="form-control provincia" name="mauticform[provincia1]">
                              <option data-id="" value="Chachapoyas">-Seleccionar-</option>                
                          </select>
                          <label for="name">Provincia</label>
                      </div>    
                    </div>                       
                  </div>
                  <div class="col-md-4">
                    <div class="field padding-bottom--24">
                      <div class="form-floating">
                          
                          <select id="distrito" class="form-control distrito" name="mauticform[distrito1]">
                              <option data-id="" value="">-Seleccionar-</option>
                          </select>
                          <label for="name">Distrito</label>
                      </div>        
                    </div>                 
                  </div>

                  <div class="col-md-12">
                    <div class="field padding-bottom--24">
                        <label for="name">Dirección</label> 
                        <input maxlength="100" type="text" class="form-control" id="direccion">                        
                    </div>                     
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6">
                    <div class="field padding-bottom--24">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="field padding-bottom--24">
                        <label for="password-confirm">Confirmar Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                </div>        

              <input type="hidden" name="g-recaptcha-response" id="recaptcha">

              <div class="field">
                <input class="btn btn-primary" type="submit" name="submit" value="Registrar">
              </div>
            </form>

            <script src="https://www.google.com/recaptcha/api.js?render=6LdvDSksAAAAAC_j43AdGyeKsbngkBxjibcVyjkr"></script>

            <script>
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LdvDSksAAAAAC_j43AdGyeKsbngkBxjibcVyjkr', {action: 'register'}).then(function(token) {
                        document.getElementById('recaptcha').value = token;
                    });
                });
            </script>
          </div>
        </div>          
      </div>
    </div>
  </div>
</div>
@endsection
