@extends('backend.app')

@section('content')


 @include('backend.alert')
 

              <div class="content-wrapper">
                <section class="content-header">
                  <h1>
                    Delivery Notes
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{route('deliverynote')}}"><i class="fa fa-truck"></i> Delivery Notes</a></li>
                  </ol>
                </section>

                <section class="content container-fluid">             
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="box">
                              <div class="box-header">
                               <div class="panel panel-default">
                                  <div class="panel-body">
                                    <div class="col-xs-12">
                                      <div class="box box-info">
                                            Filter
                                        </div>
                                        <div class="col-xs-12">
                                          <div class="box">
                                              {!! Form::open(['url' => 'delivery' ]) !!}
                                              <div class="col-xs-2 form-group">
                                                <label for="exampleInputEmail1">Delivery Note</label>
                                                <input type="text" class="form-control" id="delivery" name ="delivery"  value="{{ $delivery }}"> </input>
                                              </div>
                                              <div class="col-xs-2 form-group" style="margin-top: 1.5%;">
                                                    {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!} 
                                              </div>
                                             {!! Form::close() !!}
                                                                                       
                                          </div>
                                        </div>
                                      </div>
                                   </div>
                                 </div>
                              </div>
                             </div>
                           </div>
                        </div>


                        <div class="row">
                          <div class="col-xs-12">
                            <div class="box">
                              <div class="box-body table-responsive no-padding">
                                <table class="table table-hover tabledelivery">
                                  <thead>
                                        <tr>
                                          <th>Download</th>
                                          <th style="text-align:right">Date</th> 
                                          <th>Delivery Note</th> 
                                        </tr>
                                  </thead>
                                   <tbody>
                                    @foreach($notes as $item)
                                   
                                        <tr>
                                          <td> <a href="{{ $item->download }}" target="_black">Download</a> </td>
                                          <td  class="text-right">{{ \Carbon\Carbon::parse( $item->date)->format('Y-m-d')}}</td>
                                          <td> <a href="{{ route('deliveryshow', ['id' => $item->deliverynote]) }}" target="_black">{{ $item->deliverynote }}</a></td>
                                        </tr>
                                  
                                    @endforeach
                                    </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>

                </section>
              </div>

@stop


@section('scripts')

<script type="text/javascript">

    
  $(document).ready( function () {
      $('.tabledelivery').DataTable({

          "pageLength": 100,
          "lengthChange": false,
          order: [[1, 'desc']]

      });
  } );


</script>

@stop