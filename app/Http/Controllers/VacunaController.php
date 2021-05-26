<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Vacuna;
use Illuminate\Http\Request;
use App\Http\Requests\VacunasCreate;

class ArcoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(VacunasCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('VacunasRepository');
        $vacunas = $repo->getAll();
        return view('vacunas', $vacunas);
    }

    public function create(VacunasCreate $request){
        $vacuna = new Vacuna;
        $vacuna->fill($request->all());
        $this->factoryRepo::GetRepoInstance('VacunasRepository')->create($vacuna);
        return $this->res;
    }

    public function update(VacunasCreate $request){
        $vacuna = new Vacuna;
        $this->factoryRepo::GetRepoInstance('VacunasRepository')->update($vacuna, $request);
        return $this->res;
    }

    public function find(VacunasCreate $request){
        $vacuna = $this->factoryRepo::GetRepoInstance('VacunasRepository')->find($request->id);
        return response()->json(['data' => $vacuna]);
    }

    public function getAll(VacunasCreate $request){
        $vacunas = $this->factoryRepo::GetRepoInstance('VacunasRepository')->getAll();
        return response()->json(['data' => $vacunas]);

    }

    public function delete(VacunasCreate $request){
        $this->FactoryRepo::GetRepoInstance('VacunasRepository')->delete($request);
        return $this->res;
    }
}
