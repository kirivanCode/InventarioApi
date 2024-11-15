<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        return response()->json(Compra::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proveedor_id' => 'required|exists:proveedor,id',
            'producto_id' => 'required|exists:producto,id',
            'cantidad' => 'required|integer|min:1',
            'precio_compra' => 'required|numeric|min:0',
        ]);

        $compra = Compra::create($validated);
        return response()->json($compra, 201);
    }

    public function show($id)
    {
        $compra = Compra::find($id);
        if ($compra) {
            return response()->json($compra, 200);
        }
        return response()->json(['message' => 'Compra no encontrada'], 404);
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::find($id);
        if ($compra) {
            $compra->update($request->all());
            return response()->json($compra, 200);
        }
        return response()->json(['message' => 'Compra no encontrada'], 404);
    }

    public function destroy($id)
    {
        $compra = Compra::find($id);
        if ($compra) {
            $compra->delete();
            return response()->json(['message' => 'Compra eliminada'], 200);
        }
        return response()->json(['message' => 'Compra no encontrada'], 404);
    }
}
