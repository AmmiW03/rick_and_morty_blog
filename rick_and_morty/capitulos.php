<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Imgs/Caja.png" type="image/x-icon">
    <title>Blog Rick and Morty</title>
</head>


<div>
    <!-- <nav class="navbar"> -->
    <nav class="navbar">
        <h2 class="m-3" id="tittle" class="row">Rick and Morty </h2>
        
        <a class="navbar-brand justify-content-center" href="#">  </a>
            <ul class="listaIndex" style="height: 60px;">
                <li class="m-3 1 " class="col">
                    <a href="index.php" id="lista" class="row">
                    <img id="imgLista" src="Imgs/perro.png" width="40" height="40" class="col"> 
                        <p class="col menu">Home</p>
                    </a>
                </li>
                <li class="m-3" class="col"> 
                    <a href="personajes.php" id="lista" class="row">
                    <img id="imgLista" src="Imgs/perro.png" width="40" height="40" class="col"> 
                        <p class="col menu">Personajes</p>
                    </a>
                </li>
            </ul>
    </nav>
</div> 

<body>
<div class="container">
    <?php
        
        require("funciones.php");
    
        if(isset($_GET["contador"])){
            $contador = $_GET["contador"] += 1;
        }else {
            $contador = $_GET["contador"] = 1;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://rickandmortyapi.com/api/episode?page=$contador");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
    
    
        $datos = json_decode($data);
        
        if($contador < $datos->info->pages){
            echo " <form action='capitulos.php' method='get'>
        <input style='display:none' class='btn' type='text' name='contador' value='{$contador}'>
        <input class='btn btn-dark mt-3' type='submit'  value='Siguiente '>
        </form><br>";
        }
        if($contador > 1){
            $back = $contador - 2;
            echo "<form action='capitulos.php' method='get'>
            <input style='display:none' class='btn' type='text' name='contador' value='{$back}'>
            <div class=' d-md-flex justify-content-md-end '> 
            <input class='btn btn-dark me-md-2' type='submit' value='Regresar' >
            </div>
            </form><br>";
        }

        echo "<div class='container d-flex flex-wrap gap-5'> ";
        $episodios = $datos->results;
        episodios($episodios);
        echo "</div>";
        
    ?>
    </div>
</body>
<footer >
<div class="position-relative">
    <div class=' d-flex flex-wrap' id="foot" style='width: 8rem;'>

        <p>By: Ammi Wang</p>


    </div>
</div>
</footer>
</html>