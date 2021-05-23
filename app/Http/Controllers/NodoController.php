<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use Illuminate\Http\Request;

class NodoController extends Controller
{
    private $factoryRepoInstace;
    public function __construct()
    {
        $this->factoryRepoInstace = FactoryRepo::GetInstance();
    }
}
