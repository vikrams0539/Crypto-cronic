$(document).ready(function(){

    // Name Field validation
    $(document).on("keyup", "#inputMemberFirstName", function(){
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
        let FfirstNameField = $("#inputMemberFirstName").val();
        FfirstNameField = FfirstNameField.replace(/\s+/g, " "); // Remove Extra white space
        if(FfirstNameField.replace(/\s+/g, '').length > 3){
            return true;
        }
        else{
            return false;
        }            
    }
    // Name Field validation
    $(document).on("keyup", "#inputMemberLastName", function(){
        let _this = $(this);

        if(lastNameFun()){
            $(_this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(_this).closest("div").find(".errorMessage").html("");         
        }
        else{
            $(_this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(_this).closest("div").find(".errorMessage").html("Enter Minmum 3 character");
        }
        submitBtnMe();
    })

    const lastNameFun = () =>{
        let lastNameField = $("#inputMemberLastName").val();
        lastNameField = lastNameField.replace(/\s+/g, " "); // Remove Extra white space
        if(lastNameField.replace(/\s+/g, '').length > 3){
            return true;
        }
        else{
            return false;
        }            
    }

    // Address Field validation
    $(document).on("keyup", "#inputMemberAddress", function(){
        let _this = $(this);        
        if(inputMemberAddress()){
            $(_this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(_this).closest("div").find(".errorMessage").html("");         
        }
        else{
            // $("#membershipSubmit").Attr("disabled", "disabled");
            $(_this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(_this).closest("div").find(".errorMessage").html("Address Field Required Atleast 8 character");
        }
        submitBtnMe();
    })
    const inputMemberAddress = () =>{
        let AddressField = $("#inputMemberAddress").val();
        if(AddressField.length > 8){
            return true;
        }
        else{
            return false;
        }      
    }


    $(document).on("keyup", "#inputMemberPassNo", function(){
        if(inputMemberPassNo()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtnMe();
    })

    let inputMemberPassNo = () =>{
        let inputMemberPassNo = $("#inputMemberPassNo").val();
        
        inputMemberPassNo = inputMemberPassNo.replace(/\s+/g, " "); // Remove Extra white space
        if(inputMemberPassNo.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    }   

    $(document).on("keyup", "#inputMemberLicenseNo", function(){
        if(inputMemberLicenseNo()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtnMe();
    })

    let inputMemberLicenseNo = () =>{
        let inputMemberLicenseNo = $("#inputMemberLicenseNo").val();
        
        inputMemberLicenseNo = inputMemberLicenseNo.replace(/\s+/g, " "); // Remove Extra white space
        if(inputMemberLicenseNo.replace(/\s+/g, '').length > 4){
            return true;
        }
        else{
            return false;
        }  
    }    

    // DOB Validation function
    $(document).on("keyup, change", "#inputMemberDOB", function(){         

        if(inputMemberDOB()){            
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
    let inputMemberDOB = () =>{
       let inputMemberDOB = $("#inputMemberDOB").val();

       dob = new Date(inputMemberDOB);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));     

        if((age > 18) && (age < 72)){
            return true;
        }
       else{
            return false;
       }
    }

    $(document).on("keyup", "#inputMemberContact", function(){
        if(inputMemberContact()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required & Enter Valid no");
        }        
        submitBtnMe();
    })

    let inputMemberContact = () =>{
        let inputMemberContact = $("#inputMemberContact").val();        
        inputMemberContact = inputMemberContact.replace(/\s+/g, " "); // Remove Extra white space
        if((inputMemberContact.replace(/\s+/g, '').length > 4) && (!isNaN(inputMemberContact)) ){
            return true;                
            }

        else{
            return false;
        }  
    }    


    $(document).on("keyup", "#inputMemberEmail", function(){
        if(inputMemberEmail()){            
            $(this).css({"box-shadow": "rgba(44, 189, 4, 0.25) 0px 0px 0px 0.25rem"});
            $(this).closest("div").find(".errorMessage").html("");       
        }
        else{            
            $(this).css({"box-shadow": "0 0 0 .25rem rgba(253, 13, 13, 0.25)"});
            $(this).closest("div").find(".errorMessage").html("This Field Required");
        }        
        submitBtnMe();
    })

    let inputMemberEmail = () =>{
        let inputMemberEmail = $("#inputMemberEmail").val();
        
        inputMemberEmail = inputMemberEmail.replace(/\s+/g, " "); // Remove Extra white space
        if(inputMemberEmail.replace(/\s+/g, '').length > 5){
            return true;
        }
        else{
            return false;
        }  
    }    


    // Submit button Active
    let submitBtnMe = () =>{
        if( (firstNameFun()) && (lastNameFun()) && (inputMemberAddress()) && (inputMemberPassNo()) && (inputMemberDOB()) &&(inputMemberLicenseNo()) && (inputMemberContact()) &&(inputMemberEmail()) ){
            $("#membershipSubmit").removeAttr("disabled", "disabled");
        }
        else{
            $("#membershipSubmit").attr("disabled", "disabled");
        }
    }

    // pilot form Submit
    $(document).on("click","#membershipSubmit", function(e){
        e.preventDefault();
        let formData = $("#memberForm").serialize();
       
        $(".loadingScreen").fadeIn();
        // Ajax 
        $.ajax({
            url: "Api/memberRegistrationApi.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(result){
                if(result.success == 1){ 
                    $(".response").html("<p>"+ result.message +"</p>").slideDown();                   
                    setTimeout( () =>{
                        $(".response").slideUp();
                        $(".loadingScreen").fadeOut();
                        $("#memberForm").trigger("reset");
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
        $("#inputMemberDOB").datepicker({
            changeYear: true,
            changeMonth: true,
            yearRange: '1950:2010',
        });
      } );
})