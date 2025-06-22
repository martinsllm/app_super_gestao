<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReasonContact;
use App\Contracts\ReasonContactRepositoryInterface;

class MainController extends Controller
{
    protected $reason_contacts;

    public function __construct(private ReasonContactRepositoryInterface $reason_contacts_repo)
    {
        $this->reason_contacts = $reason_contacts_repo;
    }

    public function index()
    {
        $reason_contacts = $this->reason_contacts->getAll();

        return view('site.main', ['reason_contacts' => $reason_contacts]);
    }
}
