@extends('layouts.app')

@section('scripts')
    <script>alert('hi')</script>
@endsection


@section('content')
    <section>
        <h3>About Us</h3>
        <p>This is a simple HTML and CSS template to start your project.</p>

        <p>Name : {{ $name }}</p>
        <p>ID: {{ $id }}</p>
        
    </section>
@endsection