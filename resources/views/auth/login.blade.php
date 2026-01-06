{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
@extends('backend.layouts.master-without-nav')
@section('title')
  Login Page
@endsection
@section('css')
@endsection

@section('content')
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex flex-column justify-content-between">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card card-default mb-0">
            <div class="card-header pb-0">
              <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                <a class="w-auto pl-0" href="{{ route('landingPage') }}">
                  <img src="{{ asset('backend/img/logo.png') }}" alt="Mono">
                  <span class="brand-name text-dark">MONO</span>
                </a>
              </div>
            </div>
            <div class="card-body px-5 pb-5 pt-0">
              <h4 class="text-dark mb-6 text-center">Authority Login</h4>

              <!-- Display Error Message -->
              @if (session('error'))
                <div class="alert alert-danger mb-4">
                  {{ session('error') }}
                </div>
              @endif

              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="row">
                  <!-- Email Input -->
                  <div class="form-group col-md-12 mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control input-lg @error('email') is-invalid @enderror" id="email" name="email"
                      value="{{ old('email') }}" placeholder="Enter your email" required>
                    @error('email')
                      <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Password Input -->
                  <div class="form-group col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" name="password"
                      placeholder="Enter your password" required autocomplete="off">
                    @error('password')
                      <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Submit Button -->
                  <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-primary btn-pill w-100">Sign In</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
@endsection
