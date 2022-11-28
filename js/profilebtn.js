document.addEventListener("DOMContentLoaded", () => {
    const tab1 = document.querySelector("#tab1");
    const tab2 = document.querySelector("#tab2");
    const tab3 = document.querySelector("#tab3");
    document.querySelector("#t4").addEventListener("click", (e) => {
        e.preventDefault();
        //hide
        tab3.classList.remove("tab3");
        tab3.classList.add("tab3--hidden");

        //show
        tab2.classList.remove("tab2--hidden");
        tab2.classList.add("tab2");
    }); 
});