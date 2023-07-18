<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::orderBy('npm', 'desc')->paginate(5);
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('npm', $request->npm);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'npm' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png,gif',
        ], [
            'npm.required' => 'NPM wajib diisi',
            'npm.numeric' => 'NPM wajib angka',
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'foto.required' => 'Foto wajib diisi',
            'foto.mimes' => 'Foto wajib JPEG/JPG/PNG/GIF',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdHis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'npm' => $request->input('npm'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama
        ];

        Siswa::create($data);
        return redirect('siswa')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::where('npm', $id)->first();
        return view('siswa.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Siswa::where('npm', $id)->first();
        return view('siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ], [
            'npm.numeric' => 'NPM wajib angka',
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif',
            ], [
                'foto.mimes' => 'Foto wajib JPEG/JPG/PNG/GIF',
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdHis') . "." . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama); //upload ke direktori

            $data_foto = Siswa::where('npm', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);

            // $data = [
            //     'foto' => $foto_nama
            // ];
            $data['foto'] = $foto_nama;
        }

        Siswa::where('npm', $id)->update($data);
        return redirect('/siswa')->with('success', 'Berhasil update data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::where('npm', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);

        Siswa::where('npm', $id)->delete();
        return redirect('/siswa')->with('success', 'Berhasil hapus data.');
    }
}