//retrieve values from php
let php_atk_player_1 = js_atk;
let php_atk_player_2 = js_atk_2;
php_atk_player_1 = parseInt(php_atk_player_1);
php_atk_player_2 = parseInt(php_atk_player_2);

//life of players
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

//display life in lbl
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

//random attack for both player
function attackFunc() {
    let calc = Math.floor(Math.random() * 40) + 1;
    return calc;
}

function computerUserStatus() {
    if (life_computer <= 0) {
        run_player.innerHTML = "You Win !";
        return;
    } else if (life_user <= 0) {
        run_player.innerHTML = "Game Over";
        return;
    } else {
        console.log("game continue");
    }
}

//---------------------------------------------Computer ATK----------------------------------------------------------

//---atk computer
function computer_atk() {
    let damage = attackFunc();
    php_atk_player_2 = damage;
    lblAtk_2.innerHTML = php_atk_player_2;
    life_user -= php_atk_player_2;
    displayer_life_1.innerHTML = `Life: ${life_user}`;
    computerUserStatus();
};

let active_dfs_user = 0;
let active_dfs_computer = 0;

//---------------------------------------------AUTOMATA----------------------------------------------------------

function randomComputerChoice() {
    let rand_number = Math.floor(Math.random() * 2) + 1;
    return rand_number;
}

let defense_computer_counter = 0;

function automata_compute() {
    changePlayer();
    animationSquare();
    let random = randomComputerChoice();
    if (random === 1) {
        if (active_dfs_user === 1) {
            let damage = attackFunc();
            php_atk_player_2 = Math.floor(damage / 4);
            console.log(php_atk_player_2, "attack number");
            lblAtk_2.innerHTML = php_atk_player_2;
            life_user -= php_atk_player_2;
            displayer_life_1.innerHTML = `Life: ${life_user}`;
            active_dfs_user = 0;
        } else {
            computer_atk();
        }
    } else if (random == 2) {
        defense_computer_counter++;
        if (defense_computer_counter > 3) {
            run_player.innerHTML = "No more defense (3 = max)";
            setTimeout(computer_atk, 3000);
        } else {
            active_dfs_computer = 1;
            dfs_computer.innerHTML = `${defense_computer_counter}`;
        }
    } else {
        console.log("Error random");
    }
}

//---------------------------------------------USER ATK----------------------------------------------------------

//atk from player one
function userAttaker() {
    animationSquare();
    changePlayer();
    if (active_dfs_computer === 1) {
        let damage = attackFunc();
        php_atk_player_1 = Math.floor(damage / 4);
        console.log(php_atk_player_1, "attack number against computer");
        lblAtk.innerHTML = php_atk_player_1;
        life_computer -= php_atk_player_1;
        displayer_life_2.innerHTML = `Life: ${life_computer}`;
        active_dfs_computer = 0;
        
        setTimeout(automata_compute, 3000);
    } else {
        let damage = attackFunc();
        php_atk_player_1 = damage;
        lblAtk.innerHTML = php_atk_player_1;
        life_computer -= php_atk_player_1;
        displayer_life_2.innerHTML = `Life: ${life_computer}`;

        setTimeout(automata_compute, 3000);
    }
    computerUserStatus();
};

btnAtk.addEventListener("click", () => userAttaker());

//---------------------------------------------USER DEFENSE----------------------------------------------------------

//dfs player one click
let count_dfs_player = 0;

function userDefense() {
    count_dfs_player++;
    animationSquare();
    changePlayer();
    if (count_dfs_player > 3) {
        run_player.innerHTML = "No more defense (3 = max)";
    } else {
        dfs_player_1.innerHTML = `${count_dfs_player}`;
        active_dfs_user = 1;
        if (life_computer >= 0) {
            setTimeout(automata_compute, 3000);
        } else {
            console.log("You are dead");
        }
    }
};

btn_dfs_user.addEventListener("click", () => userDefense());

//---refresh

refresher.addEventListener("click", () => {
    window.location.reload();
});
