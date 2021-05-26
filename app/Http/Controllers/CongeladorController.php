<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Congelador;
use Illuminate\Http\Request;
use App\Http\Requests\CongeladoresCreate;

class CongeladorController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(CongeladoresCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('CongeladoresRepository');
        $congeladores = $repo->getAll();
        return view('congeladores', $congeladores);
    }

    public function create(CongeladoresCreate $request){
        $congelador = new Congelador;
        $congelador->fill($request->all());
        $this->factoryRepo::GetRepoInstance('CongeladoresRepository')->create($congelador);
        return $this->res;
    }

    public function update(CongeladoresCreate $request){
        $congelador = new Congelador;
        $this->factoryRepo::GetRepoInstance('CongeladoresRepository')->update($congelador, $request);
        return $this->res;
    }

    public function find(CongeladoresCreate $request){
        $congelador = $this->factoryRepo::GetRepoInstance('CongeladoresRepository')->find($request->id);
        return response()->json(['data' => $congelador]);
    }

    public function getAll(CongeladoresCreate $request){
        $congeladores = $this->factoryRepo::GetRepoInstance('CongeladoresRepository')->getAll();
        return response()->json(['data' => $congeladores]);

    }

    public function delete(CongeladoresCreate $request){
        $this->FactoryRepo::GetRepoInstance('CongeladoresRepository')->delete($request);
        return $this->res;
    }
}
