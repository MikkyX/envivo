<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function showPage($page)
    {
        return view('content.'.$page);
    }
}
