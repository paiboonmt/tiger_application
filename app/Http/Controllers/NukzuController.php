<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NukzuController extends Controller
{
    public function index()
    {
        return view('nukzu.index');
    }
}
