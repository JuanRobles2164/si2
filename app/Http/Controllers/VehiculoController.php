<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculosCreate;

class VehiculoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(VehiculosCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('VehiculoRepository');
        $vehiculos = $repo->getAll();
        return view('vehiculos', $vehiculos);
    }

    public function create(VehiculosCreate $request){
        $vehiculo = new Vehiculo;
        $vehiculo->fill($request->all());
        $this->factoryRepo::GetRepoInstance('VehiculoRepository')->create($vehiculo);
        return $this->res;
    }

    public function update(VehiculosCreate $request){
        $vehiculo = new Vehiculo;
        $this->factoryRepo::GetRepoInstance('VehiculoRepository')->update($vehiculo, $request);
        return $this->res;
    }

    public function find(VehiculosCreate $request){
        $vehiculo = $this->factoryRepo::GetRepoInstance('VehiculoRepository')->find($request->id);
        return response()->json(['data' => $vehiculo]);
    }

    public function getAll(VehiculosCreate $request){
        $vehiculos = $this->factoryRepo::GetRepoInstance('VehiculoRepository')->getAll();
        return response()->json(['data' => $vehiculos]);

    }

    public function delete(VehiculosCreate $request){
        $this->FactoryRepo::GetRepoInstance('VehiculoRepository')->delete($request);
        return $this->res;
    }
}
