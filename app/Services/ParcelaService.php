<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request as HttpRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

use App\Repositories\ParcelaRepositoryInterface;
use App\Validators\ParcelaValidator;

use App\Util\Util;

class ParcelaService{

    private ParcelaRepositoryInterface $repository;

    public function __construct(ParcelaRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(){
        try{
            return $this->repository->index();
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }

    }

    public function parcelasContrato(int $produto, int $contrato){
        try{
            return $this->repository->parcelasContrato($produto, $contrato);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }

    public function show(int $produto, int $contrato, int $parcela){
        try{
            return $this->repository->show($produto, $contrato, $parcela);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }

    public function update(int $produto, int $contrato, int $parcela, HttpRequest $request){

        $validator = ParcelaValidator::validate($request);
        if ($validator->fails())
            return response()->json($validator->errors(), HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        
        try{
            $objetoParcela = $this->repository->show($produto, $contrato, $parcela);

            if (is_null($objetoParcela))
                return response()->json(['erro'=>'Recurso nao encontrado'], HttpResponse::HTTP_NOT_FOUND);
            
            $this->repository->update($produto, $contrato, $parcela, $request);
            $objetoParcela = $this->repository->show($produto, $contrato, $parcela);

            return response()->json($objetoParcela, HttpResponse::HTTP_OK);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }
    }
}
