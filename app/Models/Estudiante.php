<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table="estudiantes";
    protected $primaryKey="id";
    protected $guarded=["id"];
    public function relCurso()
    {
        return $this->belongsTo(Curso::class, "cursos_id", "id");
    }
    public function relEstudianteTutor()
    {
        return $this->hasMany(EstudianteTutor::class, "estudiantes_id", "id");
    }
}
