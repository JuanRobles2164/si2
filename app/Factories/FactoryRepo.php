<?php

namespace App\Factories;
use App\Repositories;
use Exception;

class FactoryRepo{
    private static $repos = [
        'ArcosRepository' => "App\Repositories\Arcos\ArcosRepository",
        'CiudadesRepository' => 'App\Repositories\Ciudades\CiudadesRepository',
        'ConductoresRepository' => 'App\Repositories\Conductores\ConductoresRepository',
        'CongeladoresRepository' => 'App\Repositories\Congeladores\CongeladoresRepository',
        'DepartamentosRepository' => 'App\Repositories\Departamentos\DepartamentosRepository',
        'DespachosRepository' => 'App\Repositories\Despachos\DespachosRepository',
        'HospitalesRepository' => 'App\Repositories\Hospitales\HospitalesRepository',
        'NodosRepository' => 'App\Repositories\Nodos\NodosRepository',
        'PersonasRecibenRepository' => 'App\Repositories\Personas\PersonasRecibenRepository',
        'RutasRepository' => 'App\Repositories\Rutas\RutasRepository',
        'VacunasRepository' => 'App\Repositories\Vacunas\VacunasRepository',
        'VehiculosRepository' => 'App\Repositories\Vehiculos\VehiculosRepository',
        //'' => 'App\Repositories\',
    ];
    private static $instance;
    private function __construct(){

    }
    public static function GetInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public static function GetRepoInstance($RepoName){
        try{
            $factory = self::$repos[$RepoName];
            $RepoInstance = $factory::GetInstance();
            return $RepoInstance;
        }catch(Exception $e){
            return false;
        }
    }
    //obtiene la instancia de todos los repositorios
    public static function GetAllRepos(){
        try{
            $arr = [];
            foreach(static::$repos as $key => $value){
                $RepoInstance = $value::GetInstance();
                array_push($arr, $RepoInstance);
            }
            return $arr;
        }catch(Exception $e){
            return false;
        }
    }
}
