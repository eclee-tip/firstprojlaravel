<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheDemoController extends Controller
{
    public function index() {
        // Cache::put('foo','hello',600);

        // $value = Cache::get('foo');

        //  Cache::put('abc', '123456');
        
        // Cache::forget('abc');

        // Cache::flush();
        
         $value = Cache::get('abc','not found here');

        return $value;
    }
}
