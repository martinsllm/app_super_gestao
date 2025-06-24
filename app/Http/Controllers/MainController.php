<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReasonContact;
use App\Contracts\ReasonContactRepositoryInterface;

class MainController extends Controller
{
    protected $reasonContactRepository;

    public function __construct(private ReasonContactRepositoryInterface $repository)
    {
        $this->reasonContactRepository = $repository;
    }

    public function index()
    {
        $reason_contacts = $this->reasonContactRepository->getAll();
        return view('site.main', ['reason_contacts' => $reason_contacts]);
    }
}
