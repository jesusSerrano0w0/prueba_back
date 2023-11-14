<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TipoDocumentoController extends Controller
{
    public function index(){
        $tipoDocumento = TipoDocumento::all();
        return response()->json($tipoDocumento);
    }
    
        
}
