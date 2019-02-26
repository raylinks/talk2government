@extends('master')
@section('title', 'Analytics')
@section('content')
 <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-6">
                <form method="POST">
                    {{ csrf_field() }}
                       <label>From:</label>  <input type="date" name="from"> 
                       <label>TO:</label> <input type="date" name="to">
                       <button type="submit" class="btn btn-info btn-fill ">Search</button>
                </form>
                <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"> Fans Local Government Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <!-- AREA CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">LG Population Rise  Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="areaChart" style="height:250px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


            </div><!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Fans Love Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Fans Vote For ME Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col (RIGHT) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
@endsection
@section('more_js')
<script>
         $(function () {
        var url = "{{url('/analytics/pie')}}";
        var value_Alimosho = new Array();var value_Ajeromi = new Array();
        var value_Kosofe = new Array();var value_Mushin = new Array();
        var value_Oshodi = new Array();var value_Ojo = new Array();
        var value_Ikorodu = new Array();var value_Surulere = new Array();
        var value_Agege = new Array();var value_Ifako = new Array();
        var value_Shomolu = new Array();var value_Amuwo = new Array();
        var value_Mainland = new Array();var value_Ikeja = new Array();
        var value_Eti = new Array();var value_Badagry = new Array();
        var value_Apapa = new Array();var value_Island = new Array();
        var value_Ibeju = new Array();var value_Epe= new Array();
        
        var  Alimosho = 1; var Ajeromi = 1 ;
        var Kosofe = 1 ; var  Mushin = 1;
        var Oshodi = 1; var Ojo = 1;
        var  Ikorodu = 1; var Surulere = 1;
        var  Agege = 1; var  Ifako = 1;
        var  Shomolu = 1; var  Amuwo = 1;
        var  Mainland = 1; var  Ikeja = 1;
        var  Eti = 1; var  Badagry = 1;
        var  Island = 1; var Epe = 1;
        var  Ibeju = 1; var  Apapa = 1;
        
        
           $.get(url, function(response){
            response.forEach(function(data){                
             if(data.constituency == 'Alimosho'){
                value_Alimosho.push(data.constituency);
                Alimosho = value_Alimosho.length;
            }else if(data.constituency == 'Ajeromi-Ifelodun'){
                value_Ajeromi.push(data.constituency);
                Ajeromi = value_Ajeromi.length;
            }
            else if(data.constituency == 'Kosofe'){
                value_Kosofe.push(data.constituency);
                Kosofe = value_Kosofe.length;
            }
            else if(data.constituency == 'Mushin'){
                value_Mushin.push(data.constituency);
                Mushin = value_Mushin.length;
            }
            else if(data.constituency == 'Oshodi-Isolo'){
                value_Oshodi.push(data.constituency);
                Oshodi = value_Oshodi.length;
            }
            else if(data.constituency == 'Ojo'){
                value_Ojo.push(data.constituency);
                Ojo = value_Ojo.length;
            }
            else if(data.constituency == 'Ikorodu'){
                value_Ikorodu.push(data.constituency);
                Ikorodu = value_Ikorodu.length;
            }
            else if(data.constituency == 'Surulere'){
                value_Surulere.push(data.constituency);
                Surulere = value_Surulere.length;
            }
            else if(data.constituency == 'Agege'){
                value_Agege.push(data.constituency);
                Agege = value_Agege.length;
            }
            else if(data.constituency == 'Ifako-Ijaye'){
                value_Ifako.push(data.constituency);
                Ifako = value_Ifako.length;
            }
            else if(data.constituency == 'Shomolu'){
                value_Shomolu.push(data.constituency);
                Shomolu = value_Shomolu.length;
            }
            else if(data.constituency == 'Amuwo-Odofin'){
                value_Amuwo.push(data.constituency);
                Amuwo = value_Amuwo.length;
            }
            else if(data.constituency == 'Lagos-Mainland'){
                value_Mainland.push(data.constituency);
                Mainland = value_Mainland.length;
            }
            else if(data.constituency == 'Ikeja'){
                value_Ikeja.push(data.constituency);
                Ikeja = value_Ikeja.length;
            }
            else if(data.constituency == 'Eti-Osa'){
                value_Eti.push(data.constituency);
                Eti = value_Eti.length;
            }
            else if(data.constituency == 'Badagry'){
                value_Badagry.push(data.constituency);
                Badagry = value_Badagry.length;
            }
            else if(data.constituency == 'Lagos-Island'){
                value_Island.push(data.constituency);
                Island = value_Island.length;
            }
            else if(data.constituency == 'Apapa'){
                value_Apapa.push(data.constituency);
                Apapa = value_Apapa.length;
            }
            else if(data.constituency == 'Epe'){
                value_Epe.push(data.constituency);
                Epe = value_Epe.length;
            }
            else if(data.constituency == 'Ibeju-Lekki'){
                value_Ibeju.push(data.constituency);
                Ibeju = value_Ibeju.length;
            }
            
            })
            });
            alert('Graph Plotted Successfully!!');
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas);
            var PieData = [
                {
                    value:Alimosho ,
                    color: "#f56954",
                    highlight: "#f56954",
                    label: "Alimosho"
                },
                {
                    value:Ajeromi,
                    color: " #b3ffb3",
                    highlight: "#b3ffb3",
                    label: "Ajeromi-Ifelodun"
                }
                ,
                {
                    value:Kosofe,
                    color: "#ffb3b3",
                    highlight: "#ffb3b3",
                    label: "Kosofe"
                }
                ,
                {
                    value:Mushin,
                    color: "#D4DBFF",
                    highlight: "#D4DBFF",
                    label: "Mushin"
                }
                ,
                {
                    value:Oshodi,
                    color: "#F5FF69",
                    highlight: "#F5FF69",
                    label: "Oshodi-Isolo"
                }
                ,
                {
                    value:Ojo,
                    color: "#FFFFE6",
                    highlight: "#FFFFE6",
                    label: "Ojo"
                }
                ,
                {
                    value:Surulere,
                    color: "#FFF5B1",
                    highlight: "#FFF5B1",
                    label: "Surulere"
                }
                ,
                {
                    value:Ikorodu,
                    color: "#FF7332",
                    highlight: "#FF7332",
                    label: "Ikorodu"
                }
                ,
                {
                    value:Agege,
                    color: "#C9FF02",
                    highlight: "#C9FF02",
                    label: "Agege"
                }
                ,
                {
                    value:Ifako,
                    color: "#8D10FF",
                    highlight: "#8D10FF",
                    label: "Ifako-Ijaye"
                }
                ,
                {
                    value:Shomolu,
                    color: "#FF71BC",
                    highlight: "#FF71BC",
                    label: "Shomolu"
                }
                ,
                {
                    value:Amuwo,
                    color: "#997DFF",
                    highlight: "#997DFF",
                    label: "Amuwo-Odofin"
                }
                ,
                {
                    value:Mainland,
                    color: "#FF148B",
                    highlight: "#FF148B",
                    label: "Lagos-Mainland"
                }
                ,
                {
                    value:Ikeja,
                    color: "#67FFB9",
                    highlight: "#67FFB9",
                    label: "Ikeja"
                }
                ,
                {
                    value:Eti,
                    color: "#E1FFC9",
                    highlight: "#E1FFC9",
                    label: "Eti-Osa"
                }
                ,
                {
                    value:Badagry,
                    color: "#C9FFE0",
                    highlight: "#C9FFE0",
                    label: "Badagry"
                }
                ,
                {
                    value:Island,
                    color: "#47FF32",
                    highlight: "#47FF32",
                    label: "Lagos-Island"
                }
                ,
                {
                    value:Apapa,
                    color: "#2B4AFF",
                    highlight: "#2B4AFF",
                    label: "Apapa"
                }
                ,
                {
                    value:Epe,
                    color: "#8BFF6A",
                    highlight: "#8BFF6A)",
                    label: "Epe"
                }
                ,
                {
                    value:Ibeju,
                    color: "#FF5024",
                    highlight: "#FF5024",
                    label: "Ibeju-Lekki"
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
                percentageInnerCutout: 30, // This is 0 for Pie charts
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
            var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
            // This will get the first returned node in the jQuery collection.
            var areaChart = new Chart(areaChartCanvas);

            var areaChartData = {
                labels: ["Alimosho", "Ajeromi-Ifelodun", "Kosofe" ,"Mushin","Oshodi-Isolo", "Ojo" ],
                datasets: [
                    {
                        label: "Electronics",
                        fillColor: "rgba(210, 214, 222, 1)",
                        strokeColor: "rgba(210, 214, 222, 1)",
                        pointColor: "rgba(210, 214, 222, 1)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55]
                    },
                    {
                        label: "Digital Goods",
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: [28, 48, 40, 19, 86, 27]
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
            areaChart.Line(areaChartData, areaChartOptions);

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
        var d1_yes,d1_no;
        var d2_yes,d2_no; 
        var d3_no; 
        var d3_yes ;
           $.get(url, function(response){
            response.forEach(function(data){                
             if(data.district === 'Lagos Central'){
                 if(data.value == 'yes'){
                     yes_1.push(data.value);
                     d1_yes = yes_1.length;
                 }else{
                     no_1.push(data.value);
                     d1_no = no_1.length;
                 }
                }else if(data.district === 'Lagos East')
                {if(data.value == 'yes'){
                     yes_2.push(data.value);
                     d2_yes = yes_2.length;
                 }else{
                     no_2.push(data.value);
                     d2_no = no_2.length;
                 }
                }else if (data.district === 'Lagos West')
                {if(data.value == 'yes'){
                     yes_3.push(data.value);
                     d3_yes = yes_3.length;
                 }else{
                     no_3.push(data.value);
                     d3_no = no_3.length;
                 }
                }
            })
            });
            alert('Note: Over on the Donought Chart to see LG value')
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
//            alert('d3_no')
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