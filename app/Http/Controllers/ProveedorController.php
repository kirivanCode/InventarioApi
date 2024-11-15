<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return response()->json(Proveedor::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:proveedor,email',
            'telefono' => 'required|string',
            'nombre' => 'required|string',
        ]);

        $proveedor = Proveedor::create($validated);
        return response()->json($proveedor, 201);
    }

    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            return response()->json($proveedor, 200);
        }
        return response()->json(['message' => 'Proveedor no encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            $proveedor->update($request->all());
            return response()->json($proveedor, 200);
        }
        return response()->json(['message' => 'Proveedor no encontrado'], 404);
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            $proveedor->delete();
            return response()->json(['message' => 'Proveedor eliminado'], 200);
        }
        return response()->json(['message' => 'Proveedor no encontrado'], 404);
    }
}
