<?php

namespace App\Contracts;

interface ISeguridadSaludCabeceraRepository
{
    public function find($id);

    public function TraerCabeceraRespuestas($id);

    public function getAll();

    public function tablaCompleta($id);

    public function tablaResultados($id);

    public function TodasCabecerasConEstimaciones();

    public function grafico($id);

    public function create(array $data);

    public function crearCompleto(array $data);

    public function calcularCalificacion(int $idCabecera);

    public function calcularResultados(int $idCabecera);

    public function update($object,$data);

    public function ActualizarCompleto(array $data);

    public function delete($object);

}
