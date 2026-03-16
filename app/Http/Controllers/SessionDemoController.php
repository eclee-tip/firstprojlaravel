<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionDemoController extends Controller
{
    public function index() {
        // session(['favorite_color' => 'blue']);

        $session = session('favorite_color');

        // session()->flash('Status','New Page');

        session()->forget('favorite_color');

        session()->flush();
        return session()->all();
    }
}
