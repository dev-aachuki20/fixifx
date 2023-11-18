<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards')->truncate();

        $reward = [
            [
                'trade' => 'Stocks/ETFs/ETN',
                'volume' => 'USD 10,000',
                'points' => '250',
                'image' => 'reward/x-coin.svg',
                'status' => '1',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'trade' => 'Stocks/ETFs/ETN',
                'volume' => 'USD 10,000',
                'points' => '250',
                'image' => 'reward/b-coin.svg',
                'status' => '1',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'trade' => 'Stocks/ETFs/ETN',
                'volume' => 'USD 10,000',
                'points' => '250',
                'image' => 'reward/b-coin.svg',
                'status' => '1',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'trade' => 'Stocks/ETFs/ETN',
                'volume' => 'USD 10,000',
                'points' => '250',
                'image' => 'reward/x-coin.svg',
                'status' => '1',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];
        Reward::insert($reward);
    }
}
