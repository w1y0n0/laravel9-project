@extends('layout.app')

@section('isi')
    <a href="/siswa" class="btn btn-danger">
        << Kembali</a>
            <form method="POST" action="{{ '/siswa/' . $data->npm }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM: {{ $data->npm }}</label>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat">
                {{ $data->alamat }}
            </textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        @endsection
