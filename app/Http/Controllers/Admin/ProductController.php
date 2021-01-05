<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, App\Http\Models\Product, Str;

class ProductController extends Controller
{
    public function __Construct(){
        //ELIMINAR COMENTARIOS DESPUES
    //$this->middleware('auth');
    //$this->middleware('isadmin');
    }

    public function getHome(){
        return view('admin.products.home');
    }

    public function getProductAdd(){
        return view('admin.products.add');
    }

    public function postProductAdd(Request $request){
        $rules = [
            'name' => 'required',
            #'img' => 'required|image',
            'price' => 'required',
            'content' => 'required',
            'caracteristicas' => 'required',
            #'categoria' => 'required',
            #'stock' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre es requerido',
            'img.required' => 'Seleccione una imagen',
            'img.image' => 'El archivo no es una imagen',
            'price.required' => 'El precio es requerido',
            'content.required' => 'Ingrese una descripción del producto',
            'caracteristicas.required' => 'Ingrese las caracteristicas del producto',
            'categoria.required' => 'El nombre es requerido',
            'stock.required' => 'Ingrese el stock del producto',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator -> fails()):
            dd($validator);
            return back()->withErrors($validator) ->with('message','Se ha producido un error','typealert','danger')->withInput();
        else:
            $product = new Product;
            $product->name = e($request->input('name'));
            $product->image = "image.png";
            $product->price = $request->input('price');
            $product->content = e($request->input('content'));
            $product->caracteristicas = $request->input('caracteristicas');
            $product->categoria = $request->input('categoria');
            $product->stock = $request->input('stock');
            $product->slug = Str::slug($request->input('name'));
            if($product->save()):
                return redirect('/admin/products')->with('message','Producto publicado con exito')->with('typealert', 'success');
            endif;
        endif;
    }
}
