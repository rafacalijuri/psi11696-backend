<?php

namespace App\Repositories;

use Illuminate\Http\Request as HttpRequest;

interface SaldoRepositoryInterface {
    
    public function index();
    public function saldosContrato(int $produto, int $contrato);
    public function show(int $produto, int $contrato, int $saldo);
    public function update(int $produto, int $contrato, int $saldo, HttpRequest $request);

}