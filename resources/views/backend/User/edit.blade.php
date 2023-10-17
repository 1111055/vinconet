@extends('backend.app')

@section('content')


 @include('backend.alert')
 
              <div class="content-wrapper">
                <section class="content-header">
                  <h1>
                   Editar Utilizador
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{route('user')}}"><i class="fa fa-users"></i> Utilizador</a></li>
                  </ol>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">             
            <!-- /.row -->
                  <div class="row">
                      <div class="col-xs-12">
                        <div class="box">
                        
                          <div class="col-lg-12 col-sm-12">

                             <div class="well">
                                <div class="tab-content">
                                      <div class="box box-info">
                                             {!! Form::model($user, [
                                                  'method' => 'PUT',
                                                  'route' => ['user.update', $user->id],
                                                  'class' => 'form-horizontal',
                                                  'files' => true,
                                                  'onsubmit' => 'return validateform(this);'
                                             ]) !!}
                                             <div class="box-body">
                                              <div class="form-group">
                                                   {!! Form::label('* Nome:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-8">
                                                   {!! Form::text('name',$user->name,['class' => 'form-control', 'require' => 1]) !!}
                                                </div>
                                                
                                              </div>
                                              <div class="form-group">
                                                   {!! Form::label('* Email:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-8">
                                                   {!! Form::text('emailte',$user->email,['class' => 'form-control','readonly' => 'true']) !!}
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                   {!! Form::label('Num. Cliente:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-8">
                                                   {!! Form::text('num_cliente',$user->num_cliente,['class' => 'form-control']) !!}
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                  {!! Form::label('Activo:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-2">
                                                   {!! Form::checkbox('activo',1,$user->activo) !!}
                                                </div>
                                                @if(Auth::user()->isinrule(['supermaster']))
                                                  {!! Form::label('Acessos:',null, ['class' => 'col-sm-2 control-label']) !!}
                                                  <div class="col-sm-4">
                                                    {{Form::select('acessos[]', $selrole,$selroles, ['class' => 'form-control input-sm multiplePicker', 'multiple'=>'multiple'])}} 
                                                  </div>
                                                @endif
                                              </div>   
                                              <div class="form-group col-sm-6">
                                                    <label>Imagem (160x160)</label>
                                                     <input type="file" name="banerimg" id="exampleInputImage" class="image"> 
                                              </div>
                                              <div class="col-xs-12">
                                              <p><div id="fileDisplayArea"></div></p>
                                                  <div class="col-xs-2">
                                                        <img src="{{$user->path}}" style="max-width: 200%;" />
                                                  </div>
                                              </div>
                                              </div>
                                                
                                            </div>
                                            <div class="box-footer">
                                                {!! Form::submit('Guardar',['class' => 'btn btn-info pull-right']) !!}
                                            </div>
                                          {!! Form::close() !!}
                                      </div>
                                </div>
                              </div>
                             </div>
                          </div>
                      </div>
                    </div>
                </section>
              </div>

@stop