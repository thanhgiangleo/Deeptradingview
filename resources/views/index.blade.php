@extends('partials.layout2')

@section('css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection

@section('content')
    <div class="content light-grey">
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
                            <div class="w3-row" style="text-align: center;">
                              <div class="w3-container">
                                <div class="w3-card-4" style="width:100%; margin-bottom: 10px">
                                  <header class="w3-container w3-teal">
                                    <div id="pair" style="font-size: 20px"></div>
                                  </header>
                                  <div class="w3-container w3-neutral-grey">
                                    <br>
                                    <!-- todo: add currency icon here
                                      <img src="img_avatar3.png" alt="ICON" class="w3-left w3-circle w3-margin-right" style="width:60px">
                                    -->
                                      <div id="daily_change"></div>
                                      <div id="vol"></div>
                                      <div id="last_price"></div>
                                      <div id="rate" style="color: #46712d; font-weight: bold"></div>
                                      <div id="low"></div>
                                      <div id="high"></div>
                                    <br>
                                  </div>
                                  <button class="w3-button w3-block w3-amber">+ Interested</button>
                                  </div>
                                </div>
                            </div>

                            <div class="w3-row">
                                <div id="priceComparedChart-container" class="w3-twothird" style="width:100%; height: 300px; display:block; margin: 0 auto">
                                    <!-- Load priceComparedChart -->
                                </div>
                            </div>
                            <div class="w3-row">
                                <div class="w3-twothird" style="width:100%; height: 500px; display:block; margin: 0 auto">
                                    <!-- Load priceComparedChart -->

                                    <div class="w3-row">
                                        <div id="pieComparedChart-container" class="w3-twothird" style="width:100%; height: 250px; display:block; margin: 0 auto">
                                            <!-- Load pieComparedChart -->
                                        </div>
                                        <div style="font-size: 12px; width: 100%; background-color: #ffffff; margin-bottom: 20px; text-align: right; padding-right: 30px">
                                            <div id="usd-per" style="color: #7791c4">USD: %</div>
                                            <div id="btc-per" style="color: #46712d">BTC: %</div>
                                            <div id="eth-per" style="color: #870011">ETH: %</div>
                                        </div>
                                    </div>

                                    <div class="w3-row">
                                        <div id="volComparedChart-container" class="w3-twothird" style="width:100%; height: 250px; display:block; margin: 0 auto">
                                            <!-- Load Chart -->
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

    <script language="javascript" src="https://code.highcharts.com/highcharts-more.js"></script>
    <script language="javascript" src="https://code.highcharts.com/modules/solid-gauge.src.js"></script>
@endsection
