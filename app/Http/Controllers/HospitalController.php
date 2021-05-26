<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Requests\HospitalesCreate;

class HospitalController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(HospitalesCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('HospitalesRepository');
        $hospitales = $repo->getAll();
        return view('hospitales', $hospitales);
    }

    public function create(HospitalesCreate $request){
        $hospital = new Hospital;
        $hospital->fill($request->all());
        $this->factoryRepo::GetRepoInstance('HospitalesRepository')->create($hospital);
        return $this->res;
    }

    public function update(HospitalesCreate $request){
        $hospital = new Hospital;
        $this->factoryRepo::GetRepoInstance('HospitalesRepository')->update($hospital, $request);
        return $this->res;
    }

    public function find(HospitalesCreate $request){
        $hospital = $this->factoryRepo::GetRepoInstance('HospitalesRepository')->find($request->id);
        return response()->json(['data' => $hospital]);
    }

    public function getAll(HospitalesCreate $request){
        $hospitales = $this->factoryRepo::GetRepoInstance('HospitalesRepository')->getAll();
        return response()->json(['data' => $hospitales]);

    }

    public function delete(HospitalesCreate $request){
        $this->FactoryRepo::GetRepoInstance('HospitalesRepository')->delete($request);
        return $this->res;
    }
}
