@extends('shared.master')
@section('title', 'Home')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">VOTE ME Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div>
                <div class="footer">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i> Yes - {{--!! $yes_per !!--}}%


                        <i class="fa fa-circle text-danger"></i> No - {{--!! $no_per!!--}}%

                        <a href="/voteme" class="pull-right">view more details</a>
                    </div>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">LG VOTE-ME Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                    <div class="footer">
                        <div class="legend">
                            <a href="/users/report" class="pull-right">view more details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">LG VOTE-ME Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                    <div class="footer">
                        <div class="legend">
                            <a href="/users/report" class="pull-right">view more details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('more_js')
<script>
    $(function () {
        var url = "{{url('/chart')}}";
        var value_yes = new Array();
        var value_no = new Array();
        var yes;
        var no;
        $.get(url, function (response) {
            response.forEach(function (data) {
                if (data.value == 'yes') {
                    value_yes.push(data.value);
                    yes = value_yes.length;
                } else {
                    value_no.push(data.value);
                    no = value_no.length;
                }
            })
        });
        alert('Welcome To Senatapp');
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            {
                value: no,
                color: "#f56954",
                highlight: "#f56954",
                label: "No"
            },
            {
                value: yes,
                color: "rgba(60,141,188,0.9)",
                highlight: "rgba(60,141,188,0.9)",
                label: "Yes"
            }
        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
    });
</script>
<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
//            var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
//            var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
            labels: ["Alimosho", "Ajeromi-Ifelodun", "Kosofe", "Mushin", "Oshodi-Isolo", "Ojo", "Ikorodu", "Surulere",
                "Agege", "Ifako-Ijaye", "Shomolu", "Amuwo-Odofin", "Lagos Mainland", "Ikeja", "Eti-Osa",
                "Badagry", "Apapa", "Lagos", "Island", "Epe", "Ibeju-Lekki"],
            datasets: [
                {
                    label: "Electronics",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };

        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        //Create the line chart
//            areaChart.Line(areaChartData, areaChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var url = "{{url('/chart')}}";
        var yes_1 = new Array();
        var no_1 = new Array();
        var yes_2 = new Array();
        var no_2 = new Array();
        var yes_3 = new Array();
        var no_3 = new Array();
        var d1_yes, d1_no;
        var d2_yes, d2_no;
        var d3_no;
        var d3_yes;
        $.get(url, function (response) {
            response.forEach(function (data) {
                if (data.district === 'Lagos Central') {
                    if (data.value == 'yes') {
                        yes_1.push(data.value);
                        d1_yes = yes_1.length;
                    } else {
                        no_1.push(data.value);
                        d1_no = no_1.length;
                    }
                } else if (data.district === 'Lagos East')
                {
                    if (data.value == 'yes') {
                        yes_2.push(data.value);
                        d2_yes = yes_2.length;
                    } else {
                        no_2.push(data.value);
                        d2_no = no_2.length;
                    }
                } else if (data.district === 'Lagos West')
                {
                    if (data.value == 'yes') {
                        yes_3.push(data.value);
                        d3_yes = yes_3.length;
                    } else {
                        no_3.push(data.value);
                        d3_no = no_3.length;
                    }
                }
            })
        });
        alert('Graphs Plotted Successfully')
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        var lineChartData = {
            labels: ["Lagos Central", "Lagos East", "Lagos West"],
            datasets: [
                {
                    label: "YES",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.9)",
                    pointColor: "rgba(60,141,188,0.9)",
                    pointStrokeColor: "rgba(60,141,188,0.9)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,0.9)",
                    data: [d1_yes, d2_yes, d3_yes]
                },
                {
                    label: "NO",
                    fillColor: "#f56954",
                    strokeColor: "#f56954",
                    pointColor: "#f56954",
                    pointStrokeColor: "#f56954",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#f56954",
                    data: [d1_no, d2_no, d3_no]
                }
            ]
        };
        lineChart.Line(lineChartData, lineChartOptions);

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = {
            labels: ["Lagos Central", "Lagos East", "Lagos West"],
            datasets: [
                {
                    label: "YES",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.9)",
                    pointColor: "rgba(60,141,188,0.9)",
                    pointStrokeColor: "rgba(60,141,188,0.9)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,0.9)",
                    data: [d1_yes, d2_yes, d3_yes]
                },
                {
                    label: "NO",
                    fillColor: "#f56954",
                    strokeColor: "#f56954",
                    pointColor: "#f56954",
                    pointStrokeColor: "#f56954",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#f56954",
                    data: [d1_no, d2_no, d3_no]
                }
            ]
        };

        barChartData.datasets[1].fillColor = "#f56954";
        barChartData.datasets[1].strokeColor = "#f56954";
        barChartData.datasets[1].pointColor = "#f56954";
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
    });
</script>
@endsection

