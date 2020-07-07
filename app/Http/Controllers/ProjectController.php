<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::latest()->paginate(1)
        ]);// por defecto la paginacion es de 15 items por pagina
    }
    public function show(Project $id)
    {
        return view('projects.show', ['project' => $id]);
    }
    public function create()
    {
        // aca solo retorno la vista create
        return view('projects.create');
    }
    public function store(SaveProjectRequest $request)
    {
        //SaveProjectRequest es el parametro inyectado con la validacion hecha en rules() 
        /* 
        solo va a devolver los campos validados  que definan aca en validacion sin importar 
        cuantos campos se han enviado en el formulario*/
       
        //aca almacena los datos ingresados en en el metodo create()
        Project::create($request->validated());
        //nos lleva al listado de proyectos y se va a ver el proyecto creado ya que es el mas reciente
        return redirect()->route('projects.index');
    }
    public function edit(Project $id)
    {
        return view('projects.edit', ['project' => $id]);
    }
    public function update(Project $id, SaveProjectRequest $request)
    {
        $id->update($request->validated());
        return redirect()->route('projects.show', $id);
    }
}
