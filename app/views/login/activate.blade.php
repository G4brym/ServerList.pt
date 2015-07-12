@extends('layout.login')
@section('body')
    <div class="container">    
        <div id="activatebox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Ativar Conta</div>
					</div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
		<!-- Infos -->
        <noscript>
		<div class="alert alert-dismissible alert-warning">
		  <p>Para Poder Navegar Livremente Pelo Site, Têm De Ativar O JavaScript</p>
		</div>
		</noscript>
        <!-- /Infos -->
						
						{{ Form::open(array('url' => 'activate', 'class'=>'form-horizontal')) }}
                                    
                            <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										@if(isset($_GET['email']))
											{{Form::email('email', $_GET['email'], array('placeholder' => 'Email', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus'))}}
										@else
											{{Form::email('email', '', array('placeholder' => 'Email', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus'))}}
										@endif
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
										@if(isset($_GET['code']))
											{{Form::text('code', $_GET['code'], array('class'=>'form-control', 'required' => 'required'))}}
										@else
											{{Form::text('code', '', array('placeholder' => 'Codigo de Ativação', 'class'=>'form-control', 'required' => 'required'))}}
										@endif
                                    </div>
									
                            <div style="margin-bottom: 25px;">
										<center>
             							{{Form::captcha()}}
										</center>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
			 						  {{ Form::submit('Ativar Conta', array('class'=>'btn btn-success')) }}
                                      <a href="{{ URL::to('/login') }}" class="btn btn-warning">Registar</a>
                                      <a href="{{ URL::to('/') }}" class="btn btn-primary pull-right">Voltar Ao Início</a>

                                    </div>
                                </div>   
                            {{ Form::close() }}     



                        </div>                     
                    </div>  
        </div>
    </div>
    
@stop