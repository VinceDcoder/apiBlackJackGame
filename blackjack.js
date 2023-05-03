var dealerSum = 0;
var playerSum = 0;

var dealerAceCount = 0;
var playerAceCount = 0; 

var hidden;
var deck;

var wins = 0;

var canHit = true;

var totalScore = 1000;
var value_100 = document.getElementById("bet_100");
var value_200 = document.getElementById("bet_200");
var value_500 = document.getElementById("bet_500");
var value_1000 = document.getElementById("bet_1000");


window.onload = function loadGame(){
    buildDeck();
    shuffleDeck();
    startGame();
}

function buildDeck() {
    let values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    let types = ["C", "D", "H", "S"];
    deck = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + "-" + types[i]); 
        }
    }
}

function shuffleDeck() {
    for (let i = 0; i < deck.length; i++) {
        let j = Math.floor(Math.random() * deck.length);
        let temp = deck[i];
        deck[i] = deck[j];
        deck[j] = temp;
    }
}

function startGame() {
    hidden = deck.pop();
    dealerSum += getValue(hidden);
    dealerAceCount += checkAce(hidden);

    while (dealerSum < 17) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        dealerSum += getValue(card);
        dealerAceCount += checkAce(card);
        document.getElementById("dealer_cards").append(cardImg);
    }

    for (let i = 0; i < 2; i++) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        playerSum += getValue(card);
        playerAceCount += checkAce(card);
        document.getElementById("player_cards").append(cardImg);
        
    }

    document.getElementById("hit").addEventListener("click", hit);
    document.getElementById("stay").addEventListener("click", stay);


    document.getElementById("player_sum").append(playerSum);
}

function hit() {
    if (!canHit) {
        return;
    }

    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    playerSum += getValue(card);
    playerAceCount += checkAce(card);
    document.getElementById("player_cards").append(cardImg);
    document.getElementById("player_sum").innerText = playerSum;
    
    let message = "";

    if (reduceAce(playerSum, playerAceCount) > 21) {
        canHit = false;
        message = "You Lose!";
        
        document.getElementById("dealer_sum").innerText = dealerSum;
        document.getElementById("game_results").innerText = message;
        document.getElementById("display_results").style.display = "initial";

        document.getElementById("hidden").src = "./cards/" + hidden + ".png";
    }

    document.getElementById("player_sum").innerText = playerSum;
}

function stay() {
    dealerSum = reduceAce(dealerSum, dealerAceCount);
    playerSum = reduceAce(playerSum, playerAceCount);

    canHit = false;
    document.getElementById("hidden").src = "./cards/" + hidden + ".png";
    
    let message = "";

    if (playerSum > 21) {
        message = "You Lose!";
    }
    else if (dealerSum > 21) {
        message = "You win!";
        wins++;
        document.getElementById("display_results").style.display = "initial";
    }
    else if (playerSum == dealerSum) {
        message = "Tie!";
        document.getElementById("display_results").style.display = "initial";
    }
    //checks sums if both are greater than 21
    else if(playerSum > dealerSum){
        message = "You win!";
        wins++;
        document.getElementById("display_results").style.display = "initial";
    }
    else if(playerSum < dealerSum){
        message = "You Lose!";
        document.getElementById("display_results").style.display = "initial";
    }
    
    document.getElementById("dealer_sum").innerText = dealerSum;
    document.getElementById("player_sum").innerText = playerSum;

    document.getElementById("game_results").innerText = message;
    document.getElementById("number_of_wins").innerText = wins;

}

function getValue(card) {
    let data = card.split("-"); 
    let value = data[0];

    if (isNaN(value)) { 
        if (value == "A") {
            return 11;
        }
        return 10;
    }
    return parseInt(value);
}

function checkAce(card) {
    if (card[0] == "A") {
        return 1;
    }
    return 0;
}

function reduceAce(playerSum, playerAceCount) {
    while (playerSum > 21 && playerAceCount > 0) {
        playerSum -= 10;
        playerAceCount -= 1;
    }
    return playerSum;
}

function reloadGame(){
    playerAceCount = 0;
    playerSum = 0;

    dealerAceCount = 0;
    dealerSum = 0;

    canHit = true;

    // resets results pop-up
    document.getElementById("display_results").style.display = "none";

    // clears dealer and player hands
    document.getElementById("dealer_cards").innerHTML = "";
    document.getElementById("player_cards").innerHTML = "";

    // clears the sums
    document.getElementById("dealer_sum").innerHTML = "";
    document.getElementById("player_sum").innerHTML = "";

    // creates the hands for dealer
    let dealerHidden = document.createElement("img");
    dealerHidden.setAttribute("id","hidden");
    dealerHidden.setAttribute("src", "./cards/BACK.png");
    document.getElementById("dealer_cards").appendChild(dealerHidden);

    buildDeck();
    shuffleDeck();
    startGame();
}

function score(){
    var scoreValue = document.getElementById("bet_100").value;

    console.log(scoreValue);
}
