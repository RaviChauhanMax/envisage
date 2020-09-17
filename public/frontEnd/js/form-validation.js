jQuery(document).ready(function(){

    /*========== valid email check ========*/
    jQuery.validator.addMethod("regex", function(value, element, param) {
        return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    }, "Enter valid email address.");

    /*========== character only ========*/
    $.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Only alphabets are allowed.");

    /*========== Alphabets and Numbers only ========*/
    $.validator.addMethod("AlphabetandNumbers", function(value, element) {
        return this.optional(element) || /^[A-Za-z0-9]+$/i.test(value);
    }, "Only Alphabets and Numbers allowed.");

    jQuery('#schedule-meet').validate({
        rules:
        { 
            name:{
                required : true,
            },
            email: {
                required: true,
                regex: "",
                email: true
            },
            scheduled_at: {
                required: true,
            },
            mobile_no: {
                required: true,
            },
            subject_id: {
                required:  true,
            },
            query: {
                required: true,
            }

        },
        messages:
        {   
            name:{
                required:  "Name is required"
            },
            email: {
                required: "Email address is required"
            },
            scheduled_at: {
                required: "Scheduled Time is required"
            },
            mobile_no: {
                required: "Mobile no is required"
            },
            subject_id:{
                required: "subject of query is required"
            },
            query:{
                required: "Message is reuired"
            }
        },
    });
});

  



  
