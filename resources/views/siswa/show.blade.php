@extends('layout.app')

@section('isi')
    <div>
        <a href="/siswa" class="btn btn-danger btn-sm">
            << Kembali</a>
                <h1>{{ $data->nama }}</h1>
                <p>
                    <b>NPM</b> {{ $data->npm }}
                </p>
                <p>
                    <b>Alamat</b> {{ $data->alamat }}
                </p>
    </div>
@endsection
