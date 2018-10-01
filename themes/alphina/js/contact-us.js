/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$( document ).ready(function() {

    // Variable to hold request
    var request;

    // Attach the submit event of our form
    $("#foo").submit(function(event) {

        // Abort any pending request
        if (request) {
            request.abort();
        }

        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

         /* 
          As we are going to be using AJAX to submit the form, we should provide the end user an indication 
          that we are doing some work behind the scenes, so to speak. To do so, we will set the response 
          message holders text to 'Please Wait...' and give it a class of 'response-waiting'. This will give it a cool loading gif 
         */
         $("#displayHere").hide()  //We hide the response message holder first so that when we set the text, it does not show straight away, we will fade in
            .addClass('response-waiting')
            .text('Please Wait...')
            .fadeIn(200);

        // Fire off the request to /form.php
        request = $.ajax({
            url: "/ajax-news-process.php",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {

            //if you want to get any returned data from the PHP file, response OBJ has it
            //alert(response);


            //IF WE USE JSON IN THE PHP FILE, THE response is  JSON encoded, and we need to parse this json so that we can use it
            //$("#displayHere").html(response);  OUT::: {"status":"status ok","message":"messa here"}

            //var obj = jQuery.parseJSON( '{ "name": "John" }' ); 
            //alert( obj.name === "John" );

            var parsedRespon = jQuery.parseJSON( response );                        
            var klass = '';

            if(parsedRespon.status == 'success') {
                //$("#displayHere").html('fdsfdsf');
                klass = "response-success";
            } else if (parsedRespon.status == 'error') {
                //$("#displayHere").html('ERRRR ::: ');
                //$("#displayHere").html(parsedRespon.message);
                klass = "response-error";
            } 

            //show reponse message to user
            $("#displayHere").fadeOut(2000,function() {
               $(this).removeClass('response-waiting')
                      .addClass(klass)
                      //.text(parsedRespon.message)
                      .html(parsedRespon.message)
                      .fadeIn(200,function(){
                            //set timeout to hide response message
                            setTimeout(function() {
                                    $("#displayHere").fadeOut(200,function(){
                                            $(this).removeClass(klass);
                                            //form.data('formstatus','idle');
                                    });
                             },3000)
                     });
            });

        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            //console.error("The following error occurred: "+textStatus, errorThrown);
            //$("#displayHere").html('An Error Occured, we apologize!');
            alert('An error occured, We apologize! ');
        });

        // Callback handler that will be called regardless if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });

        // Prevent default posting of form
        event.preventDefault();
    });


});

