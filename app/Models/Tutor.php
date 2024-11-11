<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = "tutores";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    public function relEstudianteTutor()
    {
        return $this->hasMany(EstudianteTutor::class, "tutores_id", "id");
    }
}
