<?php

use App\AssetsType;
use Illuminate\Database\Seeder;

/**
 * Class AssetsTypeTableSeeder
 */
class AssetsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $assettypes = [
            'Cash',
            'Real Estate',
            'Gold',
            'Stock',
            'Fund Stock',
            'Crypto',
        ];

        foreach ($assettypes as $assettype) {
            AssetsType::factory()->create([
                'name'        => $assettype,
                'description' => $assettype
            ]);
        }
    }
}
