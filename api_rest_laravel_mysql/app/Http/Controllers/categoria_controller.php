<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria; //traigo el modelo de  categoria 

class categoria_controller extends Controller
{
    public function getCategorias()
    {
        $categorias = categoria::all()->where("cat_est", "=", 1);
        return response()->json($categorias, 200);
    }

    public function getcategoriaxId($id)
    {
        $categoria = categoria::all()->where("cat_est", "=", 1)->where("id", "=", $id);
        if (empty($categoria)) {
            return  response()->json(['ERR' => 'Sin Resultado'], 404);
        }
        return response()->json($categoria, 200);
    }

    public function insertCategoria(Request $request)
    {
        $categoria = categoria::create($request->all());
        return response()->json($categoria, 200);
    }

    public function updateCategoria(Request $request, $id)
    {
        $categoria = categoria::find($id);
        if (empty($categoria)) {
            return  response()->json(['ERR' => 'Sin Resultado'], 404);
        }
        $categoria->update($request->all());
        return response($categoria, 200);
    }

    public function deleteCategoria($id)
    {
        $categoria = categoria::find($id);
        if (empty($categoria)) {
            return  response()->json(['ERR' => 'Sin Resultado'], 404);
        }
        $categoria->update(['cat_est' => 0]);
        return response()->json($categoria);
    }
}
