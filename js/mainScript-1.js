document.addEventListener("DOMContentLoaded", () => {
    const tab1 = document.querySelector("#tab1");
    const tab2 = document.querySelector("#tab2");
    const tab3 = document.querySelector("#tab3");
    const other1 = document.querySelector("#cont1");

    document.querySelector("#ta1").addEventListener("click",(e) => {
        e.preventDefault();
        //hide
        tab2.classList.remove("tab2");
        tab2.classList.add("tab2--hidden");
        tab3.classList.remove("tab3");
        tab3.classList.add("tab3--hidden");

        //show
        tab1.classList.remove("tab1--hidden");
        tab1.classList.add("tab1");
    });
    document.querySelector("#ta2").addEventListener("click", (e) => {
        e.preventDefault();
        //hide
        tab1.classList.remove("tab1");
        tab1.classList.add("tab1--hidden");
        tab3.classList.remove("tab3");
        tab3.classList.add("tab3--hidden");

        //show
        tab2.classList.remove("tab2--hidden");
        tab2.classList.add("tab2");
    });
    document.querySelector("#ta3").addEventListener("click", (e) => {
        e.preventDefault();
        //hide
        tab1.classList.remove("tab1");
        tab1.classList.add("tab1--hidden");
        tab2.classList.remove("tab2");
        tab2.classList.add("tab2--hidden");


        //show
        tab3.classList.remove("tab3--hidden");
        tab3.classList.add("tab3");
    });
    document.querySelector("#rd1").addEventListener("click", (e) => {
        //hide
        other1.classList.remove("cont");
        other1.classList.add("cont--hidden");
        //show
        
    });
    document.querySelector("#rd2").addEventListener("click", (e) => {
        //hide
        other1.classList.remove("cont");
        other1.classList.add("cont--hidden");
        //show
        
    });
    document.querySelector("#rd3").addEventListener("click", (e) => {
        //hide
    
        //show
        other1.classList.remove("cont--hidden");
        other1.classList.add("cont");
    });
});
