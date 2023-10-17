@extends('backend.app')

@section('content')


 @include('backend.alert')
 

              <div class="content-wrapper">
                <section class="content-header">
                  <h1>
                    Stock Availability
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{route('item')}}"><i class="fa fa-file"></i> Stock Availability</a></li>
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
                                    </div>
                                    <div class="col-xs-12">
                                      <div class="box">
                                          {!! Form::open(['url' => 'item' ]) !!}
                                            <div class="col-xs-2 form-group">
                                              <label>Item</label>
                                              <input type="text" class="form-control" id="artigo" name ="artigo" value="{{ $artigo }}"> </input>
                                            </div>
                                            <div class="col-xs-2 form-group">
                                              <label>Code</label>
                                              <input type="text" class="form-control" id="ccatalogo" name="ccatalogo" value="{{ $ccatalogo }}"> </input>
                                            </div>
                                            <div class="col-xs-2 form-group">
                                              <label>Description</label>
                                              <input type="text" class="form-control" id="description" name="description" value="{{ $description }} "> </input>
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
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="box">
                              <div class="box-body table-responsive no-padding">
                                <table class="table table-hover myTable">
                                  <thead>
                                        <tr>
                                          <th>Item</th>
                                          <th>Code</th>
                                          <th>Description</th>
                                          <th style="text-align:right;">Stock Availability</th>
                                        </tr>
                                  </thead>
                                   <tbody>
                                    @foreach($produtos as $item)
                                   
                                        <tr>

                                          <td>{{ $item->cod_art }}</td>
                                          <td>{{ $item->cod_catalog }}</td>
                                          <td>{{ $item->des_art }}</td>
                                          <td style="text-align:right;">{{ number_format($item->exist_actual, 2) }}</td>
    
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
      $('.tablecertificate').DataTable({

          "pageLength": 100,
          "lengthChange": false,
          order: [[1, 'asc']]

      });
  } );


</script>

@stop