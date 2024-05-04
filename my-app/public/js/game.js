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

//atk action btn
const btnAtk_user = document.getElementById("btn_atk_user");
const lblAtk_user = document.getElementById("lbl_atk_user");

const lblAtk_computer = document.getElementById("lbl_atk_computer");

//heal action btn
const btn_heal_user = document.getElementById('btn_heal_user');
const lbl_heal_user = document.getElementById("lbl_heal_user");

const lbl_heal_computer = document.getElementById("lbl_heal_computer");

//dfs action btn
const btn_dfs_user = document.getElementById("btn_dfs_user");
const dfs_player_user = document.getElementById("lbl_dfs_user");

const dfs_computer = document.getElementById("lbl_dfs_computer");

//display life in lbl
const displayer_life_user = document.getElementById('div-php');
const displayer_life_computer = document.getElementById('div-php2');

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

//---random attack for both player

function attackFunc() {
    let calc = Math.floor(Math.random() * 40) + 1;
    return calc;
}

//---display final result or game continue

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
    lblAtk_computer.innerHTML = `${php_atk_player_2}`; //to verify !!!
    life_user -= php_atk_player_2;
    displayer_life_user.innerHTML = `Life: ${life_user}`;
    computerUserStatus();
};

let active_dfs_user = 0;
let active_dfs_computer = 0;

//--AUTOMATA (automatic computer decision)

function randomComputerChoice() {
    let rand_number = Math.floor(Math.random() * 3) + 1;
    return rand_number;
}

let defense_computer_counter = 0;
let count_heal_computer = 0;

function automata_compute() {
    if (life_computer > 0) {
        changePlayer();
        animationSquare();
        let random = randomComputerChoice();
        if (random === 1) {
            if (active_dfs_user === 1) {
                let damage = attackFunc();
                php_atk_player_2 = Math.floor(damage / 4);
                console.log(php_atk_player_2, "player_2 atk/4");
                lblAtk_computer.innerHTML = `${php_atk_player_2}`; // to verify !!!
                life_user -= php_atk_player_2;
                displayer_life_user.innerHTML = `Life: ${life_user}`;
                active_dfs_user = 0;
            } else {
                computer_atk();
            }
        } else if (random === 2) {
            defense_computer_counter++;
            if (defense_computer_counter > 3) {
                run_player.innerHTML = "No more defense (3 = max)";
                setTimeout(() => { 
                    animationSquare();
                    computer_atk();
                }, 3000);
            } else {
                active_dfs_computer = 1;
                dfs_computer.innerHTML = `${defense_computer_counter}`;
            }
        } else if (random === 3) {
            count_heal_computer++;
            if (count_heal_computer > 1) {
                run_player.innerHTML = "No more heal ! (computer)";
                setTimeout(() => { 
                    animationSquare();
                    computer_atk();
                }, 3000);
            } else {
                count_heal_computer = 1;
                lbl_heal_computer.innerHTML = `${count_heal_computer}`;
                life_computer += 20;
                displayer_life_computer.innerHTML = `Life: ${life_computer}`;
            }
        } else {
            console.log("Error random");
        }
    } else {
        console.log("Computer is dead");
    }
}

//---------------------------------------------USER ATK----------------------------------------------------------

//---atk from player one

function userAttaker() {
    animationSquare();
    changePlayer();
    if (active_dfs_computer === 1) {
        let damage = attackFunc();
        php_atk_player_1 = Math.floor(damage / 4);
        console.log(php_atk_player_1, "player_1 atk/4");
        lblAtk_user.innerHTML = `${php_atk_player_1}`;
        life_computer -= php_atk_player_1;
        displayer_life_computer.innerHTML = `Life: ${life_computer}`;
        active_dfs_computer = 0;
        setTimeout(automata_compute, 3000);
    } else {
        let damage = attackFunc();
        php_atk_player_1 = damage;
        lblAtk_user.innerHTML = `${php_atk_player_1}`;
        life_computer -= php_atk_player_1;
        displayer_life_computer.innerHTML = `Life: ${life_computer}`;
        setTimeout(automata_compute, 3000);
    }
    computerUserStatus();
};

btnAtk_user.addEventListener("click", () => userAttaker());

//---------------------------------------------USER HEAL----------------------------------------------------------

let count_heal_user = 0;

function userHeal() {
    count_heal_user++;
    animationSquare();
    changePlayer();
    if (count_heal_user > 1) {
        run_player.innerHTML = "No more heal !";
    } else {
        lbl_heal_user.innerHTML = `${count_heal_user}`;
        life_user += 20;
        displayer_life_user.innerHTML = `Life: ${life_user}`;
        if (life_computer >= 0) {
            setTimeout(automata_compute, 3000);
        }
    }
};

btn_heal_user.addEventListener("click", () => userHeal());


//---------------------------------------------USER DEFENSE----------------------------------------------------------

//---dfs player one click

let count_dfs_player = 0;

function userDefense() {
    count_dfs_player++;
    animationSquare();
    changePlayer();
    if (count_dfs_player > 3) {
        run_player.innerHTML = "No more defense (3 = max)";
    } else {
        dfs_player_user.innerHTML = `${count_dfs_player}`;
        active_dfs_user = 1;
        if (life_computer >= 0) {
            setTimeout(automata_compute, 3000);
        }
    }
};

btn_dfs_user.addEventListener("click", () => userDefense());

//---refresh (at the end of game)

refresher.addEventListener("click", () => {
    window.location.reload();
});
