<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function validarForm(Request $request)
    {
        $request->validate([
            "nombre" => "required|string|min:2|max:50",
            "apellido" => "required|string|min:2|max:50",
            "nacimiento" => "required|date",
            "direccion" => "required|string|min:3|max:50",
            "telefono" => "required|integer",
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutores = Tutor::all();
        return view("tutores_index", ["tutores" => $tutores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tutores_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Tutor::create($request->all());
        return redirect()->route("tutores.index")->with(["mensaje" => "Tutor registrado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tutor = Tutor::find($id);
        return view("tutores_edit", ["tutor" => $tutor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $tutor = Tutor::find($id);
        $tutor->update($request->all());
        return redirect()->route("tutores.index")->with(["mensaje" => "Tutor actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tutor = Tutor::find($id);
        $tutor->delete();
        return redirect()->route("tutores.index")->with(["mensaje" => "Tutor borrado"]);
    }
}
