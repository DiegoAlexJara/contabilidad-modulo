<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Proveedor 1',
                'currency' => 'USD',
                'status' => 'active',
            ],
            [
                'name' => 'Proveedor 2',
                'currency' => 'MXN',
                'status' => 'inactive',
            ],
            [
                'name' => 'Proveedor 3',
                'currency' => 'USD',
                'status' => 'active',
            ],
            [
                'name' => 'Proveedor 4',
                'currency' => 'MXN',
                'status' => 'inactive',
            ],
            [
                'name' => 'Proveedor 5',
                'currency' => 'USD',
                'status' => 'active',
            ],
            // Agrega más proveedores según lo necesites
        ];

        foreach ($suppliers as $supplier) {
            DB::table('suppliers')->insert([
                'name' => $supplier['name'],
                'currency' => $supplier['currency'],
                'status' => $supplier['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
