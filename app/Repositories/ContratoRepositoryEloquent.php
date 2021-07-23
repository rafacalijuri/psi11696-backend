<?php

namespace App\Repositories;

use Illuminate\Http\Request as HttpRequest;

use App\Models\Contrato as ContratoModel;
use App\Repositories\ContratoRepositoryInterface;

class ContratoRepositoryEloquent implements ContratoRepositoryInterface{

    private ContratoModel $model;

    public function __construct(ContratoModel $model){
        $this->model = $model;
    }
    
    public function index(){
        return $this->model->all();
    }

    public function produtos(){
        return $this->model->select('NU_PRODUTO')->distinct()->get();
    }

    public function produto(int $produto){
        return $this->model->query()->where('NU_PRODUTO', '=', $produto)->get();
    }

    public function show(int $produto, int $contrato){
        
        return
            $this->model->query()
            ->where('NU_PRODUTO', '=', $produto)
            ->where('NU_CONTRATO', '=', $contrato)
            ->get();
    }
    
}