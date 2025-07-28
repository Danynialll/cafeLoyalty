<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Ahmad Ali',
                'membership_id' => 'ABC123456',
                'points' => 100,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Siti Aminah',
                'membership_id' => 'XYZ789101',
                'points' => 150,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
