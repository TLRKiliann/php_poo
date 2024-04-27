//retrieve values from php
let php_var_player_1 = js_atk;
let php_var_player_2 = js_atk_2;
php_var_player_1 = parseInt(php_var_player_1);
php_var_player_2 = parseInt(php_var_player_2);

let totalLife = life_js;
let totalLife2 = life_js2;
totalLife = parseInt(totalLife);
totalLife2 = parseInt(totalLife2);

//retrieve atk by id
const btnAtk = document.getElementById("btn_atk");
const lblAtk = document.getElementById("lbl_atk");

//const btnAtk_2 = document.getElementById("btn_atk_2");
const lblAtk_2 = document.getElementById("lbl_atk_2");

//retrieve life by id
const lifephp_1 = document.getElementById('div-php');
const lifephp_2 = document.getElementById('div-php2');

//round player
const run_player = document.getElementById("round-player");

//square animation
const square = document.getElementById("square");

let currentPlayer = 1;
//change player
function changePlayer() {
    currentPlayer = currentPlayer === 1 ? 2 : 1;
    run_player.innerHTML = currentPlayer === 2 
        ? "It's computer's turn..." 
        : "It's your turn!";
}

//player atk on computer
function lifePlayerOne() {
    let total = totalLife2 - php_var_player_1;
    lifephp_2.innerHTML = `Life: ${total}`;
    if (total > 0) {
        changePlayer();
    } else {
        run_player.innerHTML = "Computer is dead - You WIN !"; 
    }
}

//atk computer
function lifeComputer() {
    let total = totalLife - php_var_player_2;
    lifephp_1.innerHTML = `Life: ${total}`;
    if (total > 0) {
        changePlayer();
    } else {
        run_player.innerHTML = "You lost - End of game !";
    }
}

function animationSquare() {
    square.classList.add('caller-js');
    setTimeout(() => {
        square.classList.remove('caller-js');
    }, 2000);
}

//atk computer
function automata_computer() {
    animationSquare();
    //php_var_player_2 += 50;
    php_var_player_2 += Math.floor(Math.random() * 20) + 1;
    lifeComputer();
    lblAtk_2.innerHTML = php_var_player_2;
}

//atk player 1
btnAtk.addEventListener("click", () => {
    animationSquare();
    //php_var_player_1 += 50;
    php_var_player_1 += Math.floor(Math.random() * 20) + 1;
    lifePlayerOne();
    lblAtk.innerHTML = php_var_player_1;
    let total = totalLife2 - php_var_player_1;
    if (total > 0) {
        setTimeout(automata_computer, 3000);
    } else {
        console.log("Computer dead");
    }
});
