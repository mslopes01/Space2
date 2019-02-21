@extends('app')

@section('content')
    <!-- Formulario de envio via POST da distancia-->
    {!! Form::open(['url' => 'pesquisa']) !!}
    <div class="container-fluid hidden-print">
        <div class="row">
            <div class="panel panel-default">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body">
                    <div class="c_label">
                        <input type="text" name="distancia" class="form-control" id="distancia" placeholder="Distancia a ser percorrida em numeros" size="50">
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
    {!! Form::close() !!}<!-- Fechamento Formulario -->
    <!-- IF de teste se os dados foram enviados corretamente-->
    <?php print_r($name); print_r($saltos);?>
    @if ($name[0]!=="N" && $saltos[0]!=="N")
        <?php for ($i=0; $i < 10; $i++) { ?><!-- FOR loop dos dados recebidos e formatados. Loop apenas das 10 naves existentes. -->
        <div class="container-fluid hidden-print">
            <div class="form-row style_div_bea">                
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel-body">
                        <div class="c_label">
                            <h4>
                            <img src="{{ asset('/img/Startup-32.png') }}">                        
                            <?php
                                echo  strtoupper($name[$i])." --> ".$saltos[$i]." Salto(s)</h4>"; 
                            ?>
                        </div>
                    </div>
            </div>
        </div>
        <?php } ?>
    <!-- ELSE de teste incorreto-->
    @else 
        <div class="container-fluid hidden-print">
            <div class="form-row style_div_bea">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body">
                    <div class="c_label">
                        <img src="{{ asset('/img/Darth-Sidious-128.png') }}">
                        <h3>Distancia Incorreta.</h3>
                        <h4>- Apenas Números!!</h4>
                        <h4>- Distancia zero ou negativa não conta.</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection