<?php

namespace App\Http\Controllers;

use App\Contracts\GetRepositoryInterface;
use App\Repositories\ReasonContactRepository;
use Illuminate\Http\Request;
use App\Models\ReasonContact;
use App\Contracts\ReasonContactRepositoryInterface;

class MainController extends Controller
{
    protected $reasonContactRepository;

    public function __construct(private GetRepositoryInterface $reasonContactRepositoryInterface)
    {
        $this->reasonContactRepository = $reasonContactRepositoryInterface;
    }

    public function index()
    {
        $reason_contacts = $this->reasonContactRepository->getAll();
        return view('site.main', ['reason_contacts' => $reason_contacts]);
    }
}
