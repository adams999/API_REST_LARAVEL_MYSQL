<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria; //importamos nuestro modelo app debe ir con mayusculas(OJO)

class categoriaController extends Controller
{
    public function getCategoria() // traer todos los registros 
    {
        // $categorias = categoria::where('cat_nom', '=', 'postman')->get(); // esta es la forma de devolver todos los registros que coincidan con un where
        return response()->json(categoria::all(), 200);
    }

    public function getCategoriaId($id) //buscar de un solo registro
    {
        $categoria = categoria::find($id);

        if (is_null($categoria)) {
            return response()->json(['Mensaje' => 'Registro no encontrado'], 404);
        } else {
            return response()->json($categoria::find($id), 200);
        }
    }

    public function insertCategoria(Request $request) //crear un nuevo registro
    {
        $categoria = categoria::create($request->all());
        return response()->json($categoria, 200);
    }

    public function updateCategoria($id, Request $request) // update de registro
    {
        $categoria = categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(['Mensaje' => 'Registro no encontrado'], 404);
        } else {
            $categoria->update($request->all());
            return response($categoria, 200);
        }
    }

    public function deleteCategoria($id) //eliminar un registro se recomiendo solo actualizar un status
    {
        $categoria = categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(['Mensaje' => 'Registro no encontrado'], 404);
        } else {
            $categoria->delete();
            return response()->json(['Mensaje' => 'Registro Eliminado'], 200);
        }
    }
}
