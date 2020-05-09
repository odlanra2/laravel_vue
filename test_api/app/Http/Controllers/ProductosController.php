<?php

namespace App\Http\Controllers;
use App\productos;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductosController extends Controller
{
    //

     protected function get_all(){
           $productos = productos::all();
           return new JsonResponse(['res'=>1, 'data'=>$productos]);


      }
      protected function get_id($producto_id){
          $productos = productos::find($producto_id);
          return new JsonResponse(['res'=>1, 'data'=>$productos]);
      }
      protected function created(Request $request){
            $data = $request->all();

            $productos = new productos();
            $productos->Nombre = $data['nombre'];
            $productos->Descripcion= $data['descripcion'];
            $productos->Peso= $data['peso'];
            $productos->Precio= $data['precio'];
            $productos->categoria_id= $data['categoria_id'];
            $productos->foto= $data['foto'];
            $productos->save();

            return new JsonResponse(['res'=>1, 'msg'=>'producto creado']);
     }
     protected function update(Request $request, $producto_id){
            $data = $request->all();
            $productos = productos::find($producto_id);

            $productos->Nombre = $data['nombre'];
            $productos->Descripcion= $data['descripcion'];
            $productos->Peso= $data['peso'];
            $productos->Precio= $data['precio'];
            $productos->categoria_id= $data['categoria_id'];
            $productos->foto= $data['foto'];
            $productos->save();

            return new JsonResponse(['res'=>1, 'msg'=>'producto Actualizado']);
    }

    protected function delected($producto_id){

    	  productos::find($producto_id)->delete();

    	 return new JsonResponse(['res'=>1, 'msg'=>'producto eliminado']);
    }
}
