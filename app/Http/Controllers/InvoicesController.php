<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    function create()
    {
        return view('invoices.create');
    }

    function index() {
        return view('invoices.index');
    }
}
