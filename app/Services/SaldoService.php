<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request as HttpRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

use App\Repositories\SaldoRepositoryInterface;
use App\Validators\SaldoValidator;

use App\Util\Util;

class SaldoService{

    private SaldoRepositoryInterface $repository;

    public function __construct(SaldoRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(){
        try{
            return $this->repository->index();
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }

    }

    public function saldosContrato(int $produto, int $contrato){
        try{
            return $this->repository->saldosContrato($produto, $contrato);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }

    public function show(int $produto, int $contrato, int $saldo){
        try{
            return $this->repository->show($produto, $contrato, $saldo);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }

    public function update(int $produto, int $contrato, int $saldo, HttpRequest $request){

        $validator = SaldoValidator::validate($request);
        if ($validator->fails())
            return response()->json($validator->errors(), HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        
        try{
            $objetoSaldo = $this->repository->show($produto, $contrato, $saldo);

            if (is_null($objetoSaldo))
                return response()->json(['erro'=>'Recurso nao encontrado'], HttpResponse::HTTP_NOT_FOUND);
            
            $this->repository->update($produto, $contrato, $saldo, $request);
            $objetoSaldo = $this->repository->show($produto, $contrato, $saldo);

            return response()->json($objetoSaldo, HttpResponse::HTTP_OK);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }


}
