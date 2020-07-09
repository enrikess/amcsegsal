<?php

namespace App\Http\Controllers;

use App\Contracts\ILineamientoRepository;
use Illuminate\Http\Request;

class LineamientoController extends Controller
{
    protected $LineamientoRepository;

    public function __construct(ILineamientoRepository $LineamientoRepo)
    {
        $this->LineamientoRepository = $LineamientoRepo;
    }
    public function listar(Request $request)
    {
        return $this->LineamientoRepository->buscarPorElemento($request->ElementoId)->toArray();
    }
}
