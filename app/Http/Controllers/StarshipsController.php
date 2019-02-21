<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarshipsController extends Controller
{   
    /*
        FUNCTION de calculo de saltos
        -> Recebe o valor via Post e faz as devidas verificações.
        -> Retorna dois arrays:
            - $saltos[]: Quantidade de saltos relizados em determinada distancia
            - $name[]: Nome da espaconave
        -> FOREACH controla o loop de recebimento das espaconaves.
    */
    public function saltos(){
        $i=0;
        // IF teste de consistencia: apenas numeros
        if (!empty($_POST['distancia']) && is_numeric($_POST['distancia']) && $_POST['distancia']>0) {
            $resultado = json_decode(file_get_contents("https://swapi.co/api/starships/"));
            $dados_array=$resultado->results;
            $consumables_num = array();
            $consumables_tempo = array();
            $name=array();
            $saltos=array();
            foreach($dados_array as $dados_array){
                $consumables_tempo = preg_replace("/[^A-Za-z]/", "", $dados_array->consumables);
                $consumables_num = preg_replace("/[^0-9]/", "", $dados_array->consumables);
                if (!(is_nan($consumables_num))) {
                    // IF por meses
                    if ($consumables_tempo == "months" || $consumables_tempo == "month") {
                        $saltos[$i] = round($_POST['distancia']/(($dados_array->MGLT*24)*(preg_replace("/[^0-9]/", "", $dados_array->consumables)*30)));
                        $name[$i]=$dados_array->name;

                    // ELSEIF por anos
                    } elseif ($consumables_tempo == "years" || $consumables_tempo == "year") {
     
                        $saltos[$i] = round($_POST['distancia']/(($dados_array->MGLT*24)*(preg_replace("/[^0-9]/", "", $dados_array->consumables)*360)));
                        $name[$i]=$dados_array->name;
                    // ELSEIF por dias
                    } elseif ($consumables_tempo == "days" || $consumables_tempo == "day") {
     
                        $saltos[$i] = round($_POST['distancia']/(($dados_array->MGLT*24)*preg_replace("/[^0-9]/", "", $dados_array->consumables)));
                        $name[$i]=$dados_array->name;
                    // ELSEIF por semanas
                    } elseif ($consumables_tempo == "weeks" || $consumables_tempo == "week") {

                        $saltos[$i] = round($_POST['distancia']/(($dados_array->MGLT*24)*(preg_replace("/[^0-9]/", "", $dados_array->consumables)*7)));
                        $name[$i]=$dados_array->name;
                    // Caso não tenha tempo de combustivel ou exita outra forma de tempo não descrita
                    } else{
                        $name[$i]=$dados_array->name;
                        $saltos[$i]="Não foi possivel calcular.";
                    }
                }
                $i=$i+1;
            }
        } else {
            $name[0]="N";
            $saltos[0]="N";
        }
   return view('saltos')->with('name',$name)->with('saltos',$saltos)->with('i',$i);
    }

}
