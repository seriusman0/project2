<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@studycenter.local',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create student user
        DB::table('users')->insert([
            'name' => 'Student User',
            'email' => 'student@studycenter.local',
            'password' => Hash::make('password123'),
            'role' => 'student',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create parent user
        DB::table('users')->insert([
            'name' => 'Parent User',
            'email' => 'parent@studycenter.local',
            'password' => Hash::make('password123'),
            'role' => 'parent',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create sample payment proof
        DB::table('payments')->insert([
            'invoice_number' => 'INV-20250427001',
            'student_id' => '1234567890',
            'amount' => 1500000,
            'payment_date' => Carbon::now()->subDays(10),
            'proof_file' => 'payment_proofs/sample_payment_proof.pdf',
            'status' => 'paid',
            'notes' => 'Sample payment proof',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create sample blog post
        DB::table('blogs')->insert([
            'title' => 'Welcome to Study Center',
            'content' => 'This is a sample blog post welcoming users to the Study Center Management System.',
            'author_id' => 1,
            'status' => 'published',
            'published_at' => Carbon::now()->subDays(5),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
