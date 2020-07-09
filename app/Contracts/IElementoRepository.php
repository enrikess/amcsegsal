<?php

namespace App\Contracts;

interface IElementoRepository
{
    public function find($id);

    public function getAll();

    public function create($data);

    public function update($object,$data);

    public function delete($object);


}
