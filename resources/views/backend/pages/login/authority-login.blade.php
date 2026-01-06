<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Authority Login</title>
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
        <link id="main-css-href" rel="stylesheet" href="{{ asset('backend/css/style.css') }}" />
        <link href="images/favicon.png" rel="shortcut icon" />
    </head>
</head>

<body class="bg-light-gray" id="body">
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
                        
                            <form action="{{ route('authorityLoginRequest') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Email Input -->
                                    <div class="form-group col-md-12 mb-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control input-lg @error('email') is-invalid @enderror" 
                                               id="email" name="email" value="{{ old('email') }}" 
                                               placeholder="Enter your email" required>
                                        @error('email')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                        
                                    <!-- Password Input -->
                                    <div class="form-group col-md-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" 
                                               id="password" name="password" placeholder="Enter your password" 
                                               required autocomplete="off">
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

</body>

</html>