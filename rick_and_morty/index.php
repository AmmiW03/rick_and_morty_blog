<!-- Este es el bueno -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Imgs/Mini.webp" type="image/x-icon">
    <title>Blog Rick and Morty</title>
</head>
<body>

<div>
    <!-- <nav class="navbar"> -->
    <nav class="navbar">
        <h2 class="m-3" id="tittle" class="row">Rick and Morty </h2>
        
        <a class="navbar-brand justify-content-center" href="#">  </a>
            <ul class="listaIndex" style="height: 60px;">
                <li class="m-3 1 " class="col">
                    <a href="personajes.php" id="lista" class="row">
                    <img id="imgLista" src="Imgs/perro.png" width="40" height="40" class="col"> 
                        <p class="col menu">Personajes</p>
                    </a>
                </li>
                <li class="m-3" class="col"> 
                    <a href="capitulos.php" id="lista" class="row">
                    <img id="imgLista" src="Imgs/perro.png" width="40" height="40" class="col"> 
                        <p class="col menu">Capitulos</p>
                    </a>
                </li>
            </ul>
    </nav>
</div> 

<div class="container-expand">
    <div class="row ">
        <div class="col-8 ">
            <div class="alinear-Titt">
                <?php
                
                    require("funciones.php");
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/1");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    $data = curl_exec($ch);
                    curl_close($ch);
                    
                    $datos = json_decode($data);
                    
                    echo "<h3>
                            <p>Episodio: $datos->id - '$datos->name'</p>
                        </h3>";
                    echo "<br>";

                    echo "<div class='container d-flex flex-wrap gap-3 col-8' > ";
                    $episodios = $datos -> characters;
                    Hola($episodios);
                    echo "</div>";
                ?>
            </div>
        </div>
        <div class="col-4">
            <?php
             echo "<div class='container d-flex flex-wrap gap-3 col-4' > ";
             random();
             echo "</div><br";
            ?>
        </div>
    </div>
</div>
 
</body>

<footer >
<div class="position-relative">
    <div class='card d-flex' id="foot" style='width: 8rem;'>

        <p>By: Ammi Wang</p>
        <a href="https://github.com/AmmiW03/Rick-and-Morty---Blog"> Github <a/>
    </div>
</div>
</footer>
</html>