let Poll = document.querySelector(".rating-area");
let div = document.querySelector(".div2");

Poll.addEventListener("click", () => {
    Poll.classList.add("close");
    div.classList.replace("div2", "div1")
});


