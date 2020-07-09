<?php

namespace App\Contracts;

interface ISeguridadSaludResultadoRepository
{
    public function find($id);

    public function getAll();

    public function create($data);

    public function update($object,$data);

    public function delete($object);

}
