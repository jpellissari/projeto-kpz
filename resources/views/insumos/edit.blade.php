@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Insumo</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('insumos') }}">Lista de Insumos</a></li>
                <li class="active">Adicionar Insumos</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Editar Insumos</div>
                            </div>
                        </div>

                        <div class="panel-body">
                            {!!Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'put'])!!}

                            <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                <label for="quantidade" class="col-md-2 control-label">Nome</label>

                                <div class="col-md-4">
                                    <input id="quantidade" type="number" class="form-control" name="quantidade" value="{{ $insumo->quantidade }}" required autofocus>

                                    @if ($errors->has('quantidade'))
                                        <span class="help-block">
                                        <strong>{{ $insumo->quantidade }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('comprimento') ? ' has-error' : '' }}">
                                <label for="comprimento" class="col-md-2 control-label">Comprimento</label>

                                <div class="col-md-4">
                                    <input id="comprimento" type="number" class="form-control" name="comprimento" value="{{ $insumo->comprimento }}" required autofocus>

                                    @if ($errors->has('comprimento'))
                                        <span class="help-block">
                                        <strong>{{ $insumo->comprimento }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('largura') ? ' has-error' : '' }}">
                                <label for="largura" class="col-md-2 control-label">Largura</label>

                                <div class="col-md-8">
                                    <input id="largura" type="number" class="form-control" name="largura" value="{{ $insumo->largura }}" required autofocus>

                                    @if ($errors->has('largura'))
                                        <span class="help-block">
                                        <strong>{{ $insumo->largura }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('unidadeMedida') ? ' has-error' : '' }}">
                                <label for="unidadeMedida" class="col-md-2 control-label">Unidade de Medida</label>

                                <div class="col-md-8">
                                    <input id="unidadeMedida" type="text" class="form-control" name="unidadeMedida" value="{{ $insumo->unidadeMedida }}" required autofocus>

                                    @if ($errors->has('unidadeMedida'))
                                        <span class="help-block">
                                        <strong>{{ $insumo->unidadeMedida }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('precoUnit') ? ' has-error' : '' }}">
                                <label for="precoUnit" class="col-md-2 control-label">Preço Unitário</label>

                                <div class="col-md-8">
                                    <input id="precoUnit" type="number" class="form-control"  value="{{ $insumo->precoUnit }}" name="precoUnit" required autofocus>

                                    @if ($errors->has('precoUnit'))
                                        <span class="help-block">
                                        <strong>{{ $insumo->precoUnit }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Salvar Alterações!
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
@endsection