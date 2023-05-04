$(function(){
    
    let withBlur = document.querySelector(".without-blur-2");
    let offsetVal = $(withBlur).offset().top;
    const signUpDiv = document.querySelector(".signUp-form-outlet");
    const signUpClose = document.querySelector(".signUp-close");
    // On scroll
    window.addEventListener("scroll", () =>{
        if(window.pageYOffset > offsetVal - 200){
            signUpDiv.classList.add("showPopup");
            withBlur.classList.add("with-blur");
        }
        else{            
            signUpDiv.classList.remove("showPopup");
            withBlur.classList.remove("with-blur");
        }
    })
    let closePopupFun = () =>{
        signUpClose.addEventListener("click", () =>{
            $(this).addClass("signUp-form-close");
        })
    }
})