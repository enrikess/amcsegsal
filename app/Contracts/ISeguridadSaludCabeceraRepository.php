<?php

namespace App\Contracts;

interface ISeguridadSaludCabeceraRepository
{
    public function find($id);

    public function getAll();

    public function create(array $data);

    public function crearCompleto(array $data);

    public function calcularCalificacion(int $idCabecera);

    //public function calcularResultados(int $idCabecera);

    public function calcularResultados(int $idCabecera);

    public function update($object,$data);

    public function delete($object);

}
