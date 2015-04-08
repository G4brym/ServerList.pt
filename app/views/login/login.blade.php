@extends('layout.login')
@section('body')
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a style="cursor:pointer;" onClick="$('#loginbox').hide(); $('#forgotbox').show()">Esqueceste-te da tua senha?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
		<!-- Infos -->
        <noscript>
		<div class="alert alert-dismissible alert-warning">
		  <p>Para Poder Navegar Livremente Pelo Site, Têm De Ativar O JavaScript</p>
		</div>
		</noscript>
        @if(Session::has('success'))
		<div class="alert alert-dismissible alert-success">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <p>{{ Session::get('success') }}</p>
		</div>
        @endif
        @if($errors->any())
		<div class="alert alert-dismissible alert-danger">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <p>{{implode('', $errors->all(':message '))}}</p>
		</div>
        @endif
        <!-- /Infos -->
						
						{{ Form::open(array('url' => 'login', 'class'=>'form-horizontal')) }}
                                    
                            <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										{{Form::email('email', '', array('placeholder' => 'Email', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus'))}}
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
             							{{Form::password('password', array('placeholder' => 'Password', 'class'=>'form-control', 'required' => 'required', 'minlength' => '6'))}}
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
			 						  {{ Form::submit('Login', array('class'=>'btn btn-success')) }}
                                      <a onClick="$('#loginbox').hide(); $('#signupbox').show()" class="btn btn-warning">Registar</a>
                                      <a href="{{ URL::to('/') }}" class="btn btn-primary pull-right">Voltar Ao Início</a>

                                    </div>
                                </div>   
                            {{ Form::close() }}     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Registar</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a style="cursor:pointer;" onclick="$('#signupbox').hide(); $('#loginbox').show()">Login</a></div>
                        </div>  
                        <div class="panel-body" >
                            {{ Form::open(array('url' => 'register', 'class'=>'form-horizontal')) }}

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										{{Form::email('regEmail', '', array('placeholder' => 'Email', 'class'=>'form-control', 'required' => 'required'))}}
                                    </div>
                                  
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
										{{Form::text('regName', '', array('placeholder' => 'Nome', 'class'=>'form-control', 'required' => 'required', 'maxlength' => '40'))}}
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
             							{{Form::password('regPassword', array('placeholder' => 'Password', 'class'=>'form-control', 'required' => 'required', 'minlength' => '6'))}}
                                    </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-9">
			 						   {{ Form::submit('Registar', array('class'=>'btn btn-warning')) }}
                                    </div>
                                </div>
                                
                            {{ Form::close() }}
                         </div>
                    </div>

         </div> 
        <div id="forgotbox" style="display:none; margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Esqueci-me da Password</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a style="cursor:pointer;" onclick="$('#forgotbox').hide(); $('#loginbox').show()">Login</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        {{ Form::open(array('url' => 'forgot', 'class'=>'form-horizontal')) }}
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										{{Form::email('email', '', array('placeholder' => 'Email', 'class'=>'form-control', 'required' => 'required'))}}                                      
                                    </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
			 						  {{ Form::submit('Pedir Nova Password', array('class'=>'btn btn-primary')) }}
                                    </div>
                                </div>   
                            {{ Form::close() }}     



                        </div>                     
                    </div>  
        </div>
    </div>
    
@stop