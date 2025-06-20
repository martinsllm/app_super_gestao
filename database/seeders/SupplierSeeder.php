<?php

namespace Database\Seeders;

use \App\Models\Supplier;
use Illuminate\Database\Seeder;


class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = new Supplier();
        $supplier->name = "Fornecedor ABC";
        $supplier->uf = "SP";
        $supplier->email = "contato@abc.com.br";
        $supplier->save();

        Supplier::create([
            "name" => "Fornecedor XYZ",
            "uf" => "SC",
            "email" => "contato@xyz.com.br",
        ]);

    }
}
