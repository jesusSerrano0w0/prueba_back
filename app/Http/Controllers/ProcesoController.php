<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProcesoController extends Controller
{
    public function index(){
        $proceso= Proceso::all();
        return response()->json($proceso);  
    }
}
