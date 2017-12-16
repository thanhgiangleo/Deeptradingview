@extends('partials.layout')

@section('css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection

@section('js')
  <script language="javascript" src="../js/index.js"></script>
  <script language="javascript" src="../js/coin-charts.js"></script>
  <script language="javascript" src="https://code.highcharts.com/highcharts.js"></script>
  <script language="javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
  <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script language="javascript" src="https://s3.tradingview.com/tv.js"></script>
@endsection

@section('content')
    <body class="w3-light-grey" onload="highlightLink();On_Load();">

      <div class="w3-bar w3-top w3-black" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span class="w3-bar-item w3-right">Welcome, <strong>Mike</strong></span>
        <a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-cog"></i></a>
      </div>

        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:200px;" id="mySidebar">
          <br>
          <div class="w3-container w3-row">
              <img src="../images/128.png" style="height:100px; margin:30 auto">
          </div>

          <div id="menu" class="w3-bar-block">
              <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                  onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>Close Menu</a>
              <a href="/" class="w3-bar-item w3-button w3-padding">
                  <i class="fa fa-home fa-fw"></i>Home</a>
              <a href="" class="w3-bar-item w3-button w3-padding">
                  <i class="fa fa-line-chart fa-fw"></i>Market Analytic</a>
              <a class="w3-bar-item w3-button w3-padding" onclick="myAccordion('listcoin');">
                  <i class="fa fa-area-chart fa-fw"></i>Coin Views <i class="fa fa-caret-down"></i></a>

              <div id="listcoin" class="w3-hide w3-padding">
                  <!-- <a id="btc" class="w3-bar-item w3-button" href="{{ url('/coinview/btc') }}"> -->
                  <a id="btc" class="w3-bar-item w3-button" href="#btc" onclick="selectBtn('btc');ChangeCoin_Load('btc');">
                    <i class="fa fa-bitcoin fa-fw"></i> BTC</a>

                  <a id="eth" class="w3-bar-item w3-button" href="#eth" onclick="selectBtn('eth');ChangeCoin_Load('eth');">
                    <i class="fa fa-bitcoin fa-fw"></i> ETH</a>
                  <a id="ltc" class="w3-bar-item w3-button" href="#ltc" onclick="selectBtn('ltc');ChangeCoin_Load('ltc');">
                    <i class="fa fa-bitcoin fa-fw"></i> LTC</a>
                  <a id="etc" class="w3-bar-item w3-button" href="#etc" onclick="selectBtn('etc');ChangeCoin_Load('etc');">
                    <i class="fa fa-bitcoin fa-fw"></i> ETC</a>
                  <a id="xmr" class="w3-bar-item w3-button" href="#xmr" onclick="selectBtn('xmr');ChangeCoin_Load('xmr');">
                    <i class="fa fa-bitcoin fa-fw"></i> XMR</a>
                  <a id="zec" class="w3-bar-item w3-button" href="#zec" onclick="selectBtn('zec');ChangeCoin_Load('zec');">
                    <i class="fa fa-bitcoin fa-fw"></i> ZEC</a>
                  <a id="xrp" class="w3-bar-item w3-button" href="#xrp" onclick="selectBtn('xrp');ChangeCoin_Load('xrp');">
                    <i class="fa fa-bitcoin fa-fw"></i> XRP</a>
                  <a id="dsh" class="w3-bar-item w3-button" href="#dsh" onclick="selectBtn('dsh');ChangeCoin_Load('dsh');">
                    <i class="fa fa-bitcoin fa-fw"></i> DASH</a>
                  <a id="bch" class="w3-bar-item w3-button" href="#bch" onclick="selectBtn('bch');ChangeCoin_Load('bch');">
                    <i class="fa fa-bitcoin fa-fw"></i> BCH</a>
                  <a id="omg" class="w3-bar-item w3-button" href="#omg" onclick="selectBtn('omg');ChangeCoin_Load('omg');">
                    <i class="fa fa-bitcoin fa-fw"></i> OMG</a>
                  <a id="iot" class="w3-bar-item w3-button" href="#iot" onclick="selectBtn('iot');ChangeCoin_Load('iot');">
                    <i class="fa fa-bitcoin fa-fw"></i> IOTA</a>
                  <a id="san" class="w3-bar-item w3-button" href="#san" onclick="selectBtn('san');ChangeCoin_Load('san');">
                    <i class="fa fa-bitcoin fa-fw"></i> SAN</a>
                  <a id="neo" class="w3-bar-item w3-button" href="#neo" onclick="selectBtn('neo');ChangeCoin_Load('neo');">
                    <i class="fa fa-bitcoin fa-fw"></i> NEO</a>
                  <a id="eos" class="w3-bar-item w3-button" href="#eos" onclick="selectBtn('eos');ChangeCoin_Load('eos');">
                    <i class="fa fa-bitcoin fa-fw"></i> EOS</a>
                  <a id="etp" class="w3-bar-item w3-button" href="#etp" onclick="selectBtn('etp');ChangeCoin_Load('etp');">
                    <i class="fa fa-bitcoin fa-fw"></i> ETP</a>
                  <a id="qtm" class="w3-bar-item w3-button" href="#qtm" onclick="selectBtn('qtm');ChangeCoin_Load('qtm');">
                    <i class="fa fa-bitcoin fa-fw"></i> QTUM</a>
                  <a id="avt" class="w3-bar-item w3-button" href="#avt" onclick="selectBtn('avt');ChangeCoin_Load('avt');">
                    <i class="fa fa-bitcoin fa-fw"></i> AVT</a>
                  <a id="edo" class="w3-bar-item w3-button" href="#edo" onclick="selectBtn('edo');ChangeCoin_Load('edo');">
                    <i class="fa fa-bitcoin fa-fw"></i> EDO</a>
                  <a id="dat" class="w3-bar-item w3-button" href="#dat" onclick="selectBtn('dat');ChangeCoin_Load('dat');">
                    <i class="fa fa-bitcoin fa-fw"></i> DATA</a>
                  <a id="btg" class="w3-bar-item w3-button" href="#btg" onclick="selectBtn('btg');ChangeCoin_Load('btg');">
                    <i class="fa fa-bitcoin fa-fw"></i> BTG</a>

              </div>
          </div>
        </nav>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:200px;margin-top:43px;">
            <div class="w3-container" style="padding-top:22px;">
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
      <!-- End page content -->

      @extends('partials.footer')
    </body>
  </div>
@endsection
