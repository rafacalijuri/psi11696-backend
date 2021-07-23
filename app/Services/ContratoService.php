<?php

namespace App\Services;

use Illuminate\Database\QueryException;

use App\Repositories\ContratoRepositoryInterface;

use App\Util\Util;

class ContratoService{

    private ContratoRepositoryInterface $repository;

    public function __construct(ContratoRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(){
        try{
            return $this->repository->index();
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }

    public function produtos(){
        try{
            return $this->repository->produtos();
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }

    public function produto(int $produto){
        try{
            return $this->repository->produto($produto);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }

    public function show($produto, $contrato){
        try{
            return $this->repository->show($produto, $contrato);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }
    
}
