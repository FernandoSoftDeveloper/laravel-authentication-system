@extends('base.base')

@section('title', 'Reset Password')

@section('content')
    
    <main>

        <div class="container py-5 text-center">
            <h1>Reset Password</h1>
            <p>
                Enter the new password.
            </p>
        </div>

        <div class="container py-5">

            <div class="row">
                <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-4">

                    <form action="{{ route('reset_password_post') }}" method="POST">

                        @csrf

                        <input type="text" name="token" hidden value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">        
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Enter New Password</label>
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">        
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password" name="password_confirmation" aria-describedby="emailHelp">        
                        </div>

                        <button type="submit" class="btn btn-dark">send</button>

                    </form>

                </div>
                <div class="col-12 col-md-4"></div>
            </div>

        </div>

    </main>

@endsection
