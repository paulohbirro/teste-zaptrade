<?php

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Excel::load(database_path('seeds/csv/units.csv'))
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item['unidade'],
                    'place' => $item['logradouro'],
                    'neighborhood' => $item['bairro'],
                    'city' => $item['cidade'],
                    'state' => $item['estado'],
                    'zipcode' => str_replace('-', '', $item['cep']),
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString()
                ];
            })->toArray();

        foreach ($csv as $item){
            DB::table('units')->insert($item);
        }
    }
}
