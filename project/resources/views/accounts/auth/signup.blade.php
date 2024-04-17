@extends('base.base')

@section('title', 'Create an account')

@include('partials.navbar')

@section('content')

    <main>

        <div class="container py-5 text-center">
            <h1>Create Account</h1>
            <p>Enter information for creating an account</p>
        </div>

        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img class="img-fluid h-2" src="{{ asset('images/form_bg.jpg') }}" alt="Form Background Image">
                </div>
                <div class="col-12 col-md-6">

                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="{{ old('username') }}" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                            
                            @error('username')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            @error('email')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            
                            @error('password')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            <a href="{{ route('login') }}">Have an account?</a>
                        </div>

                        <button type="submit" class="btn btn-dark">sign in</button>
                    
                    </form>

                </div>
            </div>
        </div>

    </main>
    
@endsection