<?php

namespace App\Contracts;

interface ILineamientoRepository
{
    public function buscarPorElemento($IdElemento);

    public function traerPreguntas();

    public function find($id);

    public function getAll();

    public function create($data);

    public function update($object,$data);

    public function delete($object);



}
