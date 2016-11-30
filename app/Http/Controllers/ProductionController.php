<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('productionAdmin');
    }
   public function home(){

        return view('production.home');

   }


    public function recipe(){

        return redirect('/production/recipe/home');
    }

    public function batch(){

        return redirect('/production/batch/home');
    }

}


