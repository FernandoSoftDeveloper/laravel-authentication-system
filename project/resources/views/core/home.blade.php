@extends('base.base')

@section('title', 'Welcome | Home Page')
    
@section('content')

    @include('partials.navbar')

    <main>

        <div class="container py-5 text-center">
            <h1>Hello World</h1>
            <p>
                This is the home page.
            </p>
        </div>

    </main>

@endsection