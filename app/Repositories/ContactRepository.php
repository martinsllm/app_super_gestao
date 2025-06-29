<?php

namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements PostRepositoryInterface
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
