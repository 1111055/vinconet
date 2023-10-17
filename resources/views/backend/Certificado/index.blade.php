@extends('backend.app')

@section('content')


 @include('backend.alert')
 

              <div class="content-wrapper">
                <section class="content-header">
                  <h1>
                    Certificates
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{route('certificado')}}"><i class="fa fa-file"></i> Certificates</a></li>
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
                                          {!! Form::open(['url' => 'certificado' ]) !!}
                                          <div class="col-xs-2 form-group">
                                            <label for="exampleInputEmail1">Delivery</label>
                                            <input type="text" class="form-control" id="delivery" name ="delivery" aria-describedby="emailHelp" value="{{ $delivery }}"> </input>
                                          </div>
                                          <div class="col-xs-2 form-group">
                                            <label for="exampleInputPassword1">Costumer Order</label>
                                            <input type="text" class="form-control" id="corder" name="corder" value="{{ $corder }}"> </input>
                                          </div>
                                          <div class="col-xs-2 form-group">
                                            <label for="exampleInputPassword1">Description</label>
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
                                <table class="table table-hover tablecertificate">
                                  <thead>
                                        <tr>
                                          <th>Download</th>
                                          <th>Delivery</th>
                                          <th>Vinco Order</th>
                                          <th>Costumer Order</th>
                                          <th>Fig. No</th>
                                          <th>Description</th>
                                          <th style="text-align:right;">Delivered Qty</th>
                                          <th>Batch</th>
                                          <th>Year</th> 
                                          <th>Date</th> 
                                        </tr>
                                  </thead>
                                   <tbody>
                                    @foreach($certificados as $item)
                                   
                                        <tr>

                                          <td>
                                            @if($item->download != "") 
                                              <a href="{{ $item->download }}" target="_black">Download</a> 
                                            @endif
                                               
                                          </td>
                                          <td>{{ $item->deliverynote }}</td>
                                          <td>{{ $item->num_enc }}</td>
                                          <td>{{ $item->enc_cliente }}</td>
                                          <td>{{ $item->fig_number }}</td>
                                          <td>{{ $item->des_art }}</td>
                                          <td class="text-right">{{ $item->quantidade }}</td>
                                          <td>{{ $item->lote }}</td>
                                          <td>{{ \Carbon\Carbon::parse( $item->data)->format('Y')}}</td>
                                          <td>{{ \Carbon\Carbon::parse( $item->data)->format('Y-m-d')}}</td>

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
          order: [[9, 'desc']]

      });
  } );


</script>

@stop