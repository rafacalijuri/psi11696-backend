<?php
namespace App\Http\Controllers;

use App\Services\SaldoService;

use Illuminate\Http\Request as HttpRequest;

class SaldoController extends Controller{

    private SaldoService $service;

    public function __construct(SaldoService $service){
        $this->service = $service;
    }

    public function index(){ 
        return $this->service->index();
    }

    public function saldosContrato(int $produto, int $contrato){ 
        return $this->service->saldosContrato($produto, $contrato);
    }

    public function show(int $produto, int $contrato, int $saldo){ 
        return $this->service->show($produto, $contrato, $saldo);
    }

    public function update(int $produto, int $contrato, int $saldo, HttpRequest $request){ 
        return $this->service->update($produto, $contrato, $saldo, $request);
    }

}