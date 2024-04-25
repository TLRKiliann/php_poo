// retrieve values from php
let php_var_player_1 = js_variable;
console.log(php_var_player_1);

let php_var_player_2 = js_variable_2;
console.log(php_var_player_1);

const btnAtk = document.getElementById("btn_atk");
const lblAtk = document.getElementById("lbl_atk");

const btnAtk_2 = document.getElementById("btn_atk_2");
const lblAtk_2 = document.getElementById("lbl_atk_2");

// amount atk player 1
btnAtk.addEventListener("click", () => {
    php_var_player_1++;
    lblAtk.innerHTML = php_var_player_1;
});

// amount atk player 2
btnAtk_2.addEventListener("click", () => {
    php_var_player_2++;
    lblAtk_2.innerHTML = php_var_player_2;
});

