<?php

namespace App\Http\Controllers;

use App\Contracts\IElementoRepository;
use Illuminate\Http\Request;

class ElementoController extends Controller
{

    protected $ElementoRepository;

    public function __construct(IElementoRepository $ElementoRepo)
    {
        $this->ElementoRepository = $ElementoRepo;
    }
    public function listar()
    {
        return $this->ElementoRepository->getAll()->toArray();
    }
}
