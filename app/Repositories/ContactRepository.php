<?php

namespace App\Repositories;

use App\Contracts\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    protected $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }

    public function create(array $attributes)
    {
        $this->contact->fill($attributes);
        $this->contact->save();
    }
}
