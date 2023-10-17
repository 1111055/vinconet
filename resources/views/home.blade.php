@extends('backend.app')


@section('content')


@include('backend.alert')

<div class="content-wrapper">
    <section class="content-header">
          <h1>
            Home
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="row mt-5">
                                        <div class="col-xs-12">
                                            <div class="box">
                                                <div class="box-body table-responsive no-padding">
                                                    <div class="col-md-4" style="margin-top: 1%">
                                                         <div class="jumbotron text-center">
                                                              <h2> More Than 10000 items</h2>
                                                              <span style="margin-top: 1%"><i class="fa fa-product-hunt fa-2x"></i></span> 
                                                              <p style="margin-top: 1%"><a class="btn btn-primary btn-lg" href="{{ route('item') }}" role="button">Stock Availability</a></p>
                                                         </div>
                                                   </div>
                                                    <div class="col-md-4" style="margin-top: 1%">
                                                        <div class="jumbotron text-center">
                                                              <h2>  100 3.1 Certificates</h2>
                                                              <span style="margin-top: 1%"><i class="fa fa-file fa-2x"></i></span> 
                                                              <p style="margin-top: 1%"><a class="btn btn-primary btn-lg" href="{{ route('certificado') }}" role="button">3.1 Certificates</a></p>
                                                        </div>
                                                   </div>
                                                   <div class="col-md-4" style="margin-top: 1%">
                                                        <div class="jumbotron text-center">
                                                              <h2>50 Deliverys  </h2>
                                                              <span style="margin-top: 1%"><i class="fa fa-truck fa-2x"></i></span>
                                                              <p style="margin-top: 1%;"><a class="btn btn-primary btn-lg" href="{{route('deliverynote')}}" role="button">Delivery Notes</a></p>
                                                        </div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12" style="min-height: 440px;">
                                            <div class="box" style="margin-top: 1%">
                                                <div class="box-body table-responsive no-padding" style="min-height: 400px;">
                                                    <div class="col-md-6">
                                                        <div id="curve_chart"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="chart_div"></div>
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
            </div>
        </div>
    </section>

</div>
@endsection



@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);
      var chart1 = <?php echo $chart1; ?>;
      
      function drawChart2() {

        if(chart1.length > 1){
             var data = google.visualization.arrayToDataTable(chart1);

        }else{

             var data = google.visualization.arrayToDataTable([
              ['Year', 'Items'],
              ['2023',  0]
            ]);
         }



        var options = {
          title: 'Deliverys by Years',
          curveType: 'function',
          pointSize: 10,
          width: 500,
          height: 300,
          vAxis: {
                    title: 'QTD'
          },
          hAxis: {
                  title: 'Years',
                  format: 'YYYY'
                 
                },
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }

       google.charts.load('current', {packages: ['corechart', 'bar']});
       google.charts.setOnLoadCallback(drawMultSeries);

      function drawMultSeries() {
           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mês');
            data.addColumn('number', 'Items');

            var chartData = <?php echo json_encode($chartData); ?>;

            for (var year in chartData) {


                        data.addRows(
                            [
                                [year , parseInt(chartData[year])  ]
                            ]            
                        );

                      
            }

            var options = {
                title: 'Deliverys by Month Corrent Year',
                width: 500,
                height: 300,
                hAxis: {
                    title: 'Year'
                },
                vAxis: {
                    title: 'QTD'
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
</script>
@stop
