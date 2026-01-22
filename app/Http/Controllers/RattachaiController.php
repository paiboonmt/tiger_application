<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RattachaiController extends Controller
{
    public function index()
    {
        $api = "https://api.tigermuaythai-app.com/api/count-members";
        $response = Http::get($api);
        $dataMembers = $response->json();

        $newMember = "https://api.tigermuaythai-app.com/api/count-newmembers";
        $responseNewMember = Http::get($newMember);
        $dataNewMember = $responseNewMember->json();

        $checkin = "https://api.tigermuaythai-app.com/api/count-checkins";
        $responseCheckin = Http::get($checkin);
        $dataCheckin = $responseCheckin->json();

        $dalySale = "https://api.tigermuaythai-app.com/api/daily-sales";
        $responseDalySale = Http::get($dalySale);
        $dataDalySale = $responseDalySale->json();
  
        return view('rattachai.index', compact('dataMembers', 'dataNewMember', 'dataCheckin','dataDalySale'));
    }
}
