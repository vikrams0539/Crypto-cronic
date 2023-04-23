$(document).ready(function(){

    // Name Field validation
    $(document).on("keyup", "#inputPlaneFirstName", function(){
        let _this = $(this);

        if(firstNameFun()){
            $(_this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(_this).closest("div").find(".errorMessage").html("");         
        }
        else{
            $(_this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(_this).closest("div").find(".errorMessage").html("Enter Minmum 3 character");
        }
        submitBtnMe();
    })
    const firstNameFun = () =>{
        let FfirstNameField = $("#inputPlaneFirstName").val();
        FfirstNameField = FfirstNameField.replace(/\s+/g, " "); // Remove Extra white space
        if(FfirstNameField.replace(/\s+/g, '').length > 3){
            return true;
        }
        else{
            return false;
        }            
    }

    // Address Field validation
    $(document).on("keyup", "#inputPlaneAddress", function(){
        let _this = $(this);        
        if(inputPlaneAddress()){
            $(_this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(_this).closest("div").find(".errorMessage").html("");         
        }
        else{
            // $("#PlaneSubmit").Attr("disabled", "disabled");
            $(_this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(_this).closest("div").find(".errorMessage").html("Address Field Required Atleast 8 character");
        }
        submitBtnMe();
    })
    const inputPlaneAddress = () =>{
        let AddressField = $("#inputPlaneAddress").val();
        if(AddressField.length > 8){
            return true;
        }
        else{
            return false;
        }      
    }   

    // DOB Validation function
    $(document).on("keyup, change", "#inputPlaneDOB", function(){         

        if(inputPlaneDOB()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("Age More than 18 And less than 72 Years");
        }        
        submitBtnMe();
    })

    // DOB Validation function
    let inputPlaneDOB = () =>{
       let inputPlaneDOB = $("#inputPlaneDOB").val();

       dob = new Date(inputPlaneDOB);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));     

        if((age > 18) && (age < 72)){
            return true;
        }
       else{
            return false;
       }
    }  

    $(document).on("keyup", "#inputPlaneLicenseNo", function(){
        if(inputPlaneLicenseNo()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtnMe();
    })

    let inputPlaneLicenseNo = () =>{
        let inputPlaneLicenseNo = $("#inputPlaneLicenseNo").val();
        
        inputPlaneLicenseNo = inputPlaneLicenseNo.replace(/\s+/g, " "); // Remove Extra white space
        if(inputPlaneLicenseNo.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    } 

    // Name Field validation
    $(document).on("keyup, change", "#inputPlaneMedical", function(){
        let _this = $(this);

        if(inputPlaneMedical()){
            $(_this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(_this).closest("div").find(".errorMessage").html("");         
        }
        else{
            $(_this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(_this).closest("div").find(".errorMessage").html("Enter Minmum 3 character");
        }
        submitBtnMe();
    })

    const inputPlaneMedical = () =>{
        let inputPlaneMedical = $("#inputPlaneMedical").val();
        inputPlaneMedical = inputPlaneMedical.replace(/\s+/g, " "); // Remove Extra white space
        if(inputPlaneMedical.replace(/\s+/g, '').length > 3){
            return true;
        }
        else{
            return false;
        }            
    }

    $(document).on("keyup, change", "#inputPlaneSEP", function(){
        if(inputPlaneSEP()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtnMe();
    })

    let inputPlaneSEP = () =>{
        let inputPlaneSEP = $("#inputPlaneSEP").val();
        
        inputPlaneSEP = inputPlaneSEP.replace(/\s+/g, " "); // Remove Extra white space
        if(inputPlaneSEP.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    } 

    $(document).on("keyup, change", "#inputPlaneMEP", function(){
        if(inputPlaneMEP()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required & Enter Valid no");
        }        
        submitBtnMe();
    })

    let inputPlaneMEP = () =>{
        let inputPlaneMEP = $("#inputPlaneMEP").val();        
        inputPlaneMEP = inputPlaneMEP.replace(/\s+/g, " "); // Remove Extra white space
        if((inputPlaneMEP.replace(/\s+/g, '').length > 4)){
            return true;                
            }

        else{
            return false;
        }  
    }    


    $(document).on("keyup, change", "#inputPlaneIR", function(){
        if(inputPlaneIR()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtnMe();
    })

    let inputPlaneIR = () =>{
        let inputPlaneIR = $("#inputPlaneIR").val();
        
        inputPlaneIR = inputPlaneIR.replace(/\s+/g, " "); // Remove Extra white space
        if(inputPlaneIR.replace(/\s+/g, '').length > 5){
            return true;
        }
        else{
            return false;
        }  
    }    


    // Submit button Active
    let submitBtnMe = () =>{
        if( (firstNameFun()) && (inputPlaneMedical()) && (inputPlaneAddress()) && (inputPlaneSEP()) && (inputPlaneDOB()) &&(inputPlaneLicenseNo()) && (inputPlaneMEP()) &&(inputPlaneIR()) ){
            $("#planeSubmit").removeAttr("disabled", "disabled");
        }
        else{
            $("#planeSubmit").attr("disabled", "disabled");
        }
    }

    // pilot form Submit
    $(document).on("click","#planeSubmit", function(e){
        e.preventDefault();
        let formData = $("#planeForm").serialize();
       
        $(".loadingScreen").fadeIn();
        // Ajax 
        $.ajax({
            url: "Api/PlaneRegistrationApi.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(result){
                if(result.success == 1){ 
                    $(".response").html("<p>"+ result.message +"</p>").slideDown();                   
                    setTimeout( () =>{
                        $(".response").slideUp();
                        $(".loadingScreen").fadeOut();
                        $("#planeForm").trigger("reset");
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
        $("#inputPlaneDOB, #inputPlaneMedical, #inputPlaneSEP, #inputPlaneMEP, #inputPlaneIR").datepicker({
            changeYear: true,
            changeMonth: true,
            yearRange: '1950:2010',
        });
      } );
})