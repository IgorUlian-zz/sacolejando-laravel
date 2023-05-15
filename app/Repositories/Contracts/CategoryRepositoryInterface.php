<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{

    //RECUPERAR TODOS AS CATEGORIAS DO RESTAURANTE POR UUID
    public function getCategoriesByTenantUuid(string $uuid);

    //RECUPERAR TODOS AS CATEGORIAS DO RESTAURANTE POR ID
    public function getCategoriesByTenantId(int $idTenant);

    //RECUPERAR TODOS AS CATEGORIAS POR UUID
    public function getCategoryByUuid(string $uuid);

}