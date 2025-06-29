<?php

use App\Contracts\GetRepositoryInterface;
use App\Models\Unit;


class UnitRepository implements GetRepositoryInterface
{

    protected $units;

    public function __construct()
    {
        $this->units = new Unit();
    }

    public function getAll()
    {
        return $this->units->all();
    }
}
