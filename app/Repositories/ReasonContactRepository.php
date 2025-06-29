<?php

namespace App\Repositories;

use App\Contracts\GetRepositoryInterface;
use App\Models\ReasonContact;

class ReasonContactRepository implements GetRepositoryInterface
{
    protected $reason_contact;

    public function __construct()
    {
        $this->reason_contact = new ReasonContact();
    }

    public function getAll()
    {
        return $this->reason_contact->all();
    }
}
