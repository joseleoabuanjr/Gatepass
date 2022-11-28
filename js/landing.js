document.addEventListener("DOMContentLoaded", () => {
    const login1 = document.querySelector("#login1");
    const register1 = document.querySelector("#register1");
    const s = document.querySelector("#student1");
    const em = document.querySelector("#employee1");
    const v = document.querySelector("#visitor1");
    const moveBtn = document.querySelector(".moveBtn");
    const moveBtn2 = document.querySelector(".moveBtn2");
    const moveBtn3 = document.querySelector(".moveBtn3");

    document.querySelector("#actionBtn_login").addEventListener("click", (e) => {
    e.preventDefault();
        moveBtn.classList.remove("rightBtn");
        
        moveBtn.innerHTML="LOGIN";
        
        //hide
        register1.classList.remove("regcontain");
        register1.classList.add("regcontain--hidden");

        //show
        login1.classList.remove("lgcontain--hidden");
        login1.classList.add("lgcontain");
        });

    document.querySelector("#actionBtn_register").addEventListener("click", (e) => {
        e.preventDefault();
            //move 
            moveBtn.classList.add("rightBtn");
            moveBtn.innerHTML="REGISTER";

            //hide
            login1.classList.remove("lgcontain");
            login1.classList.add("lgcontain--hidden");
    
            //show
            register1.classList.remove("regcontain--hidden");
            register1.classList.add("regcontain");
            });
    
    document.querySelector("#studentBtn").addEventListener("click", (e) => {
        e.preventDefault();
            moveBtn2.classList.remove("rightBtn2");
            moveBtn2.classList.remove("rightBtn");
            moveBtn2.innerHTML="STUDENT";

            //hide
            login1.classList.remove("lgcontain");
            login1.classList.add("lgcontain--hidden");

            em.classList.remove("employeecon");
            em.classList.add("employeecon--hidden");

            v.classList.remove("visitorcon");
            v.classList.add("visitorcon--hidden");
    
            //show

            s.classList.remove("studentcon--hidden");
            s.classList.add("studentcon");
            });

    document.querySelector("#employeeBtn").addEventListener("click", (e) => {
        e.preventDefault();
            moveBtn2.classList.remove("rightBtn2");
            moveBtn2.classList.add("rightBtn");
            moveBtn2.innerHTML="EMPLOYEE";
            //hide
            login1.classList.remove("lgcontain");
            login1.classList.add("lgcontain--hidden");

            s.classList.remove("studentcon");
            s.classList.add("studentcon--hidden");

            v.classList.remove("visitorcon");
            v.classList.add("visitorcon--hidden");
    
            //show

            em.classList.remove("employeecon--hidden");
            em.classList.add("employeecon");
            });

    document.querySelector("#visitorBtn").addEventListener("click", (e) => {
        e.preventDefault();
            moveBtn2.classList.remove("rightBtn");
            moveBtn2.classList.add("rightBtn2");
            moveBtn2.innerHTML="VISITOR";
            //hide
            login1.classList.remove("lgcontain");
            login1.classList.add("lgcontain--hidden");

            em.classList.remove("employeecon");
            em.classList.add("employeecon--hidden");

            s.classList.remove("studentcon");
            s.classList.add("studentcon--hidden");
    
            //show

            v.classList.remove("visitorcon--hidden");
            v.classList.add("visitorcon");
            });
});