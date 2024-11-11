<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "actividades";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    public function relCurso()
    {
        return $this->belongsTo(Curso::class, "cursos_id", "id");
    }
}
