<?php

namespace App\Http\Controllers;

use App\Contracts\PostRepositoryInterface;
use App\Contracts\GetRepositoryInterface;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    protected $contactRepository;
    protected $reasonContactRepository;

    public function __construct(
        private PostRepositoryInterface $repositoryInterface,
        private GetRepositoryInterface $reasonContactRepositoryInterface
    ) {
        $this->contactRepository = $repositoryInterface;
        $this->reasonContactRepository = $reasonContactRepositoryInterface;
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
