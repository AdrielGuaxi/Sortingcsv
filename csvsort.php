<?php
function bubble_Sort($my_array){
	do{
		$swapped = false;
		for( $i = 0, $c = count( $my_array ) - 1; $i < $c; $i++ ){
			if( $my_array[$i] > $my_array[$i + 1] ){
				list( $my_array[$i + 1], $my_array[$i] ) =
						array( $my_array[$i], $my_array[$i + 1] );
				$swapped = true;
			}
		}
	}
	while( $swapped );
return $my_array;
}
function selection_Sort($data){
    $n=count($data);
    $nextSwap=null;    
    $temp=null;
    for($i=0; $i<$n-1; $i++){
        $nextSwap=$i;
        for($j=$i+1; $j<$n; $j++){
            if( $data[$j]<$data[$nextSwap] ) 
            {
                $nextSwap=$j; 
            }
        }
        $temp=$data[$i];
        $data[$i]=$data[$nextSwap];
        $data[$nextSwap]=$temp;
    }
    return $data;
}
function quick_Sort($arr){
    if(count($arr) <= 1){
        return $arr;
    }
    else{
        $pivot = $arr[0];
        $left = array();
        $right = array();
        for($i = 1; $i < count($arr); $i++)
        {
            if($arr[$i] < $pivot){
                $left[] = $arr[$i];
            }
            else{
                $right[] = $arr[$i];
            }
        }
        return array_merge(quick_Sort($left), array($pivot), quick_Sort($right));
    }
}
$lista = [[],[],[],[],[],[],[]];
$csv = 'C:\Users\Pichau\OneDrive\Área de Trabalho\metadados_fotos_APS_20212.csv';
$fhandle = fopen($csv, 'r');
$a = 0;
$resultado = [];
while(list($id,$file_name,$satellite,$file_size,$date_time,$latitude,$longitude) = fgetcsv($fhandle, 1024, ',')){
    $lista[0][$a] = $id;
    $lista[1][$a] = $file_name;
    $lista[2][$a] = $satellite;
    $lista[3][$a] = $file_size;
    $lista[4][$a] = $date_time;
    $lista[5][$a] = $latitude;
    $lista[6][$a] = $longitude;
    $a++;
}
fclose($fhandle);
$validador = false;
while($validador == false){
    $opcao = readline("1- Quick Sort \n2- Selection Sort \n3- Bubble Sort \n4- Sair\n");
    echo "\n";
    $counter = 0;
    switch ($opcao){
        case 1:
            $tipo_dado = readline("1- Id\n2- Nome do arquivo\n3- Satelite\n4- Tamanho do arquivo\n5- Data e Hora\n6- Latitude\n7- Logitude\n");
            echo "\n";
            //quicksort
            if ($tipo_dado<=7){
                while($counter<count($lista[$tipo_dado-1])){
                    for($i=0;$i < count($lista[$tipo_dado-1]);$i++){
                        if ($lista[$tipo_dado-1][$i] == (quick_Sort($lista[$tipo_dado-1])[$counter])){
                            $resultado[$counter][0] = $lista[0][$i];
                            $resultado[$counter][1] = $lista[1][$i];
                            $resultado[$counter][2] = $lista[2][$i];
                            $resultado[$counter][3] = $lista[3][$i];
                            $resultado[$counter][4] = $lista[4][$i];
                            $resultado[$counter][5] = $lista[5][$i];
                            $resultado[$counter][6] = $lista[6][$i];
                            $counter ++;
                        }
                    }
                    
                }
                $relatorio = fopen('C:\Users\Pichau\OneDrive\Área de Trabalho\relatorios\relatorio_quick_sort.csv', 'w');
                foreach ($resultado as $line) {
                    fputcsv($relatorio, $line, ',');
                }
                fclose($relatorio);
            }else{
                echo("Tipo de dado invalido! Tente novamente");
                echo "\n";
                $tipo_dado = readline("1- Id\n2- Nome do arquivo\n3- Satelite\n4- Tamanho do arquivo\n5- Data e Hora\n6- Latitude\n7- Logitude");
                echo "\n";
            }
            
            break;
        case 2:
            $tipo_dado = readline("1- Id\n2- Nome do arquivo\n3- Satelite\n4- Tamanho do arquivo\n5- Data e Hora\n6- Latitude\n7- Logitude");
            echo "\n";
            //selectionSort
            if ($tipo_dado<=7){
                while($counter<count($lista[$tipo_dado-1])){
                    for($i=0;$i < count($lista[$tipo_dado-1]);$i++){
                        if ($lista[$tipo_dado-1][$i] == (selection_Sort($lista[$tipo_dado-1])[$counter])){
                            $resultado[$counter][0] = $lista[0][$i];
                            $resultado[$counter][1] = $lista[1][$i];
                            $resultado[$counter][2] = $lista[2][$i];
                            $resultado[$counter][3] = $lista[3][$i];
                            $resultado[$counter][4] = $lista[4][$i];
                            $resultado[$counter][5] = $lista[5][$i];
                            $resultado[$counter][6] = $lista[6][$i];
                            $counter ++;
                        }
                    }
                }
                $relatorio = fopen('C:\Users\Pichau\OneDrive\Área de Trabalho\relatorios\relatorio_selection_sort.csv', 'w');
                foreach ($resultado as $line) {
                fputcsv($relatorio, $line, ',');
                }
                fclose($relatorio);
            }else{
                echo("Tipo de dado invalido! Tente novamente");
                echo "\n";
                $tipo_dado = readline("1- Id\n2- Nome do arquivo\n3- Satelite\n4- Tamanho do arquivo\n5- Data e Hora\n6- Latitude\n7- Logitude");
                echo "\n";
            }
            break;
        case 3:
            $tipo_dado = readline("1- Id\n2- Nome do arquivo\n3- Satelite\n4- Tamanho do arquivo\n5- Data e Hora\n6- Latitude\n7- Logitude");
            echo "\n";
            //bubblesort
            if ($tipo_dado<=7){
                while($counter<count($lista[$tipo_dado-1])){
                    for($i=0;$i < count($lista[$tipo_dado-1]);$i++){
                        if ($lista[$tipo_dado-1][$i] == (bubble_Sort($lista[$tipo_dado-1])[$counter])){
                            $resultado[$counter][0] = $lista[0][$i];
                            $resultado[$counter][1] = $lista[1][$i];
                            $resultado[$counter][2] = $lista[2][$i];
                            $resultado[$counter][3] = $lista[3][$i];
                            $resultado[$counter][4] = $lista[4][$i];
                            $resultado[$counter][5] = $lista[5][$i];
                            $resultado[$counter][6] = $lista[6][$i];
                            $counter ++;
                        }
                    }
                }
                $relatorio = fopen('C:\Users\Pichau\OneDrive\Área de Trabalho\relatorios\relatorio_bubble_sort.csv', 'w');
                foreach ($resultado as $line) {
                    fputcsv($relatorio, $line, ',');
                }
                fclose($relatorio);
            }else{
                echo("Tipo de dado invalido! Tente novamente");
                echo "\n";
                $tipo_dado = readline("1- Id\n2- Nome do arquivo\n3- Satelite\n4- Tamanho do arquivo\n5- Data e Hora\n6- Latitude\n7- Logitude");
                echo "\n";
            }    
            break;
        case 4:
            echo("Saindo!");
            echo "\n";
            $validador = true;
            break;
        default:
            echo("Opção inválida\n");
    }
}
?>