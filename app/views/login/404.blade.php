@extends('layout.login')
@section('body')
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">404 - Pagina Não Encontrada</h3>
                    </div>
                    <div class="panel-body">
						<center>
							<img class="img-responsive" src="{{ URL::to('/resources/images/website/404.png') }}" alt="404">
							<a href="{{ URL::to('/') }}" class="btn btn-info"><i class="fa fa-arrow-circle-o-left"></i> Voltar Ao Início</a>
						</center>
                    </div>
                </div>
            </div>
@stop