@extends('layout.main')

@section('content')
    {{-- <h1>{{ $hal_judul }}</h1> --}}
    <h1>{{ $judul }}</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim eaque animi quos expedita cumque totam maxime
        quaerat, ipsum suscipit. Ullam, possimus eum repellendus tempora quibusdam ad minus eos dignissimos
        voluptates!</p>
    <p>
    <ul>
        <li>Email: {{ $kontak['email'] }}</li>
        <li>Youtube: {{ $kontak['youtube'] }}</li>
    </ul>
    </p>
@endsection
