<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Genero', function (Blueprint $table )
        {
            $table->bigIncrements('Id');
            $table->string('Descripcion',200);
        });

        DB::table("Genero")
        ->insert([
            "Descripcion" => "Hombre"
        ]);

        DB::table("Genero")
        ->insert([
            "Descripcion" => "Mujer"
        ]);

        Schema::create('GradoEscolar', function (Blueprint $table )
        {
            $table->bigIncrements('Id');
            $table->string('Descripcion',200);
        });    

        DB::table("GradoEscolar")
        ->insert([
            "Descripcion" => "Primero"
        ]);
        DB::table("GradoEscolar")
        ->insert([
            "Descripcion" => "Segundo"
        ]);
        DB::table("GradoEscolar")
        ->insert([
            "Descripcion" => "Tercero"
        ]);
        DB::table("GradoEscolar")
        ->insert([
            "Descripcion" => "Cuarto"
        ]);
        DB::table("GradoEscolar")
        ->insert([
            "Descripcion" => "Quinto"
        ]);
        DB::table("GradoEscolar")
        ->insert([
            "Descripcion" => "Sexto"
        ]);

        Schema::create('EstatusAlumno', function (Blueprint $table )
        {
            $table->bigIncrements('Id');
            $table->string('Descripcion',200);
        });

        DB::table("EstatusAlumno")
        ->insert([
            "Descripcion" => "Activo"
        ]);

        DB::table("EstatusAlumno")
        ->insert([
            "Descripcion" => "Inactivo"
        ]);
        

        Schema::create('Alumno', function (Blueprint $table )
        {
            $table->bigIncrements('Matricula');
            $table->string('Nombre',200);
            $table->date('FechaNacimiento');
            $table->unsignedBigInteger('SexoID');
            $table->unsignedBigInteger('GradoEscolarID');
            $table->unsignedBigInteger('EstatusID');
            $table->dateTime('Fecha_Creacion');
            $table->dateTime('Fecha_Modificación')->nullable();
        });
        
        Schema::table('Alumno', function($table) {
            $table->foreign('SexoID')->references('Id')->on('Genero');
            $table->foreign('GradoEscolarID')->references('Id')->on('GradoEscolar');
            $table->foreign('EstatusID')->references('Id')->on('EstatusAlumno');
        });
        
        DB::table("Alumno")
        ->insert([
            "Nombre" => "Omar Alejandro Leal Marroquin",
            "FechaNacimiento" => "1999-10-26",
            "SexoID" => 1,
            "GradoEscolarID" => 5,
            "EstatusID" => 1,
            "Fecha_Creacion" => new DateTime(date("d-m-Y"))
        ]);

        DB::table("Alumno")
        ->insert([
            "Nombre" => "Enrique Rodriguez Martinez",
            "FechaNacimiento" => "2001-09-03",
            "SexoID" => 1,
            "GradoEscolarID" => 3,
            "EstatusID" => 2,
            "Fecha_Creacion" => new DateTime(date("d-m-Y"))
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
