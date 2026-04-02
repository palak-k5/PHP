
$(document).ready(function(){

    $("#name").on("input", function(){
        let name = $(this).val();

        if(name == ""){
            $("#name").next(".error").text("Name required");        }
        else if(!/^[a-zA-Z ]+$/.test(name)){
            $("#name").next(".error").text("Only alphabets allowed");
        }
        else{
            $("#name").next(".error").text("");
        }
    });

    $("#email").on("input", function(){
        let email = $(this).val();

        if(email == ""){
            $("#emailerr").text("Email required");
        }
        else if(!email.includes("@")){
            $("#emailerr").text("Invalid email");
        }
        else{
            $("#emailerr").text("");
        }
    });

    $("#password").on("input", function(){
        let pass = $(this).val();
        let msg = "";

        if(pass.length < 6) msg = "Min 6 chars";
        else if(!/[A-Z]/.test(pass)) msg = "Add uppercase letter";
        else if(!/[a-z]/.test(pass)) msg = "Add lowercase letter";
        else if(!/[0-9]/.test(pass)) msg = "Add number";
        else if(!/[@$!%*?&]/.test(pass)) msg = "Add special character";

        $("#passerr").text(msg);
    });

    $("#age").on("input", function(){
        let age = $(this).val();

        if(age == "" || age <= 0){
            $("#ageerr").text("Enter valid age");
        }
        else{
            $("#ageerr").text("");
        }
    });

    //behaviour cannot be seen as radio buttons on  change behaviour is different (any one of them must be selected )

    // $("input[name='gender']").on("change", function(){
    //     // alert('test');
    //     // console.log($("input[name='gender']").length);
    //     if($("input[name='gender']:checked").length == 0){
    //         $("#gendererr").text("Select gender");
    //     }
    //     else{
    //         $("#gendererr").text("");
    //     }
    // });

    $("#course").on("change", function(){
        let course = $(this).val();
        
        if(course == ""){
            $("#courseerr").text("Select course");
        }
        else{
            $("#courseerr").text("");
        }
    });

    $("input[name='skills[]']").on("change", function(){
        if($("input[name='skills[]']:checked").length == 0){
            $("#skillserr").text("Select at least one skill");
        }
        else{
            $("#skillserr").text("");
        }
    });

    $("#dob").on("change", function(){
        let dob = $(this).val();
        let today = new Date().toISOString().split("T")[0];

        if(dob == ""){
            $("#doberr").text("Select DOB");
        }
        else if(dob > today){
            $("#doberr").text("DOB cannot be in future");
        }
        else{
            $("#doberr").text("");
        }
    });
   
    $("#address").on("input", function(){
        let address = $(this).val();

        if(address.length < 5){
            $("#addresserr").text("Minimum 5 characters required");
        }
        else{
            $("#addresserr").text("");
        }
    });

    $("#myform").on("submit", function(e){

        let valid = true;

        if($("#name").val() == ""){
            $(this).next(".error").text("Name required");
            valid = false;
        }

        if($("#email").val() == ""){
            $("#emailerr").text("Email required");
            valid = false;
        }

        if($("#password").val().length < 6){
            $("#passerr").text("Min 6 characters");
            valid = false;
        }

        if($("#age").val() == ""){
            $("#ageerr").text("Enter age");
            valid = false;
        }

        if($("input[name='gender']:checked").length == 0){
            $("#gendererr").text("Select gender");
            valid = false;
        }

        if($("#course").val() == ""){
            $("#courseerr").text("Select course");
            valid = false;
        }

        if($("input[name='skills[]']:checked").length == 0){
            $("#skillserr").text("Select at least one skill");
            valid = false;
        }

        if($("#dob").val() == ""){
            $("#doberr").text("Select DOB");
            valid = false;
        }

        if(!valid){
            e.preventDefault(); 
        }

    });

});