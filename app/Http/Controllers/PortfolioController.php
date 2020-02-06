<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('portfolio',[
            'projects' => Project::latest()->paginate(1)
        ]);// por defecto la paginacion es de 15 items por pagina
    }
}
