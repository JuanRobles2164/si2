<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Arco;
use Illuminate\Http\Request;
use App\Http\Requests\ArcosCreate;

class ArcoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(ArcosCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('ArcosRepository');
        $arcos = $repo->getAll();
        return view('arcos', $arcos);
    }

    public function create(ArcosCreate $request){
        $arco = new Arco;
        $arco->fill($request->all());
        $this->factoryRepo::GetRepoInstance('ArcosRepository')->create($arco);
        return $this->res;
    }

    public function update(ArcosCreate $request){
        $arco = new Arco;
        $this->factoryRepo::GetRepoInstance('ArcosRepository')->update($arco, $request);
        return $this->res;
    }

    public function find(ArcosCreate $request){
        $arco = $this->factoryRepo::GetRepoInstance('ArcosRepository')->find($request->id);
        return response()->json(['data' => $arco]);
    }

    public function getAll(ArcosCreate $request){
        $arcos = $this->factoryRepo::GetRepoInstance('ArcosRepository')->getAll();
        return response()->json(['data' => $arcos]);

    }

    public function delete(ArcosCreate $request){
        $this->FactoryRepo::GetRepoInstance('ArcosRepository')->delete($request);
        return $this->res;
    }
}
