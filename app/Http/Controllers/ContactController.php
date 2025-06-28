<?php

namespace App\Http\Controllers;

use App\Contracts\ContactRepositoryInterface;
use App\Contracts\ReasonContactRepositoryInterface;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    protected $contactRepository;
    protected $reasonContactRepository;

    public function __construct(
        private ContactRepositoryInterface $repository,
        private ReasonContactRepositoryInterface $reason_contacts_repo
    ) {
        $this->contactRepository = $repository;
        $this->reasonContactRepository = $reason_contacts_repo;
    }

    public function index()
    {
        $reason_contacts = $this->reasonContactRepository->getAll();
        return view('site.contact', ['reason_contacts' => $reason_contacts]);
    }

    public function store(ContactRequest $request)
    {
        $this->contactRepository->create($request->all());
        return redirect()->route('site.main');
    }
}
