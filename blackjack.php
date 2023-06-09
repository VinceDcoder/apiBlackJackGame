<?php
require_once "./SQL/sqlTools.php";
require_once "./validate.php";
$postTarget = htmlspecialchars($_SERVER['PHP_SELF']);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['name'])){
        $user;
        $errors = [];
         foreach($_POST as $key => $value){
             $user[$key] = cleanData($value);
         }

        if(!validName($user['name'])){
        $errors['name']= "Only use alphabet and numbers";
         }

        if(empty($errors)){
        addUser($user);
        console.log($user);
        }
    }


}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Black Jack</title>
        <link rel="stylesheet" href="blackjack.css">
        <script src="blackjack.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>

    <body>
        <h1 id="game_name">Jack Black's Black Jack</h1>
        <audio id="peaches_audio" loop autoplay src="./musicFiles/peaches.mp3"></audio>
        <div id="jbTable">
            <div class="column">
                <h2 id="score_header">Score: $<span id="total_score_display"></span></h2> 

                <button class="chips" id="bet_100" value="100">100</button>
                <button class="chips" id="bet_200" value="200">200</button>
                <button class="chips" id="bet_500" value="500">500</button>
                <button class="chips" id="bet_1000" value="1000">1000</button>
            </div>
            <div class="column">
                    <h2>Dealer: <span id="dealer_sum"></span></h2>
                    <div id="dealer_cards">
                        <img id="hidden" src="./cards/BACK.png">
                    </div>
        
                    <h2>You: <span id="player_sum"></span></h2>
                    <div id="player_cards"></div>
                    <br>
        
                    <button id="hit">Hit</button>
                    <button id="stay">Stay</button> 
                    <br>           
                    <a id="highscore" href="./highscores.php">High Scores</a>
            </div>
            <div class="column">
                <h2 id="player_bet_header">You Bet: $<span id="player_bet_display"></span></h2> 
                <br>
                <h2 id="player_results_header"><span id="player_results_display"></span></h2> 
            </div>
        </div>
        <div id="display_results" style="display: none"> 
            <p id="game_results"></p>
            <p>Wins: <span id="number_of_wins"></span></p>
            <button id="try_again" onclick="reloadGame()">Try Again</button>
        </div>    

    </body>
</html>

<?php
    $data = json_decode(file_get_contents("php://input"), true);
    addScore($data['score']);
?>