@extends('base.base')

@section('title', 'Forget Password')

@include('partials.navbar')

@section('content')
    
    <main>

        <div class="container py-5">

            <div class="row">
                <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-4">

                    <div class="container py-5 text-center">
                        <p>
                            We will send a link to your email, use that link to reset password.
                        </p>
                    </div>

                    <form action="{{ route('forget_password_post') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">        
                        </div>
                        
                        <button type="submit" class="btn btn-dark">send</button>

                    </form>
                </div>
                <div class="col-12 col-md-4"></div>
            </div>

        </div>

    </main>

@endsection
    