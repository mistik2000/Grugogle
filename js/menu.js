let toggleBurger = document.querySelector(".header__menu-burger")
let menu = document.querySelector(".header__list")
console.log(menu);

toggleBurger.addEventListener("click", () => {
    console.log('нажал');

    if (menu.classList.contains("header__list_show")) {
        menu.classList.remove("header__list_show")
    } else {
        menu.classList.add("header__list_show")
    }
})