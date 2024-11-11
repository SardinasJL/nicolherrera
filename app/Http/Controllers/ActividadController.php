<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Curso;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class ActividadController extends Controller
{
    public function validarForm(Request $request)
    {
        $request->validate([
            "cursos_id" => "required|numeric",
            "descripcion" => "required|string|min:3|max:200"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $actividades = Actividad::paginate(10);
        return view("actividades_index", ["actividades" => $actividades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view("actividades_create", ["cursos" => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Actividad::create($request->all());
        return redirect()->route("actividades.index")->with(["mensaje" => "Actividad creada"]);
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
        $actividad = Actividad::find($id);
        $cursos = Curso::all();
        return view("actividades_edit", ["actividad" => $actividad, "cursos" => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $actividad = Actividad::find($id);
        $actividad->update($request->all());
        return redirect()->route("actividades.index")->with(["mensaje" => "Actividad editada"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividad = Actividad::find($id);
        $actividad->delete();
        return redirect()->route("actividades.index")->with(["mensaje" => "Actividad eliminada"]);
    }
}
