<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    public function relActividad()
    {
        return $this->hasMany(Actividad::class, "cursos_id", "id");
    }
    public function relEstudiante()
    {
        return $this->hasMany(Estudiante::class, "cursos_id", "id");
    }
}
