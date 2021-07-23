<?php

namespace App\Repositories;

use Illuminate\Http\Request as HttpRequest;

interface ParcelaRepositoryInterface{
    
    public function index();

    public function parcelasContrato(int $produto, int $contrato);

    public function show(int $produto, int $contrato, int $parcela);
    public function update(int $produto, int $contrato, int $parcela, HttpRequest $request);

}