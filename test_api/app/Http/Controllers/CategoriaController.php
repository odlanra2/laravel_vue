<?php

namespace App\Http\Controllers;
use App\categoria;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoriaController extends Controller
{
    //
    protected function get_all(){
        $categoria = categoria::all();
        

        return new JsonResponse(['res'=>1, 'data'=>$categoria]);
   }


   protected function get_id($catgoria_id){
        $categoria = categoria::find($catgoria_id);
        return new JsonResponse(['res'=>1, 'data'=>$categoria]);

   }

   protected function created(Request $request){
            $data = $request->all();
            //$file = $request->file->path();
            $file = $request->file('file');

            $path = $file->store('img_categoria');

            $categoria = new categoria();
            $categoria->nombre = $data['nombre'];
            $categoria->foto= $path;
            $categoria->categoria_padre = $data['categoria_padre'];
            $categoria->save();

            return new JsonResponse(['res'=>1, 'msg'=>'categoria creada', 'data'=> $path]);
    }


    protected function update(Request $request, $catgoria_id){
           $data = $request->all();
           $categoria = categoria::find($catgoria_id);

           $categoria->nombre = $data['nombre'];
           $categoria->foto= $data['foto'];
           $categoria->categoria_padre = $data['categoria_padre'];
           $categoria->save();

          return new JsonResponse(['res'=>1, 'msg'=>'categoria actualizada']);


    }

    protected function delected($catgoria_id){

    	 categoria::find($catgoria_id)->delete();

    	 return new JsonResponse(['res'=>1, 'msg'=>'categoria eliminada']);
    }
}
