<?php

namespace App\Repositories;

use Illuminate\Http\Request as HttpRequest;

use App\Models\Parcela as ParcelaModel;
use App\Repositories\ParcelaRepositoryInterface;

class ParcelaRepositoryEloquent implements ParcelaRepositoryInterface{

    private ParcelaModel $model;

    public function __construct(ParcelaModel $model){
        $this->model = $model;
    }
    
    public function index(){
        return $this->model->all();
    }

    public function parcelasContrato(int $produto, int $contrato){
        
        return
            $this->model->query()
            ->select('NU_PARCELA', 'DT_PARCELA' ,'VR_PARCELA' ,'VR_AMORTIZACAO' ,'VR_JUROS')
            ->where('NU_PRODUTO', '=', $produto)
            ->where('NU_CONTRATO', '=', $contrato)
            ->get();

    }

    public function show(int $produto, int $contrato, int $parcela){

        return
            $this->model->query()
            ->select('NU_PARCELA', 'DT_PARCELA' ,'VR_PARCELA' ,'VR_AMORTIZACAO' ,'VR_JUROS')
            ->where('NU_PRODUTO', '=', $produto)
            ->where('NU_CONTRATO', '=', $contrato)
            ->where('NU_PARCELA', '=', $parcela)
            ->get();
            
    }

    public function update(int $produto, int $contrato, int $parcela, HttpRequest $request){

        $objetoParcela = 
            $this->model->query()
            ->where('NU_PRODUTO', '=', $produto)
            ->where('NU_CONTRATO', '=', $contrato)
            ->where('NU_PARCELA', '=', $parcela);

        $objetoParcela->update($request->all());
            
    }
    
    
}