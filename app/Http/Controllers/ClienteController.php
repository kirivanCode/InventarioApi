<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return response()->json(Cliente::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email|unique:cliente,email',
            'telefono' => 'required|string',
            'direccion' => 'nullable|string',
        ]);

        $cliente = Cliente::create($validated);
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return response()->json($cliente, 200);
        }
        return response()->json(['message' => 'Cliente no encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $validated = $request->validate([
                'nombre' => 'sometimes|required|string',
                'email' => 'sometimes|required|email|unique:cliente,email,' . $id,
                'telefono' => 'sometimes|required|string',
                'direccion' => 'nullable|string',
            ]);
            
            $cliente->update($validated);
            return response()->json($cliente, 200);
        }
        return response()->json(['message' => 'Cliente no encontrado'], 404);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
            return response()->json(['message' => 'Cliente eliminado'], 200);
        }
        return response()->json(['message' => 'Cliente no encontrado'], 404);
    }
}
