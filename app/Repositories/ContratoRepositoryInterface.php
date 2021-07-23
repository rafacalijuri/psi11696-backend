<?php

namespace App\Repositories;

interface ContratoRepositoryInterface{
    
    public function index();

    public function produtos();
    
    public function produto(int $produto);

    public function show(int $produto, int $contrato);

}