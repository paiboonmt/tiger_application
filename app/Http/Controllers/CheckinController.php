<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDOException;

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

    function checkNumber(Request $request)
    {

        $request->validate([
            'number' => 'required|numeric',
        ]);

        // Perform your logic here, e.g., check the number in the database
        try {
           $number = DB::table('member')
            ->where('m_card', $request->number)
            ->first();
            return response()->json(['exists' => $number !== null, 'data' => $number]);
        } catch (PDOException $e) {
            // Handle the exception, e.g., log it or return an error response
            return response()->json(['error' => 'Database query failed: ' . $e->getMessage()], 500);
        }

    //    dd($number);
        $group = $number->group ?? null;

        dd($group);

        // if ($number) {
        //     // Number exists in the database
        //     return response()->json(['exists' => true, 'data' => $number]);
        // } else {
        //     // Number does not exist in the database
        //     return response()->json(['exists' => false]);
        // }
    }
}
