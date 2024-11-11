<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\EstudianteTutor;
use App\Models\Relacion;
use App\Models\Tutor;
use Illuminate\Http\Request;

class EstudianteTutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $idEstudiante)
    {
        $estudiante = Estudiante::find($idEstudiante);
        return view("estudiantes_tutores_index", ["estudiante" => $estudiante]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $idEstudiante)
    {
        $estudiante = Estudiante::find($idEstudiante);
        $tutores = Tutor::all();
        $relaciones = Relacion::all();
        return view("estudiantes_tutores_create", ["estudiante" => $estudiante, "tutores" => $tutores, "relaciones" => $relaciones]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $idEstudiante)
    {
        $estudiante = Estudiante::find($idEstudiante);
        $request["estudiantes_id"] = $estudiante->id;
        EstudianteTutor::create($request->all());
        return redirect()->route("estudiantes.tutores.index", $estudiante)
            ->with(["mensaje" => "Padre/tutor vinculado correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idEstudiante, string $idEstudianteTutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idEstudiante, string $idEstudianteTutor)
    {
        $estudiante = Estudiante::find($idEstudiante);
        $tutores = Tutor::all();
        $relaciones = Relacion::all();
        $estudianteTutor = EstudianteTutor::find($idEstudianteTutor);
        return view("estudiantes_tutores_edit", ["estudiante" => $estudiante, "tutores" => $tutores, "relaciones" => $relaciones, "estudianteTutor" => $estudianteTutor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idEstudiante, string $idEstudianteTutor)
    {
        $estudiante = Estudiante::find($idEstudiante);
        $estudianteTutor = EstudianteTutor::find($idEstudianteTutor);
        $request["estudiantes_id"] = $estudiante->id;
        $estudianteTutor->update($request->all());
        return redirect()->route("estudiantes.tutores.index", $estudiante)
            ->with(["mensaje" => "Relación padre/tutor actualizada"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idEstudiante, string $idEstudianteTutor)
    {
        $estudiante = Estudiante::find($idEstudiante);
        $estudianteTutor = EstudianteTutor::find($idEstudianteTutor);
        $estudianteTutor->delete();
        return redirect()->route("estudiantes.tutores.index", $estudiante)
            ->with(["mensaje" => "Padre/tutor desvinculado"]);
    }
}
