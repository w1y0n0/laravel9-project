@extends('layout.app')

@section('isi')
    {{-- {{ json_encode($data) }} --}}
    <a href="/siswa/create" class="btn btn-primary">+Tambah Data Siswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ url('/siswa/' . $item->npm) }}">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('/siswa/' . $item->npm . '/edit') }}">Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data ?')" class="d-inline"
                            action="{{ '/siswa/' . $item->npm }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
