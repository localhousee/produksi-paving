@extends('layouts.auth')
@section('title', 'Register')
@section('body')
  <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
  <div class="col-lg-7">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Register</h1>
      </div>
      <form class="user" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group row">
          <div class="col">
            <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama">
            @error('name')
              <span class="text-sm text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
            placeholder="Email">
          @error('email')
            <span class="text-sm text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword"
              placeholder="Password">
          </div>
          <div class="col-sm-6">
            <input type="password" name="password_confirmation" class="form-control form-control-user"
              id="exampleRepeatPassword" placeholder="Konfirmasi Password">
          </div>
          @error('password')
            <span class="text-sm text-danger">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
          Register
        </button>
      </form>
      <div class="text-center mt-4">
        <a class="small" href="{{ route('login') }}">Login</a>
      </div>
    </div>
  </div>
@endsection
