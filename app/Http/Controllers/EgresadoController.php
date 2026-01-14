<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use Illuminate\Http\Request;

class EgresadoController extends Controller
{
    // ✅ Middleware ahora se maneja desde rutas, no en el constructor

    // Dashboard mostrando todos los egresados
public function index()
{
    $egresados = Egresado::orderBy('created_at', 'desc')->paginate(10);
    return view('admin.dashboard', compact('egresados'));
}


    // Formulario para crear un nuevo egresado
    public function create()
    {
        $carreras = [
            'Ingeniería en Innovación Agrícola Sustentable',
            'Ingeniería en Sistemas Computacionales',
            'Licenciatura en Contaduría'
        ];

        $generaciones = [
            '2007-2012','2008-2013','2009-2014','2010-2015','2011-2016',
            '2012-2017','2013-2018','2014-2019','2015-2020','2016-2021',
            '2017-2022','2018-2023','2019-2024','2020-2025','2025-2026'
        ];

        return view('admin.egresados.create', compact('carreras', 'generaciones'));
    }

    // Guardar nuevo egresado
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|digits:8|unique:egresados',
            'nombre_completo' => 'required|string|max:255',
            'carrera' => 'required|string',
            'generacion' => 'required|string',
            'estatus' => 'required|in:Egresado,En seguimiento,Titulado',
            'domicilio' => 'required|string',
            'genero' => 'required|in:Masculino,Femenino,Otro',
            'telefono' => 'required|numeric|digits_between:1,10',
            'email' => 'required|email|unique:egresados',
        ]);

        Egresado::create($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Egresado registrado correctamente');
    }

    // Formulario para editar un egresado
    public function edit(Egresado $egresado)
    {
        $carreras = [
            'Ingeniería en Innovación Agrícola Sustentable',
            'Ingeniería en Sistemas Computacionales',
            'Licenciatura en Contaduría'
        ];

        $generaciones = [
            '2007-2012','2008-2013','2009-2014','2010-2015','2011-2016',
            '2012-2017','2013-2018','2014-2019','2015-2020','2016-2021',
            '2017-2022','2018-2023','2019-2024','2020-2025','2025-2026'
        ];

        return view('admin.egresados.edit', compact('egresado', 'carreras', 'generaciones'));
    }

    // Actualizar egresado
    public function update(Request $request, Egresado $egresado)
    {
        $request->validate([
            'matricula' => 'required|digits:8|unique:egresados,matricula,' . $egresado->id,
            'nombre_completo' => 'required|string|max:255',
            'carrera' => 'required|string',
            'generacion' => 'required|string',
            'estatus' => 'required|in:Egresado,En seguimiento,Titulado',
            'domicilio' => 'required|string',
            'genero' => 'required|in:Masculino,Femenino,Otro',
            'telefono' => 'required|numeric|digits_between:1,10',
            'email' => 'required|email|unique:egresados,email,' . $egresado->id,
        ]);

        $egresado->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Egresado actualizado correctamente');
    }

    // Eliminar egresado
    public function destroy(Egresado $egresado)
    {
        $egresado->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Egresado eliminado correctamente');
    }
}
