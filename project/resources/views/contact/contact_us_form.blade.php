@extends('base.base')

@section('title', 'Contact Us | Project')

@include('partials.navbar')

@section('content')
    
    <main>

        <div class="container py-5 text-center">

            <h1 class="pt-4">Contact Us</h1>
            <p>
                If you have any project in mind, give us below your personal information.
            </p>
        
        </div>

        <div class="container py-5">

            <div class="row">
                <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-4">

                    <form action="">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">        
                        </div>
        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <input type="text" class="form-control" id="message" name="message" aria-describedby="emailHelp">        
                        </div>
        
                        <button type="submit" class="btn btn-dark">send</button>
        
                    </form>

                </div>
                <div class="col-12 col-md-4"></div>
            </div>
            

        </div>

    </main>

@endsection