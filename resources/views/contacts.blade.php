@extends('layouts.app')

@section('content')
    <div>
        <!-- This is an HTML comment -->
        <h3>
            Contacts
        </h3>
        <h3>
            Name: {{ request()->name }}
        </h3>
        <h3>
            ID: {{ request()->id }}
        </h3>
        @include('subviews.input',[
                'myName' => request()->name
            ])
    </div>
@endsection
