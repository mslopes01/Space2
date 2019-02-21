<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarshipsController extends Controller
{   
    function descricoes($item) {
        return $item->name;
    }
    /*
        FUNCTION de calculo de saltos
        -> Recebe o valor via Post e faz as devidas verificações.
        -> Retorna dois arrays:
            - $saltos[]: Quantidade de saltos relizados em determinada distancia
            - $name[]: Nome da espaconave
        -> FOR controla o loop de recebimento das espaconaves, limitado a 10 por ser o numero existente.
    */
    public function saltos(){
        $dados = json_decode(file_get_contents("https://swapi.co/api/starships/"));
        $dados2 = array_map(descricoes, $dados);
        print_r($dados2);
        echo "string";
        // IF teste de consistencia: apenas numeros
        /*if (!empty($_POST['distancia']) && is_numeric($_POST['distancia'])) {
            $consumables_num = array();
            $consumables_tempo = array();
            $name=array();
            $saltos=array();
            $data = json_decode(file_get_contents("https://swapi.co/api/starships/"));

            for ($i=0; $i < 10; $i++) {
                $consumables_tempo = preg_replace("/[^A-Za-z]/", "", $data->results[$i]->consumables);
                $consumables_num = preg_replace("/[^0-9]/", "", $data->results[0]->consumables);
                if (!(is_nan($consumables_num))) {
                    // IF por meses
                    if ($consumables_tempo == "months" || $consumables_tempo == "month") {
     
                        $saltos[$i] = round($_POST['distancia']/(($data->results[$i]->MGLT*24)*(preg_replace("/[^0-9]/", "", $data->results[$i]->consumables)*30)));
                        $name[$i]=$data->results[$i]->name;
                    // ELSEIF por anos
                    } elseif ($consumables_tempo == "years" || $consumables_tempo == "year") {
     
                        $saltos[$i] = round($_POST['distancia']/(($data->results[$i]->MGLT*24)*(preg_replace("/[^0-9]/", "", $data->results[$i]->consumables)*360)));
                        $name[$i]=$data->results[$i]->name;
                    // ELSEIF por dias
                    } elseif ($consumables_tempo == "days" || $consumables_tempo == "day") {
     
                        $saltos[$i] = round($_POST['distancia']/(($data->results[$i]->MGLT*24)*preg_replace("/[^0-9]/", "", $data->results[$i]->consumables)));
                        $name[$i]=$data->results[$i]->name;
                    // ELSEIF por semanas
                    } elseif ($consumables_tempo == "weeks" || $consumables_tempo == "week") {

                        $saltos[$i] = round($_POST['distancia']/(($data->results[$i]->MGLT*24)*(preg_replace("/[^0-9]/", "", $data->results[$i]->consumables)*7)));
                        $name[$i]=$data->results[$i]->name;
                    // Caso não tenha tempo de combustivel ou exita outra forma de tempo não descrita
                    } else{
                        $name[$i]=$data->results[$i]->name;
                        $saltos[$i]="Não foi possivel calcular.";
                    }
                }
            }
        } else {
            $name[0]="N";
            $saltos[0]="N";
        }
    return view('saltos')->with('name',$name)->with('saltos',$saltos);*/
    }

}
