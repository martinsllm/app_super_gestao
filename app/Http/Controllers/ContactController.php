<?php

namespace App\Http\Controllers;

use App\Contracts\ContactRepositoryInterface;
use App\Contracts\ReasonContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactRepository;
    protected $reason_contacts;

    public function __construct(
        private ContactRepositoryInterface $repository,
        private ReasonContactRepositoryInterface $reason_contacts_repo
    ) {
        $this->contactRepository = $repository;
        $this->reason_contacts = $reason_contacts_repo;
    }

    public function index()
    {
        $reason_contacts = $this->reason_contacts->getAll();
        return view('site.contact', ['reason_contacts' => $reason_contacts]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'phone' => 'required',
            'email' => 'email',
            'reason_contact_id' => 'required',
            'message' => 'required|max:2000',
        ];

        $messages = [
            'required' => 'O campo :attribute precisa ser preenchido.',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'email' => 'Informe um e-mail válido.'
        ];
        $request->validate(
            $rules,
            $messages
        );

        $this->contactRepository->create($request->all());
        return redirect()->route('site.main');
    }
}
