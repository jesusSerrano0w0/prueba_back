<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DocumentoController extends Controller
{
    public function index(){
        $documento= Documento::all();
        return response()->json($documento);

    }
    public function store(Request $request){
        $documento=new Documento();
        $documento->doc_nombre= $request->doc_nombre;
        $documento->doc_codigo= $request->doc_codigo;
        $documento->doc_contenido= $request->doc_contenido;
        $documento->doc_id_tipo= $request->doc_id_tipo;
        $documento->doc_id_proceso= $request->doc_id_proceso;
        if(  $documento->save()){
            $data=[
                'mensaje'=>'!documento creado exitosamente!!',
                'client'=> $documento
            ];
            return response()->json($data);
        }else{
            return response()->json(['error'=> ''],500);
        }

    }
    public function show($id){
      
        $documento= Documento::find($id);
    
        return response()->json($documento);
    }
    public function edit(Request $request,$id){
   
    }
    public function update(Request $request, $id){
        $documento=Documento::find($id);
        
        $documento->doc_nombre= $request->doc_nombre;
        $documento->doc_codigo= $request->doc_codigo;
        $documento->doc_contenido= $request->doc_contenido;
        $documento->doc_id_tipo= $request->doc_id_tipo;
        $documento->doc_id_proceso= $request->doc_id_proceso;
        $documento->save();
        $data=[
            'mensaje'=>'!documento actualizado exitosamente!!',
            'client'=> $documento
        ];
        return response()->json($data);

    }
    public function destroy($id){
        $documento=Documento::find($id);
        $documento->delete();
        $data=[
            'mensaje'=>'!documento eliminado exitosamente!!',
            'client'=> $documento
        ];
        return response()->json($data);
    }
}
