<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\PersonaRecibe;
use Illuminate\Http\Request;
use App\Http\Requests\PersonasRecibenCreate;

class ArcoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(PersonasRecibenCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('PersonasRecibenRepository');
        $personasReciben = $repo->getAll();
        return view('PersonasReciben', $personasReciben);
    }

    public function create(PersonasRecibenCreate $request){
        $personaRecibe = new PersonaRecibe;
        $personaRecibe->fill($request->all());
        $this->factoryRepo::GetRepoInstance('PersonasRecibenRepository')->create($personaRecibe);
        return $this->res;
    }

    public function update(PersonasRecibenCreate $request){
        $personaRecibe = new PersonaRecibe;
        $this->factoryRepo::GetRepoInstance('PersonasRecibenRepository')->update($personaRecibe, $request);
        return $this->res;
    }

    public function find(PersonasRecibenCreate $request){
        $personaRecibe = $this->factoryRepo::GetRepoInstance('PersonasRecibenRepository')->find($request->id);
        return response()->json(['data' => $personaRecibe]);
    }

    public function getAll(PersonasRecibenCreate $request){
        $personasReciben = $this->factoryRepo::GetRepoInstance('PersonasRecibenRepository')->getAll();
        return response()->json(['data' => $personasReciben]);

    }

    public function delete(PersonasRecibenCreate $request){
        $this->FactoryRepo::GetRepoInstance('PersonasRecibenRepository')->delete($request);
        return $this->res;
    }
}
