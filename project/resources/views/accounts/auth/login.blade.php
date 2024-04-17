@extends('base.base')

@section('title', 'Login into account')

@include('partials.navbar')

@section('content')

    <main>

        <div class="container py-5 text-center">
            <h1>Login Account</h1>
            <p>Enter information for loging into account</p>
        </div>

        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img class="img-fluid h-2" src="{{ asset('images/form_bg.jpg') }}" alt="Form Background Image">
                </div>
                <div class="col-12 col-md-6">

                    <form method="POST" action="{{ route('authenticate') }}">
                        
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" value="{{ old('username') }}" name="username" aria-describedby="emailHelp">
                            
                            @error('username')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>                                
                            @enderror
                        
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('forget_password') }}">Forget Password?</a>
                        </div>

                        <button type="submit" class="btn btn-dark">login</button>
                    
                    </form>

                </div>
            </div>
        </div>

    </main>
    
@endsection