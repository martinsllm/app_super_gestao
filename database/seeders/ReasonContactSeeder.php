<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReasonContact;


class ReasonContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReasonContact::create(['reason_contact' => 'Dúvida']);
        ReasonContact::create(['reason_contact' => 'Elogio']);
        ReasonContact::create(['reason_contact' => 'Reclamação']);
    }
}
