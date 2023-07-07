<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index()
    {
        // $data = Siswa::all();
        // return $data;
        // $data = Siswa::orderBy('npm', 'desc')->get();
        $data = Siswa::orderBy('npm', 'desc')->paginate(1);
        return view('siswa.index')->with('data', $data);
        // return '<h1>Saya Siswa dari SiswaController</h1>';
    }

    function detail($id)
    {
        // return "<h1>Saya Siswa dari SiswaController dengan ID $id</h1>";
        $data = Siswa::where('npm', $id)->first();
        return view('siswa.show')->with('data', $data);
    }

    function create()
    {
    }

    function delete()
    {
    }
}
