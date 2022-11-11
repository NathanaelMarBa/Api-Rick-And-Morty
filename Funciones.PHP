<?php
function obtenerJson($url){
    $Se = curl_init();
    curl_setopt($Se, CURLOPT_URL, $url);
    curl_setopt($Se, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($Se, CURLOPT_HEADER, 0);
    $data = curl_exec($Se);
    $Json = json_decode($data);
    return $Json;
}

function ObtenerPersonajes(){
    for($i = 1; $i <= 42; $i++){
        $Json = obtenerJson("https://rickandmortyapi.com/api/character?page=$i");
        foreach($Json->results as $character){

                echo "<div class='card mb-5' style='width: 18rem;'>
                      <img src='$character->image' class='card-img-top' alt='...'>
                      <div class='card-body'>
                      <p class='card-text'>Name: $character->name</p>";
                      echo "<p >Status: $character->status</p>";
                        if($character->type == NULL){
                            $character->type = "Human";
                        }
                      echo "<p>Type: $character->type</p>";
                      echo "<p>Gender: $character->gender</p>
                      </div>
                    
                    </div>";
        }
    }
}

function ObtenerEpisodios(){
    for($i = 1; $i <= 3; $i++){
        $Json = obtenerJson("https://rickandmortyapi.com/api/episode?page=$i");
        foreach($Json->results as $episode){
            echo "<div class='card mb-5' style='width: 18rem;'>
            <div class='card-body'>
            <a href='personaje.PHP'> <img src='episodios.jpeg' class='card-img-top'> </a>
            <h5 class='card-title'>Episode: $episode->name</h5>
            <p class='card-text'>Air Date: $episode->air_date</p> <br>
            <p class='card-text'>Episode: $episode->episode</p> <br>
            <p class='card-text'>Id: $episode->id</p>;
            </div>
            </div>";
        }
    }
}

function ObtenerEpisodio($epi){
    $json = obtenerJson("https://rickandmortyapi.com/api/episode/$epi");
    echo "$json->name";
    echo "$json->air_date";
    echo "$json->episode";
    echo '<h1>Personajes del episodio</h1>';
    foreach($json->characters as $character){
        $json2 = obtenerJson($character);
        echo "<div class='card mb-5' style='width: 18rem;'>
        <img src='$json2->image' class='card-img-top' alt='...'>
        <div class='card-body'>
        <p class='card-text'>Name: $json2->name</p>
        <p class='card-text'>Specie: $json2->species</p>
        <p class='card-text'>gender: $json2->gender</p>
        ";
        echo "<p >Status: $json2->status</p>";
          if($json2->type == NULL){
              $json2->type = "Human";
          }

    }
}
?>