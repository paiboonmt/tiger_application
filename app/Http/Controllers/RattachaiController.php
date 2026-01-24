<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RattachaiController extends Controller
{
    public function index()
    {

        // row 1

        $api = "https://api.tigermuaythai-app.com/api/count-members";
        $response = Http::get($api);
        $dataMembers = $response->json();

        $newMember = "https://api.tigermuaythai-app.com/api/count-newmembers";
        $responseNewMember = Http::get($newMember);
        $dataNewMember = $responseNewMember->json();

        $checkin = "https://api.tigermuaythai-app.com/api/count-checkins";
        $responseCheckin = Http::get($checkin);
        $dataCheckin = $responseCheckin->json();

        // row 2

        $dalySale = "https://api.tigermuaythai-app.com/api/daily-sales";
        $responseDalySale = Http::get($dalySale);
        $dataDalySales = $responseDalySale->json()['dailySalesData'] ?? [];

        $monthlySales = "https://api.tigermuaythai-app.com/api/monthly-sales";
        $responseMonthlySales = Http::get($monthlySales);
        $dataMonthlySales = $responseMonthlySales->json()['monthlySalesData'] ?? [];

        $yearlySales = "https://api.tigermuaythai-app.com/api/yearly-sales";
        $responseYearlySales = Http::get($yearlySales);
        $dataYearlySales = $responseYearlySales->json()['yearlySalesData'] ?? [];

        // row 3
        $productPopular = "https://api.tigermuaythai-app.com/api/top-products";
        $responseProductPopular = Http::get($productPopular);
        $dataProductPopular = $responseProductPopular->json()['topProductsData'] ?? [];

        $thai_months = [
            1 => 'มกราคม',
            2 => 'กุมภาพันธ์',
            3 => 'มีนาคม',
            4 => 'เมษายน',
            5 => 'พฤษภาคม',
            6 => 'มิถุนายน',
            7 => 'กรกฎาคม',
            8 => 'สิงหาคม',
            9 => 'กันยายน',
            10 => 'ตุลาคม',
            11 => 'พฤศจิกายน',
            12 => 'ธันวาคม'
        ];
        $currentMonth = $thai_months[date('n')];

        return view('rattachai.index', compact(
            'dataMembers',
            'dataNewMember',
            'dataCheckin',
            'dataDalySales',
            'dataMonthlySales',
            'currentMonth',
            'dataYearlySales',
            'dataProductPopular'
        ));

    }
}
