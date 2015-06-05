<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Return home page
     *
     * @return Response
     */
    public function home()
    {
         return view('home');
    }

}
