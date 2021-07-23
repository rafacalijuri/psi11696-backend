<?php

namespace App\Repositories;

use Illuminate\Http\Request as HttpRequest;

use App\Models\Saldo as SaldoModel;
use App\Repositories\SaldoRepositoryInterface;

class SaldoRepositoryEloquent  implements SaldoRepositoryInterface{

    private SaldoModel $model;

    public function __construct(SaldoModel $model){
        $this->model = $model;
    }
    
    public function index(){
        return $this->model->all();
    }

    public function saldosContrato(int $produto, int $contrato){
        
        return
            $this->model->query()
            ->select('NU_SALDO', 'DT_SALDO' ,'VR_SALDO')
            ->where('NU_PRODUTO', '=', $produto)
            ->where('NU_CONTRATO', '=', $contrato)
            ->get();

    }

    public function show(int $produto, int $contrato, int $saldo){

        return
            $this->model->query()
            ->select('NU_SALDO', 'DT_SALDO' ,'VR_SALDO')
            ->where('NU_PRODUTO', '=', $produto)
            ->where('NU_CONTRATO', '=', $contrato)
            ->where('NU_SALDO', '=', $saldo)
            ->get();
            
    }
    
    public function update(int $produto, int $contrato, int $saldo, HttpRequest $request){

        $objetoSaldo = 
            $this->model->query()
            ->where('NU_PRODUTO', '=', $produto)
            ->where('NU_CONTRATO', '=', $contrato)
            ->where('NU_SALDO', '=', $saldo);

        $objetoSaldo->update($request->all());
            
    }

}