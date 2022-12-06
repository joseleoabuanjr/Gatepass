document.addEventListener("DOMContentLoaded", () => {
    const table1 = document.querySelector("#tbl1");
    const table2 = document.querySelector("#tbl2");
    const table3 = document.querySelector("#tbl3");
    const table4 = document.querySelector("#tbl4");
    
    document.querySelector("#tl1").addEventListener("click", (e) => {
        e.preventDefault();
        //hide
        table2.classList.remove("table2");
        table2.classList.add("table2--hidden");
        table3.classList.remove("table3");
        table3.classList.add("table3--hidden");
        table4.classList.remove("table4");
        table4.classList.add("table4--hidden");


        //show
        table1.classList.remove("table1--hidden");
        table1.classList.add("table1");
    });
    document.querySelector("#tl2").addEventListener("click", (e) => {
        e.preventDefault();
        //hide
        table1.classList.remove("table1");
        table1.classList.add("table1--hidden");
        table3.classList.remove("table3");
        table3.classList.add("table3--hidden");
        table4.classList.remove("table4");
        table4.classList.add("table4--hidden");


        //show
        table2.classList.remove("table2--hidden");
        table2.classList.add("table2");
    });
    document.querySelector("#tl3").addEventListener("click", (e) => {
        e.preventDefault();
        //hide
        table1.classList.remove("table1");
        table1.classList.add("table1--hidden");
        table2.classList.remove("table2");
        table2.classList.add("table2--hidden");
        table4.classList.remove("table4");
        table4.classList.add("table4--hidden");


        //show
        table3.classList.remove("table3--hidden");
        table3.classList.add("table3");
    });
    document.querySelector("#tl4").addEventListener("click", (e) => {
        e.preventDefault();
        //hide
        table1.classList.remove("table1");
        table1.classList.add("table1--hidden");
        table2.classList.remove("table2");
        table2.classList.add("table2--hidden");
        table3.classList.remove("table3");
        table3.classList.add("table3--hidden");

        //show
        table4.classList.remove("table4--hidden");
        table4.classList.add("table4");
    });
});