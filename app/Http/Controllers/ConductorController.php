<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Conductor;
use Illuminate\Http\Request;
use App\Http\Requests\ConductoresCreate;

class ArcoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(ConductoresCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('ConductoresRepository');
        $conductores = $repo->getAll();
        return view('conductores', $conductores);
    }

    public function create(ConductoresCreate $request){
        $conductor = new Conductor;
        $conductor->fill($request->all());
        $this->factoryRepo::GetRepoInstance('ConductoresRepository')->create($conductor);
        return $this->res;
    }

    public function update(ConductoresCreate $request){
        $conductor = new Conductor;
        $this->factoryRepo::GetRepoInstance('ConductoresRepository')->update($conductor, $request);
        return $this->res;
    }

    public function find(ConductoresCreate $request){
        $conductor = $this->factoryRepo::GetRepoInstance('ConductoresRepository')->find($request->id);
        return response()->json(['data' => $conductor]);
    }

    public function getAll(ConductoresCreate $request){
        $conductores = $this->factoryRepo::GetRepoInstance('ConductoresRepository')->getAll();
        return response()->json(['data' => $conductores]);

    }

    public function delete(ConductoresCreate $request){
        $this->FactoryRepo::GetRepoInstance('ConductoresRepository')->delete($request);
        return $this->res;
    }
}
