<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        // Sementara, data dosen kosong. Nanti bisa diisi dari database.
        $dosens = [];
        return view('dosen.index', compact('dosens'));
    }
} 