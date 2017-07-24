<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>EngPHP</title>
        
        <link rel="stylesheet" href="Organizador.css"/>
        <link rel="stylesheet" href="Formulário.php"/>
        
    </head>
    <body>
        <div class="container">

            <div class="place">
            <h1>Cálculo de Escadas</h1>
            </div>
            
<?php


         
//------------------------------ITENS----------------------------------------

$pe = 3.15;              // PÉ ESQUERDO
$min = 0.16; 	  	 // ESPELHO MÍN - Altura minima de degrau para degrau
$max = 0.18;             // ESPELHO MÁX - Altura máxima de degrau para degrau
$pmin = 0.25;            // PISO MÍN - Comprimento minimo do piso
$pmax = 0.32;            // PISO MÁX - Comprimento máximo do piso
$blmin = 0.60;       // BLONDEL MÍN - Número minimo de BLONDEL 
$blmax = 0.64;      // BLONDEL MÁX - Número máximo de BLONDEL 

##FÓRMULA DE BLONDEL = 2 * Espelho(m) + Piso(m) = 0.60 até 0.64

//----------------------------------------------------------------------------


##############################################################################
###################<----FUNCTION - NÚMERO DE DEGRAUS---->#####################
##############################################################################

function numdeg($pe,$min)       //FUNÇÃO PARA CÁLCULO DO NÚMERO DE DEGRAUS
{
    return $pe / $min;          //RETORNA O NUMERO DE DEGRAUS INICIAL
}

//echo "Nº de Degraus inicial: ".numdeg($pe,$min)."<br><br>";

$numdeg = numdeg($pe,$min);     //VARIAVEL $numdeg RECEBE A FUNÇÃO numdeg($pe,$min)

##############################################################################
##################<----CORRIGINDO NÚMERO DE DEGRAUS---->######################
##############################################################################


//CORREÇÃO - ARREDONDAMENTO PARA BAIXO E DIMINUE 1.

                                        //$numdeg1 - Número de degraus
$numdeg1 =  floor ($numdeg-1);          //CORRIGE A VARIAVEL $numdeg1 

//echo "Quant. degraus corrigidos: "; 

//echo $numdeg1;

##############################################################################
#########################<-----FUNCTION ESPELHO----->#########################
##############################################################################

function espelho($pe,$numdeg1) 
{
  return $pe/$numdeg1;
}

//echo "Espelho Inicial: ".espelho($pe,$numdeg1)."<br><br>";

$espelho = espelho($pe,$numdeg1);

##############################################################################
#########################<-----CORREÇÃO ESPELHO----->#########################
##############################################################################

$esp1 = round($espelho,$precision=2);
    
#############################################################################
#########################<----RESULTADO DO CÁLCULO---->######################
#############################################################################

echo "<br><br><b>RESULTADO: </b><br><br>";

#############################################################################
####################<----RESULTADO PÉ ESQUERDO---->##########################
#############################################################################

echo "Pé Esquerdo: <b>".$pe." metros</b><br><br>";

#############################################################################
########################<----RESULTADO DEGRAUS---->##########################
#############################################################################


echo "Degraus: <b>".$numdeg1." degraus.</b> OK! <br><br>";

#############################################################################
#########################<----RESULTADO ESPELHO---->#########################
#############################################################################

if ($esp1 >= $min) 
{
    if ($esp1 <= $max)
{
   echo "Espelho: ";

echo "<b>".$esp1." m</b> ou <b>".($esp1 * 100)." cm</b> OK!<br><br>";     
        
 }
}

##############################################################################
##########################<----RESULTADO PISO---->############################
##############################################################################

function piso($esp1,$blmax)
{
    return ($blmax - 2 * $esp1)  ;
}
echo "Piso: <b>".piso($esp1,$blmax)." m</b> ou <b>".(piso($esp1, $blmax) * 100)." cm</b> OK!<br><br>";

$piso = piso($esp1, $blmax);


##############################################################################
##########################<----FUNCTION BLONDEL---->#########################
##############################################################################

function blondel($piso,$esp1) 
{
    return (2 * $esp1 + $piso);
}

###########################<----TESTE BLONDEL--->#############################

if (Blondel($piso, $esp1)>= $blmin) 
{
if(Blondel($piso, $esp1)<= $blmax)
{
    echo "<hr>";
    echo "Número de Blondel: <b>".Blondel($piso, $esp1)."</b> OK!! ";    
    echo "<hr>";
}    
}

//##############################################################################
//#################<----DIFERENÇA DE PRECISSÃO ESPELHO---->#####################
//##############################################################################
//    
echo "<br><br><h2>RECOMENDAÇÃO</h2><br>";
//
echo "Recomenda-se adicionar ou retirar essa diferença de um em um ou dois em dois centímetros. <br><br>";
//
//echo "<br>Espelho: <b>".round((espelho($pe, $numdeg1)),$precision=4)."</b>"
//        ."<br><br>Espelho Arredondado: <b>".$esp1."</b><br><br>";

 if ($espelho >= $esp1)
    {
//           
            echo "<br><u>Adicionar</u> <b>". round((($espelho - $esp1) * 100),$precision=2)." cm </b> em cada degrau";  
            
            echo " ou <u>adicionar</u> <b>".number_format((($espelho - $esp1) * $numdeg1) * 100)." cm </b>na escada toda.";
    }
 elseif ($esp1 > $espelho) 
    {
//        
            echo "<br><u>Retirar</u> <b>".round((($esp1 - $espelho) * 100),$precision=2)." cm </b> em cada degrau";  //UNIDADE DE MEDIDA EM CENTÍMENTROS
            
            echo " ou <u>retirar</u>  <b>".number_format((($esp1 - $espelho) * $numdeg1) * 100)." cm </b> na escada toda.";
    }


//echo "<br><br>Diferença Acumulada: "  ;
//
//echo difesp($espelho, $esp1)."<br><br>";
//echo "\$espelho: ".round($espelho,$precision=4)."<br>";
//echo "\$esp1: ".$esp1."<br>";
    
?>
        </div>
</body>
</html>