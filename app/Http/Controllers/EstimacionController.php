<?php

namespace App\Http\Controllers;

use App\Contracts\IEstimacionRepository;
use Illuminate\Http\Request;

class EstimacionController extends Controller
{
    protected $EstimacionRepository;

    public function __construct(IEstimacionRepository $EstimacionRepo)
    {
        $this->EstimacionRepository = $EstimacionRepo;
    }
    public function listar()
    {
        return $this->EstimacionRepository->getAll()->toArray();
    }
}
