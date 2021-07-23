<?php
namespace App\Http\Controllers;

use App\Services\ContratoService;


class ContratoController extends Controller{

    private ContratoService $service;

    public function __construct(ContratoService $service){
        $this->service = $service;
    }

    public function index(){ 
        return $this->service->index();
    }

    public function produtos(){ 
        return $this->service->produtos();
    }

    public function produto(int $produto){ 
        return $this->service->produto($produto);
    }

    public function show(int $produto, int $contrato){ 
        return $this->service->show($produto, $contrato);
    }
    

}