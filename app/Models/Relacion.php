<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relacion extends Model
{
    protected $table = "relaciones";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    public function relEstudianteTutor()
    {
        return $this->hasMany(EstudianteTutor::class, "relaciones_id", "id");
    }
}
