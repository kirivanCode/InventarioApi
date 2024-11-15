<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return response()->json(Venta::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|exists:producto,id',
            'cliente_id' => 'required|exists:cliente,id',
            'cantidad' => 'required|integer|min:1',
            'precio_venta' => 'required|numeric|min:0',
        ]);

        $venta = Venta::create($validated);
        return response()->json($venta, 201);
    }

    public function show($id)
    {
        $venta = Venta::find($id);
        if ($venta) {
            return response()->json($venta, 200);
        }
        return response()->json(['message' => 'Venta no encontrada'], 404);
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::find($id);
        if ($venta) {
            $venta->update($request->all());
            return response()->json($venta, 200);
        }
        return response()->json(['message' => 'Venta no encontrada'], 404);
    }

    public function destroy($id)
    {
        $venta = Venta::find($id);
        if ($venta) {
            $venta->delete();
            return response()->json(['message' => 'Venta eliminada'], 200);
        }
        return response()->json(['message' => 'Venta no encontrada'], 404);
    }
}
