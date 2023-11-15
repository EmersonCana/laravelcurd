<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function showAbout () {
        $n1 = 1;
        $n2 = 2;
        $total = $n1 + $n2;
        $result = $total > 2 ? "Greater than 2" : "Less than 2";
        return view('pages.about', compact(['total', 'result']));
    }
}
