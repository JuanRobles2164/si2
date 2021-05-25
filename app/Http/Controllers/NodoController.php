<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\Nodo;
use Illuminate\Http\Request;

class NodoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;
    public function __construct(){
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(Request $request){
        $repo = $this->factoryRepoInstace::GetRepoInstance('NodosRepository');
        $nodos = $repo->getAll();
        return view('nodos', $nodos);
    }

    public function update(Request $request){
        $nodo = new Nodo();
        $this->factoryRepo::GetRepoInstance('NodosRepository')->update($nodo, $request);
        return $this->res;
    }

    public function find(Request $request){
        $nodo = $this->factoryRepo::GetRepoInstance('NodosRepository')->find($request->id);
        return response()->json(['data' => $nodo]);
    }

    public function getAll(Request $request){
        $nodos = $this->factoryRepo::GetRepoInstance('NodosRepository')->getAll();
        return response()->json(['data' => $nodos]);

    }

    public function delete(Request $request){
        $this->FactoryRepo::GetRepoInstance('NodosRepository')->delete($request);
        return $this->res;
    }

}
