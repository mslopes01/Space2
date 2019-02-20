@extends('app')

@section('content')
    <!-- Formulario da tela inicial de pesquisa-->
    {!! Form::open(['url' => 'pesquisa']) !!}
    <div class="container-fluid">
        <div class="row style_div_bea">
            <div class="panel panel-default">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body">
                    <div class="c_label">
                        <label>Distancia a ser percorrida</label>
                        <input type="text" name="distancia" class="form-control" id="distancia" placeholder="Distancia" size="50">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="c_label" style="margin-top: 1cm">
                        <button type="submit" class="btn btn-success">
                            Pesquisar
                        </button>
                    </div>
                </div>
            </div>      
        </div>
    </div>
    {!! Form::close() !!}
@endsection