$(function(){
    
    let withBlur = document.querySelector(".without-blur-2");
    let offsetVal = $(withBlur).offset().top;
    const signUpDiv = document.querySelector(".signUp-form-outlet");
    const popUpParent = document.querySelector(".signUp-form-outlet");
// console.warn(popUpParent)
    // On scroll
    window.addEventListener("scroll", () =>{
        if(window.pageYOffset > offsetVal - 200){
            withBlur.classList.add("with-blur");            
            signUpDiv.classList.add("showPopup");            
        }
        else{            
            signUpDiv.classList.remove("showPopup");
            withBlur.classList.remove("with-blur");
            popUpParent.classList.remove("signUp-form-close");
        }
    })

    // close Pop Up
    $(document).on("click", ".signUp-close", () =>{
        $(popUpParent).addClass("signUp-form-close");
    })

    // signUp email form validation
    $("#email-form").submit(function(e){
        e.preventDefault();
        const _uName = $("#u_name").val();
        const _u_phone = $("#u_phone").val();
        const _u_email = $("#u_email").val();
        const _u_pass = $("#u_pass").val();
        
        signupFun(_uName, _u_phone, _u_email, _u_pass );
        
    })

    const signupFun = (fName, phone, email, pass) =>{
        var emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,7}\b$/i;
        const formData = {
            name: fName,
            phone_no: phone,
            email: email,
            password: pass,
            
        }
        if(fName == ""){
            $(".w-form-fail").html("Name Field required").fadeIn();
            return false;
        }
       else if(fName.replace(/\s+/g, '').length <= 3){
            $(".w-form-fail").html("Enter Atleast 4 Character").fadeIn();
            return false;
        }
        else if(phone == ""){            
            $(".w-form-fail").html("Phone Field required").fadeIn();
            return false;
        }
       else  if(email == ""){
            $(".w-form-fail").html("Email Field required").fadeIn();
            return false;
        }
            
        else if(!emailPattern.test(email)){
            $(".w-form-fail").html("Enter Valid Email Address").fadeIn();
            return false;
        }
        else if(pass == ""){
            $(".w-form-fail").html("Password Field required").fadeIn();
            return false;
        }
        else if(pass.replace(/\s+/g, '').length <= 6){
            $(".w-form-fail").html("Password length not less than 6 Char").fadeIn();
            return false;
        }
        else{            
            $(".w-form-fail").html("").fadeOut();
            $.ajax({
                url: "http://sccforyou.com/api_/signUpForm.php",
                type: "POST",
                data: formData,
                dataType: 'json',
                success: function(data){
                    // let jsonString =  JSON.parse(data);
                    console.warn("Success", data)
                    if(data.status == false){
                        $(".w-form-fail").fadeIn().html(data.message);
                    }
                    else{
                        $(".w-form-done").fadeIn().html(data.message);
                        $("#email-form").trigger("reset");
                    }         
                }
            })
        }
    }   
})