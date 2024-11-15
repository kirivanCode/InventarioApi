<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return response()->json(Producto::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'estado' => 'required|in:disponible,agotado,descontinuado',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $producto = Producto::create($validated);
        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            return response()->json($producto, 200);
        }
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->update($request->all());
            return response()->json($producto, 200);
        }
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->delete();
            return response()->json(['message' => 'Producto eliminado'], 200);
        }
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }
}
