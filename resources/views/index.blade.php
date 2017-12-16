@extends('partials.layout2')

@section('css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="w3-main">
                <div class="w3-container">
                    <h5><b><i class="fa fa-dashboard"></i> Coin Detail </b></h5>

                    <div class="w3-col-padding">

                        <div class="w3-twothird"> <!-- includes priceChart, volChart -->
                            <div class="w3-row-padding">
                                <div class="w3-twothird">
                                    Chart View:&nbsp;
                                    <select id="timeview" onchange="SelectTimeView_Load()">
                                        <option value="360">6 Hours</option>
                                        <option value="180">3 Hours</option>
                                        <option value="60" selected>1 Hour</option>
                                        <option value="30">30 Mins</option>
                                        <option value="15">15 Mins</option>
                                        <option value="5">5 Mins</option>
                                    </select>

                                    Trade With:&nbsp;
                                    <select id="tradewith" onchange="ChangeTradePair_Load()">
                                        <option value="usd" selected>USD</option>
                                        <option value="btc">BTC</option>
                                        <option value="eth">ETH</option>
                                    </select>
                                </div>
                                <br>
                            </div>

                            <div class="w3-row-padding">
                                <div id="tradingview-widget-container" class="w3-twothird" style="width:100%; height: 500px; display:block; margin: 0 auto">
                                    <!-- Load price Chart -->
                                </div>

                                <div class="w3-third">
                                    <!-- Load Info -->
                                </div>
                                <br>
                            </div>

                            <div class="w3-row-padding">
                                <div id="trading-container" class="w3-twothird" style="width:100%; height: 500px; display:block; margin: 0 auto">
                                    <!-- Load Vol Buy Sell Chart -->
                                </div>

                                <div class="w3-third">
                                    <!-- Load Info -->
                                </div>
                            </div>
                        </div> <!--End class w3-twothird-->

                        <div class="w3-third"> <!-- Includes priceComparedChart, pieChart -->
                            <p>Another chart</p>
                            <div class="w3-row-padding">
                                <div class="w3-twothird" style="width:100%; height: 500px; display:block; margin: 0 auto">
                                    <!-- Load Chart -->
                                    <p>III chart</p>
                                </div>
                            </div>
                            <div class="w3-row-padding">
                                <div class="w3-twothird" style="width:100%; height: 500px; display:block; margin: 0 auto">
                                    <!-- Load priceComparedChart -->

                                    <div class="w3-row-padding">
                                        <div class="w3-twothird" style="width:100%; height: 250px; display:block; margin: 0 auto">
                                            <!-- Load pieComparedChart -->
                                            <p>pieComparedChart</p>
                                        </div>
                                    </div>

                                    <div class="w3-row-padding">
                                        <div id="priceComparedChart-container" class="w3-twothird" style="width:100%; height: 250px; display:block; margin: 0 auto">
                                            <!-- Load priceComparedChart -->
                                            <p>priceComparedChart</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script language="javascript" src="../js/index.js"></script>
    <script language="javascript" src="../js/coin-charts.js"></script>
    <script language="javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script language="javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
    <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script language="javascript" src="https://s3.tradingview.com/tv.js"></script>
@endsection
