//retrieve values from php
let php_var_player_1 = js_atk;
let php_var_player_2 = js_atk_2;

let totalLife = life_js;
let totalLife2 = life_js2;

//retrieve atk by id
const btnAtk = document.getElementById("btn_atk");
const lblAtk = document.getElementById("lbl_atk");

const btnAtk_2 = document.getElementById("btn_atk_2");
const lblAtk_2 = document.getElementById("lbl_atk_2");

//retrieve life by id
const lifephp_1 = document.getElementById('div-php');
const lifephp_2 = document.getElementById('div-php2');

//round player
const run_player = document.getElementById("round-player");

//square animation
const square = document.getElementById("square");

//display player turn
function changePlayer() {
    run_player.innerHTML = "It's computer's turn";
}

function changePlayer2() {
    run_player.innerHTML = "It's your turn";
}

let count = 0;
function lifePlayerOne() {
    let total = totalLife - php_var_player_1;
    lifephp_1.innerHTML = `Life: ${total}`;
    count++;
    if (count === 1) {
        changePlayer();
        count = 0;
    }
}

let count2 = 0;
function lifePlayerTwo() {
    let total2 = totalLife2 - php_var_player_2;
    lifephp_2.innerHTML = `Life: ${total2}`;
    count2++;
    if (count2 === 1) {
        changePlayer2();
        count2 = 0;
    }
}

function animationSquare() {
    square.classList.add('caller-js');
    //square.style.transform = "translateX(800px)";
    setTimeout(() => {
        square.classList.remove('caller-js');
        //square.style.transform = "translateX(0px)";
    }, 2000);
}


//atk player 1
btnAtk.addEventListener("click", () => {
    animationSquare();
    php_var_player_1++;
    lifePlayerOne();
    lblAtk.innerHTML = php_var_player_1;
});

//atk computer
btnAtk_2.addEventListener("click", () => {
    animationSquare();
    php_var_player_2++;
    lifePlayerTwo();
    lblAtk_2.innerHTML = php_var_player_2;
});




//transform: translateX(0px);

//transform: translateX(800px);