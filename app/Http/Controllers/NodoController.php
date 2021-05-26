<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Http\Requests\NodosCreate;
use App\Models\Nodo;
use Illuminate\Http\Request;

class NodoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;
    public function __construct(){
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(NodosCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('NodosRepository');
        $nodos = $repo->getAll();
        return view('nodos', $nodos);
    }

    public function create(NodosCreate $request){
        $nodo = new Nodo;
        $nodo->fill($request->all());
        $this->factoryRepo::GetRepoInstance('NodosRepository')->create($nodo);
        return $this->res;
    }

    public function update(NodosCreate $request){
        $nodo = new Nodo();
        $this->factoryRepo::GetRepoInstance('NodosRepository')->update($nodo, $request);
        return $this->res;
    }

    public function find(NodosCreate $request){
        $nodo = $this->factoryRepo::GetRepoInstance('NodosRepository')->find($request->id);
        return response()->json(['data' => $nodo]);
    }

    public function getAll(NodosCreate $request){
        $nodos = $this->factoryRepo::GetRepoInstance('NodosRepository')->getAll();
        return response()->json(['data' => $nodos]);

    }

    public function delete(NodosCreate $request){
        $this->FactoryRepo::GetRepoInstance('NodosRepository')->delete($request);
        return $this->res;
    }

}
