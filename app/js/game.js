//retrieve values from php
let php_atk_player_1 = js_atk;
let php_atk_player_2 = js_atk_2;
php_atk_player_1 = parseInt(php_atk_player_1);
php_atk_player_2 = parseInt(php_atk_player_2);

let life_user = life_js;
let life_computer = life_js2;
life_user = parseInt(life_user); 
life_computer = parseInt (life_computer);

//dfs player one
const btn_dfs_user = document.getElementById("btn_dfs_1");
const dfs_player_1 = document.getElementById("lbl_dfs_1");
const dfs_computer = document.getElementById("lbl_dfs_2");

//retrieve atk by id
const btnAtk = document.getElementById("btn_atk");
const lblAtk = document.getElementById("lbl_atk");
const lblAtk_2 = document.getElementById("lbl_atk_2");

//retrieve life by id
const displayer_life_1 = document.getElementById('div-php');
const displayer_life_2 = document.getElementById('div-php2');

//display message player
const run_player = document.getElementById("round-player");
const square = document.getElementById("square");
const refresher = document.getElementById("btn-refresh");

//---animation

function animationSquare() {
    square.classList.add('caller-js');
    setTimeout(() => {
        square.classList.remove('caller-js');
    }, 2000);
}

//---change player

let currentPlayer = 1;

function changePlayer() {
    currentPlayer = currentPlayer === 1 ? 2 : 1;
    run_player.innerHTML = currentPlayer === 2 
        ? "It's computer's turn..." 
        : "It's your turn!";
}

//---------------------------------------------Computer ATK----------------------------------------------------------

let shield_user = false;
let shield_computer = false;

//life player 1
function shieldProtector() {
    shield_user = false;
    if (shield_computer === true) {
        shield_computer = false;
        automata_compute();
    }
    shield_computer = false;
    animationSquare();
    changePlayer();
}

//---------------------------------------------Computer ATK----------------------------------------------------------

//---atk computer
function computer_atk() {
    //php_atk_player_2 += 50;
    php_atk_player_2 += Math.floor(Math.random() * 20) + 1;
    lblAtk_2.innerHTML = php_atk_player_2;
    let total = life_user - php_atk_player_2;
    displayer_life_1.innerHTML = `Life: ${total}`;
    if (total > 0) {
        animationSquare();
        changePlayer();
    } else {
        run_player.innerHTML = "You loose - End of game !";
    } 
};

//---------------------------------------------AUTOMATA----------------------------------------------------------

//autmatically random atk vs dfs
let defense_computer_counter = 0;

function automata_compute() {
    let random = Math.floor(Math.random() * 2) + 1;
    if (random === 1) {
        shield_user === false ? computer_atk() : shieldProtector();
    } else if (random == 2) {
        defense_computer_counter++;
        shield_computer = true;
        if (defense_computer_counter > 3) {
            run_player.innerHTML = "No more defense (3 = max)";
            setTimeout(computer_atk, 3000);
        } else {
            dfs_computer.innerHTML = `${defense_computer_counter}`;
            animationSquare();
            changePlayer();
        }
    }
}

//---------------------------------------------USER ATK----------------------------------------------------------

//atk from player one
function userAttaker() {
    animationSquare();
    changePlayer();
    //php_atk_player_1 += 50;
    php_atk_player_1 += Math.floor(Math.random() * 20) + 1;
    lblAtk.innerHTML = php_atk_player_1;
    let total = life_computer - php_atk_player_1;
    displayer_life_2.innerHTML = `Life: ${total}`;
    if (total >= 0) {
        setTimeout(automata_compute, 3000);
    } else {
        run_player.innerHTML = "You Win !";
    }
};

btnAtk.addEventListener("click", () => {
    shield_computer === false ? userAttaker() : shieldProtector(); 
});

//---------------------------------------------USER DEFENSE----------------------------------------------------------

//dfs player one click
let count_dfs_player = 0;

btn_dfs_user.addEventListener("click", () => {    
    count_dfs_player++;
    shield_user = true;
    if (count_dfs_player > 3) {
        run_player.innerHTML = "No more defense (3 = max)";
    } else {
        dfs_player_1.innerHTML = `${count_dfs_player}`;
        let total = life_computer - php_atk_player_1;
        if (total > 0) {
            animationSquare();
            changePlayer();
            setTimeout(automata_compute, 3000);
        } else {
            console.log("You are dead");
        }
    }
});

//---refresh

refresher.addEventListener("click", () => {
    window.location.reload();
});
