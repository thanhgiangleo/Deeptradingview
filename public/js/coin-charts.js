//trade: Coin: Volumn Buy Sell  (USD)
var chartTitle = 'Volumn Buy & Sell';
var ytitle = "";

var url = "https://deeptradingview.com/api/trade/coin/";
var url_comparedChart = "https://deeptradingview.com/api/ticker/";
var url_PieChart = "https://deeptradingview.com/api/trade/coin/btc/60/24";
//document.write(result);
var coinname = "";

// Arrray list of url
var list_sell_amount =[];
var list_buy_amount =[];
var list_start_time =[];
var list_end_time =[];
var list_sell_prive_avg =[];
var list_buy_prive_avg =[];

var list_sell_ticker =[];
var list_buy_ticker =[];
var list_start_time_ticker =[];
var list_end_time_ticker =[];
var average_price;
var average_price_last_24h;
var delta = 0;
var list_delta = [];
var length;

function constructList() {
  list_sell_amount = [];
  list_buy_amount = [];
  list_start_time = [];
  list_end_time = [];
  list_sell_prive_avg = [];
  list_buy_prive_avg = [];
}

function constructListCompared() {
  list_sell_ticker = [];
  list_buy_ticker = [];
  list_start_time_ticker =[];
  list_end_time_ticker =[];
}

function getDelta(a, b) {
  return ((a+b)/2);
}

function detach_attribute(json) {
    var obj = JSON.parse(json);

    for (var i = obj.data.length - 1; i >= 0; i--) {
        //constructList();
        list_sell_amount.push(obj.data[i].sell_amount);
        list_buy_amount.push(obj.data[i].buy_amount);
        list_start_time.push(obj.data[i].start_time);
        list_sell_prive_avg.push(obj.data[i].sell_price_avg);
        list_buy_prive_avg.push(obj.data[i].buy_price_avg);
    }

    return 0;
}

function detach_compared(json) {
    var obj = JSON.parse(json);

    length = obj.data.length;

    average_price = getDelta(obj.data[0].sell_price, obj.data[0].buy_price);
    average_price_last_24h = getDelta(obj.data[length-1].sell_price, obj.data[length-1].buy_price);
    delta = average_price - average_price_last_24h;
    //list_delta.push(delta);

    console.log(delta);

    return 0;
}

function httpGet(theUrl) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", theUrl, false); // false for synchronous request
    xmlHttp.send(null);
    return xmlHttp.responseText;
}

function GetTimeView()
{
    var element = document.getElementById("timeview");
    timeview = element.options[element.selectedIndex].value;
    return timeview;
}

function GetTradeWith()
{
    var element = document.getElementById("tradewith");
    tradewith = element.options[element.selectedIndex].value;
    return tradewith;
}

function ChangeTradePair_Load()
{
    var url = document.URL;
    var index = url.indexOf("#");
    var coinname = url.substr(index + 1, url.length - index);
    if (coinname.length == 0) {
        return;
    }

    //Load Price Chart
    DrawPriceChart(coinname);
}

function SelectTimeView_Load() {
    var url = document.URL;
    var index = url.indexOf("#");
    var coinname = url.substr(index + 1, url.length - index);
    if (coinname.length == 0) {
        return;
    }

    //Load Price Chart
    DrawPriceChart(coinname);

    //Load Vol Buy Sell
    DrawVolChart(coinname);
}

function ChangeCoin_Load(_coinname) {
    coinname = _coinname;
    constructList();

    // Load Price Chart
    DrawPriceChart(coinname);

    // Load Vol Buy Sell
    DrawVolChart(coinname);

    drawPriceComparedChart(coinname);
}

// LOAD functions
function LoadVolChart(coinname, timeview) {
    var result = httpGet(url + coinname + '/' + timeview + '/24');
    detach_attribute(result);

    Highcharts.chart('trading-container', {
        chart: {
            type: 'column'
        },
        title: {
            text: chartTitle + ' ' + coinname.toUpperCase()
        },
        xAxis: {
            categories: list_start_time
        },
        yAxis: {
            min: 0,
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 0,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: false,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor)
                }
            }
        },
        series: [{
            name: 'Buy',
            data: list_buy_amount,
            color: '#46712D'
        }, {
            name: 'Sell',
            data: list_sell_amount,
            color: '#870011'
        }]
    });
}

function LoadPriceChart(coinname, timeview) {
    tradewith = GetTradeWith();
    if (length.tradewith == 0)
        tradewith = "USD";

    new TradingView.widget({
        "container_id" : "tradingview-widget-container",
        "autosize": true,
        "symbol": "BITFINEX:" + coinname.toUpperCase() + tradewith.toUpperCase(),
        "interval": timeview,
        "timezone": "Etc/UTC",
        "theme": "Light",
        "style": "1",
        "locale": "en",
        "toolbar_bg": "#f1f3f6",
        "enable_publishing": false,
        "allow_symbol_change": true,
        "hide_top_toolbar": true,
        "hideideas": true,
        "studies": [
            "BB@tv-basicstudies",
            "MACD@tv-basicstudies",
            "RSI@tv-basicstudies"
        ]
    });
}

function LoadPriceComparedChart(coinname) {
  var res = httpGet(url_comparedChart + coinname + '/1/1441');
  detach_compared(res);

  Highcharts.setOptions({
    global: {
        useUTC: false
    }
});

Highcharts.chart('priceComparedChart-container', {
    chart: {
        type: 'area',
        animation: Highcharts.svg, // don't animate in old IE

        events: {
            load: function () {

                // set up the updating of the chart each second
                //this.series[0].color = "#838393";
                var series = this.series[0];
                //series.color = "#343434";
                setInterval(function () {
                    var x = (new Date()).getTime(), // current time
                        y = delta;
                    series.addPoint([x, y], true, true);
                    //series.color= '#fff';
                    //series.addPoint({marker:{fillColor:'#000'}, x, y, color:'#000'}, true, true);
                }, 1000);
            }
        }
    },
    title: {
        text: 'Live random data'
    },
    xAxis: {
        type: 'datetime',
        tickPixelInterval: 150
    },
    yAxis: {
        title: {
            text: 'ggjhg'
        },
        // plotLines: [{
        //     value: delta,
        //     width: 1,
        //     color: '#808080'
        // }]
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                Highcharts.numberFormat(this.y, 2);
        }
    },
    legend: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    series: [{
    		color: '#000',
        name: 'Random data',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;
//0 - 1441
//1 -1442
//delta(19-1460)

            for (i = 19; i >= 0; i -= 1) {
                data.push({
                    x: time + i * 1000,
                    y: list_delta[i]
                });
            }
            return data;
        }())
    }]
});
}

// DRAW functions
function DrawPriceChart(_coinname) {
    coinname = _coinname;
    LoadPriceChart(coinname, GetTimeView());
    console.log(coinname);
}

function DrawVolChart(_coinname) {
    coinname = _coinname;
    LoadVolChart(coinname, GetTimeView());
    setInterval(function() {
      constructList();
      LoadVolChart(coinname, GetTimeView())
    }, 60000);
    console.log(coinname);
}

function drawPriceComparedChart(_coinname) {
  coinname = _coinname;
  LoadPriceComparedChart(coinname);
  setInterval(function() {
      constructListCompared();
      LoadPriceComparedChart(coinname)
  }, 60000);
}

function DrawPieComparedChart() {
    var gaugeOptions = {
        chart: {
            type: 'solidgauge'
        },

        title: null,

        pane: {
            center: ['50%', '85%'],
            size: '140%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: '#46712d',
                innerRadius: '70%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },

        tooltip: {
            enabled: false
        },

        // the value axis
        yAxis: {
            lineWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -70
            },
            labels: {
                y: 16
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };
    //

    var obj = JSON.parse(httpGet(url_PieChart));

    var per_eth = obj.data[0].eth_percentage;
    var per_btc = obj.data[0].btc_percentage;
    var per_usd = obj.data[0].usd_percentage;

    // The speed gauge
    chart = Highcharts.chart('pieComparedChart-container',
        Highcharts.merge(gaugeOptions, {
            yAxis: {
                min: 0,
                max: 100,
                visible: false
            },

            credits: {
                enabled: false
            },

            series: [{
                innerRadius:'100%', // ETH %
                radius: '70%',
                name: 'Speed',
                data: [100],
                colors: ['#870011']
            }, {
                innerRadius:'100%', // BTC %
                radius: '70%',
                name: 'Speed',
                data: [100 - per_eth],
                colors: ['#46712d']
            }, {
                innerRadius:'100%', //USD %
                radius: '70%',
                name: 'Speed',
                data: [per_usd],
                colors: ['#7791c4']
            }]
        }));

    $('#usd-per').html('USD: ' + per_usd + '%');
    $('#btc-per').html('BTC: ' + per_btc + '%');
    $('#eth-per').html('ETH: ' + per_eth + '%');
    // Bring life to the dials
    setInterval(function () {
        var p_btc = chart.series[1].points[0];
        var p_usb = chart.series[2].points[0];

        var obj = JSON.parse(httpGet(url_PieChart));

        var per_eth = obj.data[0].eth_percentage;
        var per_btc = obj.data[0].btc_percentage;
        var per_usd = obj.data[0].usd_percentage;

        $('#usd-per').html('USD: ' + per_usd + '%');
        $('#btc-per').html('BTC: ' + per_btc + '%');
        $('#eth-per').html('ETH: ' + per_eth + '%');

        p_btc.update(100 - per_eth);
        p_usb.update(per_usd);

    }, 2000);
}

// onload function
function On_Load()
{
    var url = document.URL;
    var index = url.indexOf("#");
    coinname = url.substr(index + 1, url.length - index);
    if (coinname.length == 0) {
        return;
    }

    //Load Price Chart
    DrawPriceChart(coinname);

    //Load Vol Buy Sell
    DrawVolChart(coinname);

    drawPriceComparedChart(coinname);

    DrawPieComparedChart();
}


$(document).ready(function () {
    On_Load();
});