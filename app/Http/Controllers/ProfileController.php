<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function index(Request $request)
    // {
    //     echo "Nama saya " . $request->nama;
    //     echo "<br>";
    //     echo "Umur " . request('Umur');
    //     //return "Halo saya adalah fungsi index dalam ProfileController";
    // }
    // public function create()
    // {
    //     return "Halo saya adalah fungsi create dalam ProfileController";
    // }
    // public function edit($nama, $id)
    // {
    //     return "Halo nama saya $nama $id";
    // }

    public function dokterr()
    {
        return "Halo, saya berada dihalaman dokter index";
    }
    public function dokter($id)
    {
        return "Halo, saya berada dihalaman show dokter $id";
    }
    public function create()
    {
        return "Halo, saya berada dihalaman dokter tambah data dokter";
    }
    public function edit($id)
    {
        return "Halo, saya berada dihalaman edit dengan nilai $id";
    }

}
