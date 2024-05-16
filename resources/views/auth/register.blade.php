@extends('layouts.applogin')

@section('content')

<div class="register-box bg-dark.bg-gradient text-center" >
  <div class="card card-outline card-warning">
    <div class="card-header text-center" style="background-color: #FFFFFF;">
      <a href="#">
      <img src="{{asset('backend/dist/img/optica1.png')}}" style="width: 100%; height: auto;">
      </a>
    </div>
    <div class="card-body" style="background-color: #F5F7F8;">
      <p class="login-box-msg" style="font-weight: bold;">Registrar una nueva membresía</p>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3 ">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correro">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- /.col -->
          <div class="col-4 text-center">
            <button type="submit" class="btn btn-outline-secondary btn-block" style="background-color: #495E57; color:white">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">

      </div>

      <a href="login" class="text-center" style="color: black;">Ya tengo una cuenta</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection