@extends('layouts.app')

@section('content')
    <div>
        <!-- This is an HTML comment -->
        <h2>
            Contacts
        </h2>
        <h2>
            Name: {{ request()->name }}
        </h2>
        <h2>
            ID: {{ request()->id }}
        </h2>
        @include('subviews.input',[
                'myName' => request()->name
            ])
    </div>
@endsection
