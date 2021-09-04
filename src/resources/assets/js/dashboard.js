const chartOptions = {
    type: 'candlestick',
    height: 350
};
const xAxis = {
    type: 'datetime'
};
const yAxis = {
    tooltip: {
    enabled: true
    }
};

function highlighButton(filter) {
    var element = document.getElementById("1M");
    element.classList.remove("btn-primary");
    element.classList.add("btn-raised-light");
    var element = document.getElementById("6M");
    element.classList.remove("btn-primary");
    element.classList.add("btn-raised-light");
    var element = document.getElementById("MAX");
    element.classList.remove("btn-primary");
    element.classList.add("btn-raised-light");
    var element = document.getElementById(filter);
    element.classList.add("btn-primary");
    element.classList.remove("btn-raised-light");
}

function loadNiftyChart(filter) {

    highlighButton(filter);
    document.getElementById('chart-parent').innerHTML = 'Loading...';
    const url = window.location.pathname+'api/nifty-chart?filter='+filter;
    axios.get(url)
    .then(function (response) {
        document.getElementById('chart-parent').innerHTML = '<div id="chart"></div>';
        if (response.data.status == true) {
            const options = {
                series: [{
                data: response.data.data,
                }],
                chart: chartOptions,
                xaxis: xAxis,
                yaxis: yAxis
            };
            const chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    });
}
 
function loadIndexData() {
    const url = 'https://api.niftytrader.in/api/NIndex/IndexStocksData';
    axios.get(url)
    .then(function (response) {
        console.dir(response.data.resultData);
        if (response.data.resultData.nifty50.close > response.data.resultData.nifty50.prev_price) {
            // positive 
            const element = document.getElementById('nifty50');
            element.innerHTML = '<div class="display-6 text-success fw-normal">'+response.data.resultData.nifty50.close+'</div>';
        } else {
            const element = document.getElementById('nifty50');
            element.innerHTML = '<div class="display-6 text-danger fw-normal">'+response.data.resultData.nifty50.close+'</div>'
        }
        const ele = document.getElementById('nifty50PrevClose');
        ele.innerHTML = response.data.resultData.nifty50.prev_price;
        if (response.data.resultData.niftybank.close > response.data.resultData.niftybank.prev_price) {
            // positive 
            const element = document.getElementById('bankNifty');
            element.innerHTML = '<div class="display-6 text-success fw-normal">'+response.data.resultData.niftybank.close+'</div>';
        } else {
            const element = document.getElementById('bankNifty');
            element.innerHTML = '<div class="display-6 text-danger fw-normal">'+response.data.resultData.niftybank.close+'</div>'
        }
        const element = document.getElementById('bankNiftyPrevClose');
        element.innerHTML = response.data.resultData.niftybank.prev_price;
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    });
}
window.onload = function() {
    loadNiftyChart('1M');
    loadIndexData()
};
