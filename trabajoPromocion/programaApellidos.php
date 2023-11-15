<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
// Facundo Ledesma

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "CALOR", "OJERA", "PESOS", "LOCRO", "PASTO",
        "LINDO"
    ];

    return $coleccionPalabras;
}

/** Inicializa una estructura de datos con ejemplos de Partidas
 * @return array
 */
function cargarPartidas() {
    $cargarPartidas = [];
    $cargarPartidas[0] = ["palabraWordix"=> "QUESO", "jugador"=> "majo", "intentos"=> 0, "puntaje"=> 0];
    $cargarPartidas[1] = ["palabraWordix"=> "MUJER", "jugador"=> "majo", "intentos"=> 6, "puntaje"=> 0];
    $cargarPartidas[2] = ["palabraWordix"=> "GATOS", "jugador"=> "kevin", "intentos"=> 5, "puntaje"=> 2];
    $cargarPartidas[3] = ["palabraWordix"=> "MELON", "jugador"=> "kevin", "intentos"=> 6, "puntaje"=> 0];
    $cargarPartidas[4] = ["palabraWordix"=> "QUESO", "jugador"=> "kevin", "intentos"=> 1, "puntaje"=> 6];
    $cargarPartidas[5] = ["palabraWordix"=> "PESOS", "jugador"=> "santiago", "intentos"=> 6, "puntaje"=> 0];
    $cargarPartidas[6] = ["palabraWordix"=> "FUEGO", "jugador"=> "santiago", "intentos"=> 2, "puntaje"=> 5];
    $cargarPartidas[7] = ["palabraWordix"=> "LOCRO", "jugador"=> "santiago", "intentos"=> 6, "puntaje"=> 0];
    $cargarPartidas[8] = ["palabraWordix"=> "PIANO", "jugador"=> "lucia", "intentos"=> 0, "puntaje"=> 0];
    $cargarPartidas[9] = ["palabraWordix"=> "PASTO", "jugador"=> "lucia", "intentos"=> 2, "puntaje"=> 5];
    $cargarPartidas[10]= ["palabraWordix"=> "QUESO", "jugador"=> "martin", "intentos"=>2,"puntaje"=>5];
    $cargarPartidas[11]= ["palabraWordix"=> "PASTO", "jugador"=> "martin", "intentos"=>4,"puntaje"=>3];
    $cargarPartidas[12]= ["palabraWordix"=> "FUEGO", "jugador"=> "luciana", "intentos"=>1,"puntaje"=>6];
    $cargarPartidas[13]= ["palabraWordix"=> "QUESO", "jugador"=> "maria", "intentos"=>2,"puntaje"=>5];
    $cargarPartidas[14]= ["palabraWordix"=> "LINDO", "jugador"=> "maria", "intentos"=>4,"puntaje"=>3];
    $cargarPartidas[15]= ["palabraWordix"=> "YUYOS", "jugador"=> "marcos", "intentos"=>2,"puntaje"=>5]; 
    
    return $cargarPartidas;   
}


/** Muestra las opciones del menú
 * @return int
 */
function seleccionarOpcion() {

    echo "\nMenú de opciones: \n";
    echo "1) Jugar al wordix con una palabra elegida: \n";
    echo "2) Jugar al wordix con una palabra aleatoria: \n";
    echo "3) Mostrar una partida: \n";
    echo "4) Mostrar la primer partida ganadora: \n";
    echo "5) Mostrar resumen de Jugador: \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra: \n";
    echo "7) Agregar una palabra de 5 letras a Wordix: \n";
    echo "8) Salir. \n";
    $opcionFinal = trim(fgets(STDIN));

    return $opcionFinal;
}



/** Se le solicita al usuario un número de partida y se muestra en pantalla
 * @param array $numPartidas
 * @return string
 */
function mostrarPartida($numPartidas) {  // * recorrido parcial * // 
    // int $numPartida, $n, $i
    $datos = $numPartidas;
    $n = count($datos);
    $i = 0;

    echo "Ingrese el número de partida que desea observar: ";
    $numPartida = trim(fgets(STDIN));
    
        while ($i < $n && $numPartida < 0 ) {
            echo "No existe el número de partida ingresado. \n";
            echo "Ingrese el número de partida que desea observar: ";
            $numPartida = trim(fgets(STDIN));
        }
        $i++;
        
        echo "***************************************************\n";
        echo "Partida WORDIX ". $datos[$i]["intentos"] . ": palabra ". $datos[$i]["palabraWordix"] . "\n";
        echo "Jugador: ". $datos[$i]["jugador"] ."\n";
        echo "Puntaje: ". $datos[$i]["puntaje"] . " puntos\n";
        if ($datos[$i]["intentos"] = true) {
            echo "Adivinó la palabra en ". $datos[$i]["intentos"] ." intentos.\n";
             echo "***************************************************\n";
        }
        else {
            echo "No adivinó la palabra";
             echo "***************************************************\n";
        }
    }

    

/** Dada una colección de partidas retorna el índice de la primer partida ganada, y si no ganó ninguna retorna el valor -1
 * @param array $partidas
 * @param string $nombre
 * @return int
 */
function primerPartidaGanada($partidas, $nombre) {
    // int $indice
    // bool $encontrada

    $indice = -1;
    $encontrada = false;
    
    while ($partidas["jugador"] == $nombre  &&  !$encontrada){

        if ($partidas["puntaje"] > 0){
            
            $partidas[$indice] = $indice;
            $encontrada = true;
        }
          $indice++;
        }

        return $indice;
    }


/** Función que solicita el nombre del jugador
 * @return string
 */
function solicitarJugador() {
    // string $usuario
    echo "Nombre del Jugador: ";
    $usuario = trim(fgets(STDIN));

    if (ctype_alpha($usuario)) {
        return strtolower($usuario);
    } else {
        echo "Por favor, ingrese un nombre válido que comience con una letra: \n";
    }
}

/**
 * Funcion que retorna falso si la palabra no se encuentra en la lista y verdadero si dicha palabra se encuentra
 * @param ARRAY $coleccionPalabras
 * @param STRING $palabra
 * @return BOOLEAN
 */
function existePalabra ($coleccionPalabras, $palabra){
    //BOOLEAN $encontrada
    // INT $i, $cant
    
    $encontrada= false;
    $i=0;
    $cant=count($coleccionPalabras);
    while ($i<$cant  &&  !$encontrada){
     
        if ($coleccionPalabras[$i]==$palabra){
            $encontrada=true;
        }
        $i++;
    }

    return $encontrada;
}


/** 
 * @param ARRAY $coleccionPalabras
 * @param STRING $palabra
 * @return ARRAY
*/
function agregarPalabra ($coleccionPalabras, $palabra){
// INT $nuevaPosicion

$nuevaPosicion=count($coleccionPalabras)+1;
$coleccionPalabras[$nuevaPosicion]=$palabra;

return $coleccionPalabras;

}


/**
 * 
 */
function resumenJugador ($partidas,$jugador){
    
    $cant=count($cargarPartidas);
    for ($i=0; $i<$cant;$i++);
        if ($partidas[$i]["jugador"] == $jugador){

        }
    $resumen = [
        'jugador' => $jugador, 'partidas'=> $partidas, 'puntaje' => $puntaje, 'victorias'=> $victorias,
        'intento1' => $intento1, 'intento2' => $intento2, 'intento3' => $intento3, 'intento4' => $intento4, 
        'intento5' => $intento5, 'intento6' => $intento6
    ];

}


/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
print_r($partida);
//imprimirResultado($partida);


    $palabras = cargarColeccionPalabras();
    $partidas = cargarPartidas();
    $usuario = solicitarJugador();
    escribirMensajeBienvenida($usuario);


    do {
        $opcion = seleccionarOpcion();
        switch ($opcion) {
            case 1: 
                $partida = jugarWordix($palabras, $usuario);
                break;
            case 2:
                $partida = jugarWordix($palabras, $usuario);
                break;

            case 3:
                $mostrar = mostrarPartida($partidas);
                print_r($mostrar);
                
                break;
                
            case 4:
                echo "\nIngrese el nombre del jugador que desea observar su primer victoria: ";
                $jugador = trim(fgets(STDIN)); 

                $primerPartidaGanada = primerPartidaGanada($partidas, $jugador);

                if ($primerPartidaGanada == -1) {
                    echo "El jugador ". $usuario . " no ganó ninguna partida. \n";
                } else {
                    print_r($primerPartidaGanada);
                }


            case 5: 
                // mostrarEstadisticas
                    function mostrarEstadisticas(){
                        echo "\nIngrese el nombre del jugador que desea observar sus estadisticas: ";
                        $nombJugador=trim(fgets(STDIN));
                        
        

                        }

                    }
                    break;
                    
            case 6:
                // mostrarResumenJugador
                $resumen = [
                    'jugador' => $jugador, 'partidas'=> $partidas, 'puntaje' => $puntaje, 'victorias'=> $victorias,
                    'intento1' => $intento1, 'intento2' => $intento2, 'intento3' => $intento3, 'intento4' => $intento4, 
                    'intento5' => $intento5, 'intento6' => $intento6
                ];
                uasort($resumen, resumenJugador($palabras, $usuario)); //uasort: ordena los elementos usando una función de comparación definida por el usuario
                foreach($resumen as $indice=> $elemento) {
                    echo "$indice = $elemento\n";
                }
                print_r($resumen); // print_r: muestra información sobre una variable en una forma que es legible por humanos.

            case 7:
                //agrega nueva palabra a la coleccion
              
                $nuevaPalabra= leerPalabra5Letras();
                $existe=existePalabra($palabras,$nuevaPalabra);
                if ($existe==true){
                    echo "la palabra ya se encuentra en la lista   \n";
                }else{
                    $palabras=agregarPalabra($palabras,$nuevaPalabra);
                }
              print_r($palabras);
                break;

                case 8:
                    echo "Saliendo del programa. ";
                    exit;
        
                //...
    }
    } while ($opcion != 0);

