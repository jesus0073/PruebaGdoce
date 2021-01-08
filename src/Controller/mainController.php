<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class mainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'mainController',
            'resultado' => $this->adivinarNumero(),
        ]);
    }
    

    public function adivinarNumero(){
        function busquedaBinaria($first, $last, $val) 
    { 
        while ($first <= $last)
        {
            $mid = floor( ($first + $last) / 2 );
            if($mid == $val) { return $mid; }
            
            // Comprobamos en que mitad del array está el valor de entrada. 
            ($val < $mid)  
                ? $last  = $mid - 1   
                : $first = $mid + 1;  
        } 
        return false;
    } 
    
    //--- Calcular tiempo incio y tiempo transcurrido final
    function timer()
    {
        return hrtime(true);
    }
    
    //--- Valor de entrada
    
    $value = 51000;
    
    $timer = timer();
    $found = busquedaBinaria(1, 10000000000, $value) ? : "un valor que no está dentro del rango, introduzca otro valor";
    $transcurrido = timer() - $timer;
    
    
    return ["Has introducido ".$found.".","Tiempo transcurrido = ".$transcurrido." nanosecs."]; 
    }
    
}
