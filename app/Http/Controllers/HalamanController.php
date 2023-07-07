<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        return view("halaman.index");
    }

    function tentang()
    {
        return view("halaman.tentang");
    }

    function kontak()
    {
        // $judul = 'Ini Adalah Halaman Kontak';
        // return view("halaman.kontak")->with('hal_judul', $judul);

        $data = [
            'judul' => 'Ini Adalah Halaman Kontak',
            'kontak' => [
                'email' => 'labsi01pnc@gmail.com',
                'youtube' => 'LabSI Project'
            ]
        ];
        return view("halaman.kontak")->with($data);
    }
}
