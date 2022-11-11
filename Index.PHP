<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles.css">
    <title>Rick and Morty</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li>
          <a href="index.php"><img src="logo.png" alt="100px" width="100px" class="d-inline-block align-text-top" href="index.php"></a>
        </li>
        <li class="nav-item top">
          <h4> <a class="nav active a" aria-current="page" href="personajes.PHP">Personajes</a> </h4>
        </li>
        <li class="nav-item top">
          <h4> <a class="nav active a" href="capitulos.PHP">  Capitulos</a> </h4>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class = "principal">
<div class="Main">
  <img src="main.png" width="450px">
</div>

<div class = "central">
  <div class = "divi">
    <div class="container text-end ">
      <div class="row justify-content-end info">
        <h1 class = "divi">Api de rick y morty <br></h1>
        <h3 class= "text"> <br> Bienvenido a la api de rick and morty, aqui podras encontrar todos <br> los personajes
            de la serie animada asi como ciertos datos de ellos, y los 51 capitulos de la serie                  <br> <br> <br>
      </h3>
      </div>
    </div>
  </div>
</div>

<br> <br>

<div class = "cards">
  <div class="fondo">
          <div class="container text-end ">
              <div class="row justify-content-end">
                <?php
                  $P1 = rand(1, 826);
                  $P2 = rand(1, 826);
                  $P3 = rand(1, 826);
                  $Random = "https://rickandmortyapi.com/api/character/"."[".$P1.",".$P2.",".$P3."]";
                  $Se = curl_init();
                  curl_setopt($Se, CURLOPT_URL, $Random);
                  curl_setopt($Se, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($Se, CURLOPT_HEADER, 0);
                  $data = curl_exec($Se);
                  curl_close($Se);
                  $personajes = json_decode($data);
                  foreach($personajes as $personaje){
                      echo "<div class='card' style='width: 18rem;'>
                      <img src='$personaje->image' class='card-img-top' alt='...'>
                      <div class='card-body'>
                      <p class='card-text'>Name: $personaje->name</p>";
                      echo "<p >Status: $personaje->status</p>";
                        if($personaje->type == NULL){
                            $personaje->type = "Human";
                        }
                      echo "<p>Type: $personaje->type</p>";
                      echo "<p>Gender: $personaje->gender</p>
                      </div>
                    </div>";
                    }            
                    echo "<br>";
                ?>
             </div>
           </div>
      </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>