<?php

namespace App\Repositories;

use App\Contracts\ReasonContactRepositoryInterface;
use App\Models\ReasonContact;

class ReasonContactRepository implements ReasonContactRepositoryInterface
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
