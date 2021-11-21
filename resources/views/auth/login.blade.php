@extends('layouts.auth')
@section('title', 'Login')
@section('body')
  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
  <div class="col-lg-6">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
      </div>
      <form class="user" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
          <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address">
          @if($errors->any()) <span class="text-sm text-danger">Email / Password Salah</span> @endif
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
          Login
        </button>
      </form>
      <hr>
      <div class="text-center">
        <a class="small" href="{{ route('register') }}">Daftar Akun</a>
      </div>
    </div>
  </div>
@endsection