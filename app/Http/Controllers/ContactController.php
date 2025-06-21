<?php

namespace App\Http\Controllers;

use App\Contracts\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(private ContactRepositoryInterface $repository)
    {
        $this->contactRepository = $repository;
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $this->contactRepository->create($request->all());
            return view('site.main');
        }

        return view('site.contact');
    }
}
