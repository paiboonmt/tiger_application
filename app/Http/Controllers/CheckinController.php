<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'tel' => '123-456-7890',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'A'
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'tel' => '987-654-3210',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'B'
            ],
            [
                'id' => 3,
                'name' => 'Alice Johnson',
                'tel' => '555-123-4567',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'A'
            ],
            [
                'id' => 4,
                'name' => 'Michael Brown',
                'tel' => '555-234-5678',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'B'
            ],
            [
                'id' => 5,
                'name' => 'Emily Davis',
                'tel' => '555-345-6789',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'A'
            ],
            [
                'id' => 6,
                'name' => 'David Wilson',
                'tel' => '555-456-7890',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'B'
            ],
            [
                'id' => 7,
                'name' => 'Sarah Miller',
                'tel' => '555-567-8901',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'A'
            ],
            [
                'id' => 8,
                'name' => 'James Taylor',
                'tel' => '555-678-9012',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'B'
            ],
            [
                'id' => 9,
                'name' => 'Linda Anderson',
                'tel' => '555-789-0123',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'A'
            ],
            [
                'id' => 10,
                'name' => 'Robert Thomas',
                'tel' => '555-890-1234',
                'create_at' => date('Y-m-d H:i:s'),
                'group' => 'B'
            ],
        ];

        $image = 'https://m.media-amazon.com/images/S/pv-target-images/144540abcf5eb3ca17ea30a5ac3554dcd011a2880ccfba9694d13b27362060fe.jpg';


        return view('checkin.index', compact('data', 'image'));
    }
}
