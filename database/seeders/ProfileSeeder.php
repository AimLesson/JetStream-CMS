<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::firstOrCreate([
            'name' => 'Yayasan Name',
            'company_profile' => 'Default company profile.',
            'about' => 'About the Yayasan.',
            'phone' => '1234567890',
            'address' => 'Default address.',
        ]);
    }
}
