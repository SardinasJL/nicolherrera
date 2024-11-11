<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function validarForm(Request $request)
    {
        $request->validate([
            "ci" => "required|integer|min:0",
            "nombre" => "required|string|min:3|max:50",
            "apellido" => "required|string|min:3|max:50",
            "nacimiento" => "required|date",
            "direccion" => "required|string|min:3|max:200",
            "cursos_id" => "required|numeric"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$estudiantes = Estudiante::paginate(4);
        session()->flashInput($request->input());
        $estudiantes = Estudiante::where("nombre","like","%$request->buscador%")
            ->orWhere("apellido","like","%$request->buscador%")->paginate(4);
        return view("estudiantes_index", ["estudiantes" => $estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view("estudiantes_create", ["cursos" => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        $request->validate(["foto" => "required|image|mimes:jpg,jpeg,png|max:2048"]);
        if ($foto = $request->file("foto")) {
            $input = $request->all();
            $fotoNombre = date("YmdHis") . "." . $foto->getClientOriginalExtension();
            $fotoRuta = "imagenes/fotos";
            $foto->move($fotoRuta, $fotoNombre);
            $input["foto"] = $fotoNombre;
            Estudiante::create($input);
            return redirect()->route("estudiantes.index")->with(["Estudiante registrado"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estudiante = Estudiante::find($id);
        return view("estudiantes_show", ["estudiante" => $estudiante]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cursos = Curso::all();
        $estudiante = Estudiante::find($id);
        return view("estudiantes_edit", ["cursos" => $cursos, "estudiante" => $estudiante]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $request->validate(["foto" => "image|mimes:jpg,jpeg,png|max:2048"]);
        $estudiante = Estudiante::find($id);
        if ($foto = $request->file("foto")) {
            $archivoAEliminar = "imagenes/fotos/$estudiante->foto";
            if (file_exists($archivoAEliminar))
                unlink($archivoAEliminar);
            $input = $request->all();
            $fotoNombre = date("YmdHis") . "." . $foto->getClientOriginalExtension();
            $fotoRuta = "imagenes/fotos";
            $foto->move($fotoRuta, $fotoNombre);
            $input["foto"] = $fotoNombre;
            $estudiante->update($input);
        } else {
            $estudiante->update($request->all());
        }
        return redirect()->route("estudiantes.index")->with(["mensaje" => "Estudiante actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiante::find($id);
        $archivoAEliminar = "imagenes/fotos/$estudiante->foto";
        if (file_exists($archivoAEliminar))
            unlink($archivoAEliminar);
        $estudiante->delete();
        return redirect()->route("estudiantes.index")->with(["Estudiante borrado"]);
    }

    public function generarQR(string $id)
    {
        $estudiante = Estudiante::find($id);
        return view("estudiantes_qr", ["estudiante" => $estudiante]);
    }
}
