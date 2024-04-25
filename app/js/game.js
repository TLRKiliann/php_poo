let value = 0;
let value_2 = 0;

const btnAtk = document.getElementById("btn_atk");
const lblAtk = document.getElementById("lbl_atk");

const btnAtk_2 = document.getElementById("btn_atk_2");
const lblAtk_2 = document.getElementById("lbl_atk_2");

btnAtk.addEventListener("click", () => {
    value++;
    lblAtk.innerHTML = value;
});

btnAtk_2.addEventListener("click", () => {
    value_2++;
    lblAtk_2.innerHTML = value_2;
});



