<?php

function Hola($episodios){

    
    foreach($episodios as $personaje){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $personaje);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $personaje = json_decode($data);
    

        echo "<div class='card' style='width: 10rem;'>";
        echo "<img class='card-img-top' src=$personaje->image>";
        echo "<div class='card-body'>";
        echo    "<h5 class='card-title'> $personaje->id</h5>";
        echo    "<h5 class='card-title'>$personaje->name</h5>";
        
        echo "Especie: $personaje->species";
        //Genero
        if($personaje->gender == "Male"){
               $personaje->gender ="Masculino";
           }elseif($personaje->gender == "Female"){
               $personaje->gender ="Femenino";
           }else{
               $personaje->gender = "Desconocido";
           }
        //Status
        if($personaje->status == "Alive"){
            $personaje->status ="Vivo";
        }else{
            $personaje->status = "Ya no esta vivo:D";
        }
        echo "<br>Estatus: $personaje->status</h3> <br>";
        echo "Genero: $personaje->gender";
        echo    "<a href=$personaje->url target='_blank'> Stalkear </a>";
        echo "</div>
        </div>";

    }
}

function random(){
    $var1 = rand(1, 826);
    $var2 = rand(1, 826);
    $var3 = rand(1, 826);
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://rickandmortyapi.com/api/character/"."[".$var1.",".$var2.",".$var3."]");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $personaje = json_decode($data);
        foreach($personaje as $character)
        {
            // echo "<h3>$character->name</h3>";
            // echo "<img src=$character->image><br>";

            echo "<div class='card' style='width: 10rem;'>";
            echo "<img class='card-img-top' src=$character->image>";
            echo "<div class='card-body'>";
            echo    "<h5 class='card-title'> $character->id</h5>";
            echo    "<h5 class='card-title'>$character->name</h5>";
            
            echo "Especie: $character->species";
            
            echo "Genero: $character->gender";
            echo    "<a href=$character->url target='_blank'> Stalkear </a>";
            echo "</div>
            </div>";
        }
    
}

function personajes($personajes){
    
    foreach($personajes as $personaje){
        
        echo "<div class='card' style='width: 10rem;'>";
        echo "<img class='card-img-top' src=$personaje->image>";
        echo "<div class='card-body'>";
        echo    "<h5 class='card-title'> $personaje->id</h5>";
        echo    "<h5 class='card-title'>$personaje->name</h5>";
        
        echo "Especie: $personaje->species";
        //Genero
        if($personaje->gender == "Male"){
               $personaje->gender ="Masculino";
           }elseif($personaje->gender == "Female"){
               $personaje->gender ="Femenino";
           }else{
               $personaje->gender = "Desconocido";
           }
        //Status
        if($personaje->status == "Alive"){
            $personaje->status ="Vivo";
        }else{
            $personaje->status = "Ya no esta vivo:D";
        }
        echo "<br>Estatus: $personaje->status</h3> <br>";
        echo "Genero: $personaje->gender";
        echo    "<a href=$personaje->url target='_blank'> Stalkear </a>";
        echo "</div>
        </div>";
    }
}

function episodios($episodios){
    
    foreach($episodios as $capitulo){

        echo "<div class='card' style='width: 10rem;'>
    
        <div class='card-body'>
            <h5 class='card-title'>Capitulo: $capitulo->id</h5>
            <h5 class='card-title'>$capitulo->name</h5>
            <p class='card-text'>Fecha de lanzamiento: $capitulo->air_date</p>
            <a href=$capitulo->url target='_blank'> Stalkear </a>
        </div>
        </div>";
    }


    
}

?>
