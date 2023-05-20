<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create([
            'name' => 'VendorName',
            'email' => 'vendor@vendor.com',
            'phone' => '0123456789',
            'password' => 'password',
            'is_approved' => 1,
            'is_active' => 1,

        ]);

        Vendor::factory(3)->create();
    }
}