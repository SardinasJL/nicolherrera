<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class CursoController extends Controller
{
    public function validarForm(Request $request)
    {
        $request->validate([
            "descripcion" => "required|string|min:2|max:10"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cursos = Curso::paginate(10);
        return view("cursos_index", ["cursos" => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cursos_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Curso::create($request->all());
        return redirect()->route("cursos.index")->with(["mensaje" => "Curso creado"]);
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
        try {
            $curso = Curso::findOrFail($id);
            return view("cursos_edit", ["curso" => $curso]);
        } catch (\Exception $e) {
            return redirect()->route("cursos.index")->with(["mensaje" => "Curso no encontrado", "danger" => "danger"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        try {
            $curso = Curso::findOrFail($id);
            $curso->update($request->all());
            return redirect()->route("cursos.index", ["page" => $request->page])->with(["mensaje" => "Curso editado"]);
        } catch (\Exception $e) {
            return redirect()->route("cursos.index")
                ->with(["mensaje" => "No se pudo hallar el curso", "danger" => "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $curso = Curso::findOrFail($id);
            if (count($curso->relActividad) > 0) {
                return redirect()->route("cursos.index")
                    ->with(["mensaje" => "El curso posee actividades. Borre las actividades del curso primeramente",
                        "danger" => "danger"]);
            }
            if (count($curso->relEstudiante) > 0) {
                return redirect()->route("cursos.index")
                    ->with(["mensaje" => "El curso posee estudiantes. Borre los estudiantes primeramente",
                        ["danger" => "danger"]]);
            }
            $curso->delete();
            return redirect()->route("cursos.index", ["page" => $request->page])->with(["mensaje" => "Curso borrado"]);
        } catch (\Exception $e) {
            return redirect()->route("cursos.index")->with(["mensaje" => "Curso no encontrado", "danger" => "danger"]);
        }
    }
}
