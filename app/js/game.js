//retrieve values from php
let php_atk_player_1 = js_atk;
let php_atk_player_2 = js_atk_2;
php_atk_player_1 = parseInt(php_atk_player_1);
php_atk_player_2 = parseInt(php_atk_player_2);

let totalLife = life_js;
let totalLife2 = life_js2;
totalLife = parseInt(totalLife);
totalLife2 = parseInt(totalLife2);

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

//---atk

//player one atk on computer
function lifePlayerOne() {
    let total = totalLife2 - php_atk_player_1; //total life cp 2 - atk player 1
    displayer_life_2.innerHTML = `Life: ${total}`;
    if (total > 0) {
        changePlayer();
    } else {
        run_player.innerHTML = "Computer is dead - You WIN !"; 
    }
}

//atk computer on player one
// il faut reprendre cette function avec 0 !!!

let var_dfs_player = false;

function lifeComputer() {
    let total;
    if (var_dfs_player === false) {
        total = totalLife - php_atk_player_2;
    } else {
        total = totalLife - php_atk_player_2;
        console.log("var_dfs_player", var_dfs_player);
        var_dfs_player = false;
        console.log("var_dfs_player", var_dfs_player);
    }
    displayer_life_1.innerHTML = `Life: ${total}`;
    if (total > 0) {
        changePlayer();
    } else {
        run_player.innerHTML = "You lost - End of game !";
    }
}

//---defense computer

let defense_dfs_computer = 0;
let var_dfs_compute = false;

function computer_atk() {
    console.log("atk - computer");
    animationSquare();
    //php_atk_player_2 += 50;
    php_atk_player_2 += Math.floor(Math.random() * 20) + 1;
    lifeComputer();
    lblAtk_2.innerHTML = php_atk_player_2; //affiche atk cpu
}

//autmatically random atk vs dfs
function automata_compute() {
    let random = Math.floor(Math.random() * 2) + 1;
    if (random === 1) {
        computer_atk();
    } else if (random == 2) {
        defense_dfs_computer++;
        let total = totalLife2 - php_atk_player_1;
        console.log("dfs - computer");
        var_dfs_compute = true;

        if (defense_dfs_computer > 3) {
            run_player.innerHTML = "No more defense (3 = max)";
            setTimeout(() => {
                computer_atk();
            }, 2000);
        } else {
            dfs_computer.innerHTML = `${defense_dfs_computer}`; //ici
            console.log("total...", total);
            if (total > 0) {
                changePlayer();
                animationSquare();
                console.log("computer atk 2");
            } else {
                console.log("Computer dead");
            }
        }
    }
}

//computer's life depends of atk from player
function playerCannotAtk() {
    let total = totalLife2 - php_atk_player_1;
    displayer_life_2.innerHTML = `Life: ${total}`; //life compute
    if (total > 0) {
        changePlayer();
        var_dfs_compute = false;
    } else {
        run_player.innerHTML = "Computer is dead - You WIN !"; 
    }
}

//atk from player one
btnAtk.addEventListener("click", () => {
    if (var_dfs_compute === false) {
        animationSquare();
        //php_atk_player_1 += 50;
        php_atk_player_1 += Math.floor(Math.random() * 20) + 1;
        lifePlayerOne();
        lblAtk.innerHTML = php_atk_player_1;
        let total = totalLife2 - php_atk_player_1;
        if (total > 0) {
            setTimeout(automata_compute, 3000);
        } else {
            console.log("Computer dead");
        }
    } else {
        animationSquare();
        playerCannotAtk();
    }
});

//---defense player one

let count_dfs_player = 0;

//dfs player one click
btn_dfs_user.addEventListener("click", () => {
    let total = totalLife - php_atk_player_2;
    //displayer_life_1.innerHTML = `Life: ${total}`; //life player one
    count_dfs_player++;
    if (count_dfs_player > 3) {
        run_player.innerHTML = "No more defense (3 = max)";
    } else {
        dfs_player_1.innerHTML = `${count_dfs_player}`;
        if (total > 0) {
            //changePlayer();
            var_dfs_player = true;
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


//dfs player ok mais pas le score trbl