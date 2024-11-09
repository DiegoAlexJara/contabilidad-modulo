<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class ProvedoresController extends Controller
{
    function index()
    {
        $provedors = Supplier::all();
        return view('provedores.index', compact('provedors'));
    }
    function create()
    {
        return view('provedores.create');
    }
}
