<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visitors = [];

        for ($i = 1; $i <= 15; $i++) {
            $visitors[] = [
                'ip_address' => '192.168.1.' . rand(1, 100),
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'created_at' => Carbon::now()->subDays(rand(0, 29)),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('visitors')->insert($visitors);
    }
}
