@extends('layouts.padrao')



@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Cliente</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('clientes') }}">Listar Clientes</a></li>
                <li class="active">Adicionar Cliente</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Novo Cliente</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                {!!Form::open(['url' => 'clientes/', 'method' => 'post'])!!}
                                <input id="ativo" type="hidden" class="form-control" name="ativo" value="1">

                                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="nome" class="col-md-2 control-label">*Nome</label>
                                    <div class="col-md-8">
                                        <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Ex:João da Silva" required autofocus>
                                        @if ($errors->has('nome'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nome')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                    <label for="cpf" class="col-md-2 control-label">CPF</label>

                                    <div class="col-md-8">
                                        <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}"  placeholder="Ex:000.000.00-00" autofocus>

                                        @if ($errors->has('cpf'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                                    <label for="cnpj" class="col-md-2 control-label">CNPJ</label>

                                    <div class="col-md-8">
                                        <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}"  placeholder="Ex:00.00.000/0000-00" autofocus>

                                        @if ($errors->has('cnpj'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('ie') ? ' has-error' : '' }}">
                                    <label for="ie" class="col-md-2 control-label">IE</label>

                                    <div class="col-md-8">
                                        <input id="ie" type="text" class="form-control" name="ie" value="{{ old('ie') }}" autofocus>

                                        @if ($errors->has('ie'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('ie') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                                    <label for="cep" class="col-md-2 control-label">*CEP</label>

                                    <div class="col-md-8">
                                        <input id="cep" type="text" class="form-control" name="cep" value="{{ old('cep') }}" placeholder="Ex:00.000-000" autofocus>

                                        @if ($errors->has('cep'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                                    <label for="endereco" class="col-md-2 control-label">*Endereço</label>

                                    <div class="col-md-8">
                                        <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" placeholder="Ex:Rua Aloisio de Azevedo" required autofocus>

                                        @if ($errors->has('endereco'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                                    <label for="bairro" class="col-md-2 control-label">*Bairro</label>

                                    <div class="col-md-8">
                                        <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" placeholder="Ex:Olarias" required autofocus>

                                        @if ($errors->has('bairro'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('cidade_idCidade') ? ' has-error' : '' }}">
                                    <label for="cidade_idCidade" class="col-md-2 control-label">*Cidade</label>

                                    <div class="col-md-8">
                                        <input id="cidade_idCidade" type="cidade_idCidade" class="form-control" name="cidade_idCidade" value="{{ old('cidade_idCidade') }}" placeholder="Ex:Ponta Grossa" required autofocus>

                                        @if ($errors->has('cidade_idCidade'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('cidade_idCidade') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('estado_idEstado') ? ' has-error' : '' }}">
                                    <label for="estado_idEstado" class="col-md-2 control-label">*Estado</label>

                                    <div class="col-md-8">
                                        <input id="estado_idEstado" type="estado_idEstado" class="form-control" name="estado_idEstado" value="{{ old('estado_idEstado') }}" placeholder="Ex:PR" required autofocus>

                                        @if ($errors->has('estado_idEstado'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('estado_idEstado') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('fone') ? ' has-error' : '' }}">
                                    <label for="fone" class="col-md-2 control-label">Telefone</label>

                                    <div class="col-md-8">
                                        <input id="fone" type="text" class="form-control" name="fone" value="{{ old('fone') }}" placeholder="Ex:(00)0000-0000" required autofocus>

                                        @if ($errors->has('fone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('fone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                                    <label for="celular" class="col-md-2 control-label">*Celular</label>

                                    <div class="col-md-8">
                                        <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" placeholder="Ex:(00)00000-0000" required autofocus>

                                        {{--@if ($errors->has('celular'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('celular') }}</strong>--}}
                                        {{--</span>--}}
                                        {{--@endif--}}
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-2 control-label">*E-Mail</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ex:abcde@gmail.com" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary">
                                            Cadastrar!
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection