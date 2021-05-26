<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersCreate;

class ArcoController extends Controller
{
    protected $res = ['status' => 200];
    protected $factoryRepo;

    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }

    public function index(UsersCreate $request){
        $repo = $this->factoryRepo::GetRepoInstance('UsersRepository');
        $users = $repo->getAll();
        return view('users', $users);
    }

    public function create(UsersCreate $request){
        $user = new User;
        $user->fill($request->all());
        $this->factoryRepo::GetRepoInstance('UsersRepository')->create($user);
        return $this->res;
    }

    public function update(UsersCreate $request){
        $user = new User;
        $this->factoryRepo::GetRepoInstance('UsersRepository')->update($user, $request);
        return $this->res;
    }

    public function find(UsersCreate $request){
        $user = $this->factoryRepo::GetRepoInstance('UsersRepository')->find($request->id);
        return response()->json(['data' => $user]);
    }

    public function getAll(UsersCreate $request){
        $users = $this->factoryRepo::GetRepoInstance('UsersRepository')->getAll();
        return response()->json(['data' => $users]);

    }

    public function delete(UsersCreate $request){
        $this->FactoryRepo::GetRepoInstance('UsersRepository')->delete($request);
        return $this->res;
    }
}
