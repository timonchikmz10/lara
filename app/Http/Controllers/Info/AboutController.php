<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $info = Info::first();
        return view('info.about', compact('info'));
    }
}
