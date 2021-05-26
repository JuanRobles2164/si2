<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Ruta;
use Illuminate\Http\Request;
use App\Http\Requests\RutasCreate;

class ArcoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(RutasCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('RutasRepository');
        $rutas = $repo->getAll();
        return view('rutas', $rutas);
    }

    public function create(RutasCreate $request){
        $ruta = new Ruta;
        $ruta->fill($request->all());
        $this->factoryRepo::GetRepoInstance('RutasRepository')->create($ruta);
        return $this->res;
    }

    public function update(RutasCreate $request){
        $ruta = new Ruta;
        $this->factoryRepo::GetRepoInstance('RutasRepository')->update($ruta, $request);
        return $this->res;
    }

    public function find(RutasCreate $request){
        $ruta = $this->factoryRepo::GetRepoInstance('RutasRepository')->find($request->id);
        return response()->json(['data' => $ruta]);
    }

    public function getAll(RutasCreate $request){
        $rutas = $this->factoryRepo::GetRepoInstance('RutasRepository')->getAll();
        return response()->json(['data' => $rutas]);

    }

    public function delete(RutasCreate $request){
        $this->FactoryRepo::GetRepoInstance('RutasRepository')->delete($request);
        return $this->res;
    }
}
