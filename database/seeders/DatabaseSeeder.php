<?php

namespace Database\Seeders;

use App\Models\Actividad;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\EstudianteTutor;
use App\Models\Relacion;
use App\Models\Tutor;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create(["name" => "admin", "email" => "admin@admin.com", "password" => "12345678"]);

        Curso::create(["descripcion" => "Primero A"]);
        Curso::create(["descripcion" => "Primero B"]);
        Curso::create(["descripcion" => "Primero C"]);
        Curso::create(["descripcion" => "Primero D"]);
        Curso::create(["descripcion" => "Primero E"]);
        Curso::create(["descripcion" => "Primero F"]);
        Curso::create(["descripcion" => "Segundo A"]);
        Curso::create(["descripcion" => "Segundo B"]);
        Curso::create(["descripcion" => "Segundo C"]);
        Curso::create(["descripcion" => "Segundo D"]);
        Curso::create(["descripcion" => "Segundo E"]);
        Curso::create(["descripcion" => "Segundo F"]);

        Actividad::create(["cursos_id" => 1, "descripcion" => "Reunión de padres de familia 12/11/2024 18:00"]);
        Actividad::create(["cursos_id" => 1, "descripcion" => "Asistencia al desfile del 7 de noviembre"]);
        Actividad::create(["cursos_id" => 1, "descripcion" => "Entrega de boletines 15/11/2024 18:00"]);
        Actividad::create(["cursos_id" => 2, "descripcion" => "Entrega de boletines 16/11/2024 18:30"]);
        Actividad::create(["cursos_id" => 2, "descripcion" => "Fiesta de despedida de fin de año 29/11/2024 09:00"]);

        Estudiante::insert([
            ["ci" => 111111, "nombre" => "Juancito", "apellido" => "Lopez Ramos", "nacimiento" => "2020-05-23",
                "direccion" => "Plaza Independencia", "cursos_id" => 1, "foto" => "1.jpg"],
            ["ci" => 111112, "nombre" => "Pedrito", "apellido" => "Flores Calle", "nacimiento" => "2020-12-31",
                "direccion" => "Avenida Chichas Nº 12", "cursos_id" => 1, "foto" => "2.jpg"],
            ["ci" => 111113, "nombre" => "Carlitos", "apellido" => "Gómez Cama", "nacimiento" => "2020-01-23",
                "direccion" => "Calle Chorolque Nº 90", "cursos_id" => 1, "foto" => "3.jpg"],
            ["ci" => 111114, "nombre" => "Luisito", "apellido" => "Aban Martinez", "nacimiento" => "2020-08-29",
                "direccion" => "Calle Santa Cruz s/n", "cursos_id" => 2, "foto" => "4.jpg"],
            ["ci" => 111115, "nombre" => "Martincito", "apellido" => "Martinez Venegas", "nacimiento" => "2020-04-15",
                "direccion" => "Avenida Diego de Almagro s/n", "cursos_id" => 2, "foto" => "5.jpg"]
        ]);

        Tutor::insert([
            ["nombre" => "Juan", "apellido" => "Lopez", "nacimiento" => "1990-05-16",
                "direccion" => "Plaza Independencia", "telefono" => 73877841],
            ["nombre" => "Juana", "apellido" => "Ramos", "nacimiento" => "1988-02-14",
                "direccion" => "Avenida Chichas Nº 12", "telefono" => 73877842],
            ["nombre" => "Pedro", "apellido" => "Flores", "nacimiento" => "1989-12-31",
                "direccion" => "Calle Avaroa Nº 10", "telefono" => 73877843],
            ["nombre" => "Carlos", "apellido" => "Gómez", "nacimiento" => "1980-06-14",
                "direccion" => "Avenida San Juan s/n", "telefono" => 73877844],
            ["nombre" => "Luis", "apellido" => "Abán", "nacimiento" => "1985-03-21",
                "direccion" => "Calle Florina Nº 60", "telefono" => 73877845],
            ["nombre" => "Martín", "apellido" => "Martínez", "nacimiento" => "1991-08-06",
                "direccion" => "Avenida Santa Cruz Nº 100", "telefono" => 73877846],
        ]);

        Relacion::insert([
            ["descripcion" => "Padre"], ["descripcion" => "Madre"], ["descripcion" => "Tutor"]
        ]);

        EstudianteTutor::insert([
            ["estudiantes_id" => 1, "tutores_id" => 1, "relaciones_id" => 1],
            ["estudiantes_id" => 1, "tutores_id" => 2, "relaciones_id" => 2],
            ["estudiantes_id" => 2, "tutores_id" => 3, "relaciones_id" => 1],
            ["estudiantes_id" => 3, "tutores_id" => 4, "relaciones_id" => 1],
            ["estudiantes_id" => 4, "tutores_id" => 5, "relaciones_id" => 1],
            ["estudiantes_id" => 5, "tutores_id" => 6, "relaciones_id" => 1],
        ]);

    }
}
