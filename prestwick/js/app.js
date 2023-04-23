$(document).ready(function(){

    // Navbar Bg color on scroll
    $(window).on("scroll", function(){
        let scrollTopPos = $(window).scrollTop();
        if(scrollTopPos > 0){
            // $(".navbar").animate({top: 0}, 100);   
            $(".navbar").addClass("bg-dark");       
        }
        else{
            // $(".navbar").animate({top: 80}, 100);
            $(".navbar").removeClass("bg-dark");
        }
    })

    // Name Field validation
    $(document).on("keyup", "#inputName", function(){
        let _this = $(this);

        if(nameFun()){
            $(_this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(_this).closest("div").find(".errorMessage").html("");         
        }
        else{
            $(_this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(_this).closest("div").find(".errorMessage").html("Enter Minmum 3 character");
        }
        submitBtn();
    })
    const nameFun = () =>{
        let nameField = $("#inputName").val();
        
        if(nameField.replace(/\s+/g, '').length > 3){
            return true;
        }
        else{
            return false;
        }            
    }

    // Address Field validation
    $(document).on("keyup", "#inputAddress", function(){
        let _this = $(this);        
        if(addressFun()){
            $(_this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(_this).closest("div").find(".errorMessage").html("");         
        }
        else{
            // $("#pilotSubmit").Attr("disabled", "disabled");
            $(_this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(_this).closest("div").find(".errorMessage").html("Address Field Required Atleast 8 character");
        }
        submitBtn();
    })
    const addressFun = () =>{
        let AddressField = $("#inputAddress").val();
       
        AddressField = AddressField.replace(/\s+/g, " "); // Remove Extra white space
        if(AddressField.replace(/\s+/g, '').length > 8){
            return true;
        }
        else{
            return false;
        }      
    }

    // DOB Validation function
    $(document).on("keyup, change", "#inputDOB", function(){         

        if(inputDOB()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("Age More than 18 And less than 72 Years");
        }        
        submitBtn();
    })

    // DOB Validation function
    let inputDOB = () =>{
       let inputDOB = $("#inputDOB").val();

       dob = new Date(inputDOB);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));     

        if((age > 18) && (age < 72)){
            return true;
        }
       else{
            return false;
       }
    }

    $(document).on("keyup", "#inputRefNo", function(){
        if(inputRefNo()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtn();
    })

    let inputRefNo = () =>{
        let inputRefNo = $("#inputRefNo").val();
        
        inputRefNo = inputRefNo.replace(/\s+/g, " "); // Remove Extra white space
        if(inputRefNo.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    }    

    $(document).on("keyup, change", "#inputSEP", function(){
        if(inputSEP()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtn();
    })

    let inputSEP = () =>{
        let inputSEP = $("#inputSEP").val();
        
        inputSEP = inputSEP.replace(/\s+/g, " "); // Remove Extra white space
        if(inputSEP.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    }    

    $(document).on("keyup, change", "#inputMEP", function(){
        if(inputMEP()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtn();
    })

    let inputMEP = () =>{
        let inputMEP = $("#inputMEP").val();
        
        inputMEP = inputMEP.replace(/\s+/g, " "); // Remove Extra white space
        if(inputMEP.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    }    

    $(document).on("keyup, change", "#inputMedicalClass1", function(){
        if(inputMedicalClass1()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtn();
    })

    let inputMedicalClass1 = () =>{
        let inputMedicalClass1 = $("#inputMedicalClass1").val();
        
        inputMedicalClass1 = inputMedicalClass1.replace(/\s+/g, " "); // Remove Extra white space
        if(inputMedicalClass1.replace(/\s+/g, '').length > 5){
            return true;
        }
        else{
            return false;
        }  
    }    

    $(document).on("keyup, change", "#inputMedicalClass2", function(){
        if(inputMedicalClass2()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtn();
    })

    let inputMedicalClass2 = () =>{
        let inputMedicalClass2 = $("#inputMedicalClass2").val();
        
        inputMedicalClass2 = inputMedicalClass2.replace(/\s+/g, " "); // Remove Extra white space
        if(inputMedicalClass2.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    }
   

    $(document).on("keyup, change", "#inputMedicalLAPL", function(){
        if(inputMedicalLAPL()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtn();
    })

    let inputMedicalLAPL = () =>{
        let inputMedicalLAPL = $("#inputMedicalLAPL").val();
        
        inputMedicalLAPL = inputMedicalLAPL.replace(/\s+/g, " "); // Remove Extra white space
        if(inputMedicalLAPL.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    }

    // Submit button Active
    let submitBtn = () =>{
        if( (nameFun()) && (addressFun()) && (inputDOB()) &&(inputRefNo()) && (inputSEP()) && (inputMEP()) &&(inputMedicalClass1()) && (inputMedicalClass2()) && (inputMedicalLAPL()) ){
            $("#pilotSubmit").removeAttr("disabled", "disabled");
        }
        else{
            $("#pilotSubmit").attr("disabled", "disabled");
        }
    }

    // pilot form Submit
    $(document).on("click","#pilotSubmit", function(e){
        e.preventDefault();
        let formData = $("#pilotForm").serialize();
       
        $(".loadingScreen").fadeIn();
        // Ajax 
        $.ajax({
            url: "Api/pilotRegistrationApi.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(result){
                if(result.success == 1){ 
                    $(".response").html("<p>"+ result.message +"</p>").slideDown();                   
                    setTimeout( () =>{
                        $(".response").slideUp();
                        $(".loadingScreen").fadeOut();
                        $("#pilotForm").trigger("reset");
                    }, 3000);                    
                }
                else{                    
                    $(".response").html("<p>"+ result.message +"</p>").slideDown();
                    setTimeout( () =>{
                        $(".response").slideUp();
                        $(".loadingScreen").fadeOut();
                    }, 3000)
                }
            }
        }

        )
    })

    // Jquery datePicker
    $( function() {
        $("#inputDOB, #inputSEP, #inputMEP, #inputMedicalClass1, #inputMedicalClass2, #inputMedicalLAPL").datepicker({
            changeYear: true,
            changeMonth: true,
        });
      } );
})