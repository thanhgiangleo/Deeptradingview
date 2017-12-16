<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoinController extends Controller
{
    // public $url = "https://deeptradingview.com/api/trade/coin/";
    // public $chart = new Highcharts();
    // public $list_sell_amount = [];
    // public $list_buy_amount = [];
    // public $list_start_time = [];
    // public $list_end_time = [];
    // public $list_sell_prive_avg = [];
    // public $list_buy_prive_avg = [];
    //
    public function index() {
        return view('coinview');
    }
    //
    // public function detach_attribute($json) {
    //     $obj = json_decode($json);
    //
    //     for ($i = obj.data.length - 1; $i >= 0; $i--) {
    //         array_push($list_sell_amount, obj.data[$i].sell_amount);
    //         array_push($list_buy_amount, obj.data[$i].buy_amount);
    //         array_push($list_start_time, obj.data[$i].start_time);
    //         array_push($list_sell_prive_avg, obj.data[$i].sell_price_avg);
    //         array_push($list_buy_prive_avg, obj.data[$i].buy_price_avg);
    //     }
    //
    //     return 0;
    // }
    //
    // public function httpGet($theUrl) {
    //     $xmlHttp = new XMLHttpRequest();
    //     $xmlHttp.open("GET", $theUrl, false); // false for synchronous request
    //     $xmlHttp.send(null);
    //     return $xmlHttp.responseText;
    // }
    //
    // public function GetTimeView()
    // {
    //     $element = document.getElementById("timeview");
    //     $timeview = element.options[element.selectedIndex].value;
    //     return $timeview;
    // }
    //
    // public function GetTradeWith()
    // {
    //     $element = document.getElementById("tradewith");
    //     $tradewith = element.options[element.selectedIndex].value;
    //     return $tradewith;
    // }
    //
    // public function LoadVolChart($coinname, $timeview) {
    //     $result = httpGet($url + $coinname + '/' + $timeview + '/24');
    //     detach_attribute($result);
    //
    //
    // }
    //

    public function coinview($coinname = null) {
        $coin = ['coin-charts.js'];

        return view('coinview', compact('coin'));
    }
}
