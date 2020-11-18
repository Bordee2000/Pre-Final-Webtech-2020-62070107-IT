<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EzQuiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
<?php 

    $json = file_get_contents("spotify.json");
    $result = json_decode($json, true);
    $name = $result["tracks"]["items"][0]["album"]["artists"][0]["name"];
    // print_r($result["tracks"]["items"][0]["album"]["images"][0]["url"]);
    /* echo print_r($result['tracks']); 
    */

?>
<div class="container mt-5">
        <?php 
        foreach ($result["tracks"]["items"] as $i){
            echo '
            <div class="card mx-3 my-2">
            <div class="card-header p-0">
            <img class="img-fluid m-0"
            src="'.$i["album"]["images"][0]["url"].'"
            alt="">
            </div>
            <div class="card-body">
            <h6>'.$i["album"]["name"].'</h6>
            <p>Artist: '.$i["album"]["artists"][0]["name"].'</p>
            <p>Release date: '.$i["album"]["release_date"].'</p>
            <p>Avalible: '.count($i["album"]["available_markets"]).'</p>
            </div>
            </div>';
        }
            ?>
    </div>
<style>
    .container{
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
    }
    .card{
        width: 300px;
    }
</style>
</body>

</html>