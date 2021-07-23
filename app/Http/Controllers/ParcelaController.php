<?php
namespace App\Http\Controllers;

use App\Services\ParcelaService;

use Illuminate\Http\Request as HttpRequest;

class ParcelaController extends Controller{

    private ParcelaService $service;

    public function __construct(ParcelaService $service){
        $this->service = $service;
    }

    public function index(){ 
        return $this->service->index();
    }

    public function parcelasContrato(int $produto, int $contrato){ 
        return $this->service->parcelasContrato($produto, $contrato);
    }

    public function show(int $produto, int $contrato, int $parcela){ 
        return $this->service->show($produto, $contrato, $parcela);
    }

    public function update(int $produto, int $contrato, int $parcela, HttpRequest $request){ 
        return $this->service->update($produto, $contrato, $parcela, $request);
    }

}