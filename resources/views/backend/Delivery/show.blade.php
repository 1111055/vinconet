@extends('backend.app')

@section('content')


 @include('backend.alert')
 

              <div class="content-wrapper">
                <section class="content-header">
                  <h1>
                    Delivery Details
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{route('deliverynote')}}"><i class="fa fa-truck"></i> Delivery Notes</a></li>
                    <li><a href="{{ route('deliveryshow', ['id' => $id]) }}"><i class="fa fa-truck"></i> Delivery Details</a></li>
                  </ol>
                </section>

                <section class="content container-fluid">             


                      <div class="box">

                       <div class="col-xs-12">
                          <div class="panel panel-default">
                            <div class="panel-body">
                             <div class="col-xs-6">
                              <ul class="list-group">
                                <li class="list-group-item"><strong>Delivery  Number:</strong>  {{ $notes[0]->deliverynote }} </li>
                                <li class="list-group-item"><strong>Vinco Order:</strong>  {{ $notes[0]->num_enc }}</li>
                                <li class="list-group-item"><strong>Costumer Order:</strong>  {{ $notes[0]->enc_cliente }}</li>
                                <li class="list-group-item"><strong>Date:</strong>  {{ \Carbon\Carbon::parse($notes[0]->date)->format('Y-m-d')}}</li>
                                <li class="list-group-item"><strong>Download:</strong>  </li>
                              </ul>
                             <div>
                            </div>
                          </div>
                        </div>
                             <div>
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
                                          <th style="text-align: right;">Line</th> 
                                          <th>Item</th> 
                                          <th>Descrition</th> 
                                          <th style="text-align: right;">Qty</th>
                                        </tr>
                                  </thead>
                                   <tbody>
                                    @foreach($notes as $item)
                                   
                                        <tr>
                                          <td class="text-right">{{ $item->linha_guia }}</td>
                                          <td>{{ $item->cod_art }}</td>
                                          <td>{{ $item->des_art }}</td>
                                          <td class="text-right">{{ $item->quantidade }}</td>
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