<?php


reemplazar('el_quijote.txt', 'quijote-modificado.txt', 'Sancho', 'Morty');

function reemplazar($fichero, $fichero_new, $palabra, $palabra_new){

	$descriptor =	fopen($fichero_new,'w');
	fclose($descriptor);
	//echo $fichero;
	$file = fopen($fichero,'r');
	$contador = 0;
	while (($leer=(fgets($file))) !== false ){

	//	buscaMolino($leer);
		//$array = str_split($leer);
//		echo $leer . "\n";
		$array = explode(" ",$leer);
		$long = count($array);
		//print_r($array);
		
		
		
		for ($i = 0; $i < $long; $i++){
			//echo $array[$i];

			if ($array[$i] == $palabra or $array[$i] == $palabra."," or $array[$i] == $palabra.";" or $array[$i] == $palabra."." or $array[$i] == $palabra."?"){
				$array[$i] = $palabra_new;
				$contador++;
				
			}

		} 
		abrirfichero($fichero_new, $array);
		

	}
	echo "la palabra $palabra aparece $contador veces y será modificada por $palabra_new en el archivo $fichero_new";

	}
	function abrirFichero($fichero_new, $array){
		$escribir = implode(" ",$array);
		$descriptor = fopen($fichero_new, 'a+');
		fwrite($descriptor,$escribir);
		fclose($descriptor);

	}

?>