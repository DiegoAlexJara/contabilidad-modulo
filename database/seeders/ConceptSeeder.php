<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conceptos = [
            [
                'type' => 'credit_note',
                'value' => 'DEVOLUCIÓN DE MERCANCÍA'
            ],
            [
                'type' => 'invoice',
                'value' => 'COMPRA DE MERCANCÍA'
            ],
            [
                'type' => 'payment',
                'value' => 'PAGO DE FACTURA'
            ],            
        ];

        DB::table('concepts')->insert($conceptos);

    }
}
