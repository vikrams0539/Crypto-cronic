$(document).ready(function(){
    // Filter the dashboard database
    $(document).on("click",".buttonStyle", function(e){
        e.preventDefault();
        let dataAttr = $(this).attr("data-items");

        // add active class
        $(this).addClass("active").siblings().removeClass("active");

        $(".displayRecord>table").closest(`#${dataAttr}`).addClass("active").siblings().removeClass("active");
        // if($(".displayRecord>table").is(`#${dataAttr}`)){
        //     // $(".displayRecord>table").addClass("active");
        // }
        // else{
            
        //     // $(".displayRecord>table").removeClass("active");
        // }
    })

    // Action div 
    $(document).on("click", ".actionBtn", function(){
        $(this).closest("tr").siblings().find(".actionDiv").slideUp();
        $(this).next(".actionDiv").slideDown(1000);
    })
    $(document).on("click", ".stopAction", function(){
        $(this).closest(".actionDiv").slideUp();
    })

    // Select all on check box
    $(document).on("click", ".PilotFilterCheckBox", function(){
        if(this.checked){
            $('#Pilots>tbody>tr>td>input[type=checkbox]').each(function(){
                this.checked = true;
            });
        }else{
             $('#Pilots>tbody>tr>td>input[type=checkbox]').each(function(){
                this.checked = false;
            });
        }
    })


    // edit Pilot Record
    $(document).on("click","#editPilotRow", function(e){
        e.preventDefault();
        let getId = $(this).attr("data-pilotEditId");
        let this_ = $(this);
        
        $.ajax({
            url: "adminApi/pilot-record-edit.php",
            type: "GET",
            data: {pilot_id: getId},
            success: function(result){
                console.log("result"+result);
                if(result){
                    $("#pilotModal .modal-body").html(result);
                }
                else{
                    $("#pilotModal .modal-body").html("<h4>No Record Found</h4>");
                }
            }
        })
    })

    // Delete Pilot Record    
    $(document).on("click","#delPilotRow", function(e){
        e.preventDefault();
        let getId = $(this).attr("data-pilotId");
        let this_ = $(this);
       if(confirm("are Yor sure delete this Reco")){
            $.ajax({
                url: "adminApi/pilot-record-del.php",
                type: "GET",
                dataType: "json",
                data: {pilot_id: getId},
                success: function(result){
                    if(result.success == 1){
                        $("#successMessage").html(`<span id="closeMessage">X</span>${result.message}`).fadeIn();
                        $(this_).closest("tr").fadeOut();
                    }
                    else{
                        $("#successMessage").html(`<span id="closeMessage">X</span>${result.message}`).fadeIn();
                    }
                }
            })
       }
    })
    
    // edit Member Record
    $(document).on("click","#editmemberRow", function(e){
        e.preventDefault();
        let getId = $(this).attr("data-memberEditId");
        let this_ = $(this);
        
        $.ajax({
            url: "adminApi/member-record-edit.php",
            type: "GET",
            data: {member_id: getId},
            success: function(result){
                console.log("result"+result);
                if(result){
                    $("#memberModal .modal-body").html(result);
                }
                else{
                    $("#memberModal .modal-body").html("<h4>No Record Found</h4>");
                }
            }
        })
    })

    // Delete member Record    
    $(document).on("click","#delmemberRow", function(e){
        e.preventDefault();
        let getId = $(this).attr("data-memberId");
        let this_ = $(this);
       if(confirm("are Yor sure delete this Reco")){
            $.ajax({
                url: "adminApi/member-record-del.php",
                type: "GET",
                dataType: "json",
                data: {member_id: getId},
                success: function(result){
                    if(result.success == 1){
                        $("#successMessage").html(`<span id="closeMessage">X</span>${result.message}`).fadeIn();
                        $(this_).closest("tr").fadeOut();
                    }
                    else{
                        $("#successMessage").html(`<span id="closeMessage">X</span>${result.message}`).fadeIn();
                    }
                }
            })
       }
    })
    

    // edit aircraft Record
    $(document).on("click","#editaircraftRow", function(e){
        e.preventDefault();
        let getId = $(this).attr("data-aircraftEditId");
        let this_ = $(this);
        
        $.ajax({
            url: "adminApi/aircraft-record-edit.php",
            type: "GET",
            data: {aircraft_id: getId},
            success: function(result){
                console.log("result"+result);
                if(result){
                    $("#aircraftModal .modal-body").html(result);
                }
                else{
                    $("#aircraftModal .modal-body").html("<h4>No Record Found</h4>");
                }
            }
        })
    })

    // Delete aircraft Record    
    $(document).on("click","#delaircraftRow", function(e){
        e.preventDefault();
        let getId = $(this).attr("data-aircraftId");
        let this_ = $(this);
       if(confirm("are Yor sure delete this Reco")){
            $.ajax({
                url: "adminApi/aircraft-record-del.php",
                type: "GET",
                dataType: "json",
                data: {aircraft_id: getId},
                success: function(result){
                    if(result.success == 1){
                        $("#successMessage").html(`<span id="closeMessage">X</span>${result.message}`).fadeIn();
                        $(this_).closest("tr").fadeOut();
                    }
                    else{
                        $("#successMessage").html(`<span id="closeMessage">X</span>${result.message}`).fadeIn();
                    }
                }
            })
       }
    })

    $(document).on("click", "#closeMessage", function(){
        $("#successMessage").slideUp();
    })
    $("#pilotModal, #memberModal, #aircraftModal").on("hidden.bs.modal", function(){
        $("modal-body form").trigger("reset");
    });
})