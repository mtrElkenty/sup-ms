/*=========================================================================================
    File Name: doughnut.js
    Description: Chartjs simple doughnut chart
    ----------------------------------------------------------------------------------------
    Item Name: SupMS
    Version: 1.0
    Author: MtrElkenty
    Author URL: https://ocalhost:8000/
==========================================================================================*/

// Doughnut chart
// ------------------------------
$(window).on("load", function () {
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#simple-doughnut-chart");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
    };

    // Chart Data
    var chartData = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
            {
                label: "My First dataset",
                data: [65, 35, 24, 45, 85],
                backgroundColor: [
                    "#666EE8",
                    "#28D094",
                    "#FF4961",
                    "#1E9FF2",
                    "#FF9149",
                ],
            },
        ],
    };

    var config = {
        type: "doughnut",

        // Chart Options
        options: chartOptions,

        data: chartData,
    };

    // Create the chart
    var doughnutSimpleChart = new Chart(ctx, config);
});
