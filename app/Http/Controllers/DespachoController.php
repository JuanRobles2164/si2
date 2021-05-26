<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Despacho;
use Illuminate\Http\Request;
use App\Http\Requests\DespachosCreate;

class ArcoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(DespachosCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('DespachosRepository');
        $despachos = $repo->getAll();
        return view('despachos', $despachos);
    }

    public function create(DespachosCreate $request){
        $despacho = new Despacho;
        $despacho->fill($request->all());
        $this->factoryRepo::GetRepoInstance('DespachosRepository')->create($despacho);
        return $this->res;
    }

    public function update(DespachosCreate $request){
        $despacho = new Despacho;
        $this->factoryRepo::GetRepoInstance('DespachosRepository')->update($despacho, $request);
        return $this->res;
    }

    public function find(DespachosCreate $request){
        $despacho = $this->factoryRepo::GetRepoInstance('DespachosRepository')->find($request->id);
        return response()->json(['data' => $despacho]);
    }

    public function getAll(DespachosCreate $request){
        $despachos = $this->factoryRepo::GetRepoInstance('DespachosRepository')->getAll();
        return response()->json(['data' => $despachos]);

    }

    public function delete(DespachosCreate $request){
        $this->FactoryRepo::GetRepoInstance('DespachosRepository')->delete($request);
        return $this->res;
    }
}
