<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstudianteTutor extends Model
{
    protected $table = "estudiantes_tutores";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    public function relEstudiante()
    {
        return $this->belongsTo(Estudiante::class, "estudiantes_id", "id");
    }

    public function relTutor()
    {
        return $this->belongsTo(Tutor::class, "tutores_id", "id");
    }

    public function relRelacion()
    {
        return $this->belongsTo(Relacion::class, "relaciones_id", "id");
    }
}
