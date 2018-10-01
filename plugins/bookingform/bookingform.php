<?php
/*
  Plugin Name: bookingform
  Description: Simple contact form which can will be used for booking request
  Version: 1.0
  Author: irfan kissa
 */


ob_start(); //had issues with SESSION          

if (!session_id()) {
    session_start();
}

function shordcodefonksiyon() {
    
    $errors = array();
    
    $dir = plugin_dir_path( __FILE__ ); //output:: /home/declondo/public_html/wp-content/plugins/bookingform/
    //include_once 'test.php'; //OK
    

    require_once($dir.'ReCaptcha/ReCaptcha.php');
    require_once($dir.'ReCaptcha/RequestMethod.php');
    require_once($dir.'ReCaptcha/RequestParameters.php');
    require_once($dir.'ReCaptcha/Response.php');
    require_once($dir.'ReCaptcha/RequestMethod/Post.php');
    require_once($dir.'ReCaptcha/RequestMethod/Socket.php');
    require_once($dir.'ReCaptcha/RequestMethod/SocketPost.php');
   
    $siteKey = '6LeW8AYTAAAAAFYGRM4asyxaDTAu3dQWFKBDHJpz';
    $secret = '6LeW8AYTAAAAAD3vmrFPCiL5fCfQ7HTVbt-J5SKO';
    $lang = 'en';// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language    
    

    //deliver_mail();     
    if (isset($_POST['cf-submitted'])) {

        // sanitize form values
        if ($_POST['formtoken1'] !== $_SESSION['formtoken1']) {
            $errors['token'] = '<div>The form submited is not valid.</div>';
        }
        $honeypot = trim(strip_tags($_POST['med']));
        if (!empty($honeypot)) { //!empty means bots must have populated form submited, this <input> is invisible to users 
            $errors['pot'] = '<div class="alert alert-danger">The form submited is not valid. Please try again or contact support for additional assistance.</div>';
        }        	
		
        $honeypot2 = trim(strip_tags($_POST['skrito2']));
        if (!empty($honeypot)) { //!empty means bots must have populated form submited, this <input> is invisible to users 
            $errors['pot2'] = '<div class="alert alert-danger">The form submited is not valid. Please try again or contact support for additional assistance.</div>';
        }

        // GOOGLE RECAPTCHA
        if ($siteKey === '' || $secret === '') {
            exit('Recaptach Error, str40');        
        } 
        
        if (isset($_POST['g-recaptcha-response']) ) {
            
            // If the form submission includes the "g-captcha-response" field            
            $recaptcha = new \ReCaptcha\ReCaptcha($secret);// Create an instance of the service using your secret
            
            //==========================
            // Make the call to verify the response and also pass the user's IP address
            //==========================
            $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']); //[REMOTE_ADDR] The IP address from which the user is viewing the current page. 
            
            if ($resp->isSuccess()) {
                // If the response is a success, VALIDATE other <inputs>!  
                $name = sanitize_text_field($_POST["cf-name"]);
                $email = sanitize_email($_POST["cf-email"]);
                
                if (preg_match('/^[0-9]{8,16}$/', $_POST['cf-phone'])) {
                    $phone = strip_tags($_POST['cf-phone']);
                } else {
                    $errors['phone'] = 'Please enter your phone';
                }
           
                     
                //For POSTCODE validation, i use libarary taken from:http://www.braemoor.co.uk/software/postcodes.shtml    
                if (preg_match('/^[0-9a-z\s]{1,8}$/i', $_POST['postcode'])) {
                    $postcode = strip_tags($_POST['postcode']);
                } else {
                    $errors['postcode'] = 'Please enter your postcode!';
                }
                /* ==== PHP function to validate UK postcodes. I don't do validation, we accept any string as long as it is not dangerous
                function ValidatePostcode($postcode)
                {
                  return (bool)preg_match(
                    "~^(GIR 0AA)|(TDCU 1ZZ)|(ASCN 1ZZ)|(BIQQ 1ZZ)|(BBND 1ZZ)"
                  . "|(FIQQ 1ZZ)|(PCRN 1ZZ)|(STHL 1ZZ)|(SIQQ 1ZZ)|(TKCA 1ZZ)"
                  . "|[A-PR-UWYZ]([0-9]{1,2}|([A-HK-Y][0-9]"
                  . "|[A-HK-Y][0-9]([0-9]|[ABEHMNPRV-Y]))"
                  . "|[0-9][A-HJKS-UW])\\s?[0-9][ABD-HJLNP-UW-Z]{2}$~i",
                  $postcode);
                }

                var_dump(
                  ValidatePostcode('NE11AA')
                );

                var_dump(
                  ValidatePostcode('NE1 1AA')
                );                 
                 */ 


                
                $extraInfo = esc_textarea($_POST["cf-message"]);
                 
                
                //================
                //No Errors! Send Email             
                //=========================
                if (empty($errors)) {
                    
                    //$to = "irfankissa@outlook.com";                    
                    $to = "khurshidmoghal@hotmail.co.uk";     
                    $multiple_to_recipients = array(
                        'info@declondon.com',
                        'khurshidmoghal@hotmail.co.uk'                        
                    );
                    $subject = 'Booking Request From Declondon.com';
                    //$message = esc_textarea( $_POST["cf-message"] );


                    $message = '
                    <table class="table">
                        <thead>
                            <tr><th>Booking Request From Declondon.com website</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>Customer Name: ' . $name . '</td></tr>
                            <tr><td>Customer Email : ' . $email . '</td></tr>    
                            <td>Customer Phone : ' . $phone . '</td></tr>                    
                            <td>Customer POSTCODE : ' . $postcode . '</td></tr>  
                            <td>Extra Informaiton : ' . $extraInfo . '</td></tr>                                        
                        </tbody>            
                    </table>';
                    
                    //$header = "From:info@tottenhamdrivingschool.co.uk \r\n";
                    //From: "Example User" <email@example.com>
                    $header = "From:$email \r\n";
                    $header .= "Cc:irfankissa@yahoo.com \r\n";	
                    $header .= "MIME-Version: 1.0\r\n";
                    $header .= "Content-type: text/html\r\n";

                    //$retval = mail($to, $subject, $message, $header);
                    $retval = wp_mail( $multiple_to_recipients, $subject, $message, $header ) ;

                    $successFailureMsg = '';
                    if($retval) {	
                        $successFailureMsg .= '<h3 class="alert alert-success">'. 'Message sent successfully...We will be in touch soon!'. '</h3>';
                        //echo "<h3>message sent successfully</h3>";
                    } else {
                        //echo "<h3>Error Occured </h3>";
                        $successFailureMsg .= '<h3 class="alert alert-danger">'. 'Failed to send message, please call us on : 02072413322'. '</h3>';
                    } 
                    
                } else {
                    echo "<h3>Sorry, there was an Error! We apologise str123 </h3>";
                }

            } else {
                echo "<h3>Sorry, there was an Error with Google captcha! make sure you tick the box </h3>";
            }
        
        } //$_POST['g-recaptcha-response                

    }


    $_SESSION['formtoken1'] = md5(uniqid(rand(), true));
    $_SESSION['formtoken1'] = htmlspecialchars($_SESSION['formtoken1']);
    ?>
    
    <div class="row">
        <div class="col-lg-12">
            <?php 
            if(isset($successFailureMsg) ) {
                echo $successFailureMsg;
            }
            ?>
        </div>
    </div>
    

<div class="row">
    <div class="col-lg-6">
        <?php
        echo '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
            echo '<input type="hidden" name="formtoken1" id="formtoken1" value="' . (isset($_SESSION['formtoken1']) ? $_SESSION['formtoken1'] : '') . '" />';
            echo '<p class="skrito"> <input type="text" name="med" value=""> </p>';
            echo '<span class="skrito2"> <input type="text" name="skrito2" value=""> </span>';

            echo '<div class="form-group">
                    <label for="fullname">Full Name (required)</label>
                    <input type="text" name="cf-name" value="' . ( isset($_POST["cf-name"]) ? esc_attr($_POST["cf-name"]) : '' ) . '" class="form-control" placeholder="Enter Name" required aria-required="true" />
            </div>';

            echo '<div class="form-group">
                <label for="email">Email address (required)</label>
                <input type="email" name="cf-email" class="form-control" placeholder="Enter email" required aria-required="true" />
             </div>';

			//TELEPHONE
            echo '
            <div class="form-group">
                <label for="telephonenumber">Telephone No:</label>
                <input type="text" name="cf-phone" class="form-control" placeholder="Telephone">
            </div>';

            //POSTCODE
            echo '               
            <div class="form-group">
                <label for="postcode">Post Code (required)</label>
                <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Post Code" required aria-required="true" />
                <span id="postcodeerror"></span>
            </div>  ';

            echo '<p>Your Message (required) <br/>';
            echo '<textarea class="form-control" rows="10" cols="35" name="cf-message">' . ( isset($_POST["cf-message"]) ? esc_attr($_POST["cf-message"]) : '' ) . '</textarea></p>';

            ?>    

            <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>"></script> 

            <p>
                <br/>
                <input type="submit" name="cf-submitted" value="Submit" class="btn btn-primary">
            </p>
        </form>
    </div>
    
    <div class="col-lg-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.2006342069217!2d-0.0795822841016945!3d51.54621991568489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761c91e36a8e31%3A0x402d4d9d6c4c356a!2s36+Balls+Pond+Rd%2C+Mildmay+Ward%2C+London+N1+4AU!5e0!3m2!1sen!2suk!4v1468340443490" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    
</div>
    
    <script type="text/javascript">
        /*==================================================================================================
         
         Application:   Utility Function
         Author:        John Gardner
         
         Version:       V1.0
         Date:          18th November 2003
         Description:   Used to check the validity of a UK postcode
         
         Version:       V2.0
         Date:          8th March 2005
         Description:   BFPO postcodes implemented.
         The rules concerning which alphabetic characters are allowed in which part of the 
         postcode were more stringently implementd.
         
         Version:       V3.0
         Date:          8th August 2005
         Description:   Support for Overseas Territories added                 
         
         Version:       V3.1
         Date:          23rd March 2008
         Description:   Problem corrected whereby valid postcode not returned, and 'BD23 DX' was invalidly 
         treated as 'BD2 3DX' (thanks Peter Graves)        
         
         Version:       V4.0
         Date:          7th October 2009
         Description:   Character 3 extended to allow 'pmnrvxy' (thanks to Jaco de Groot)  
         
         Version:       V4.1
         8th September 2011
         Support for Anguilla overseas territory added    
         
         Version:       V5.0
         Date:          8th November 2012
         Specific support added for new BFPO postcodes           
         
         Parameters:    toCheck - postcodeto be checked. 
         
         This function checks the value of the parameter for a valid postcode format. The space between the 
         inward part and the outward part is optional, although is inserted if not there as it is part of the 
         official postcode.
         
         If the postcode is found to be in a valid format, the function returns the postcode properly 
         formatted (in capitals with the outward code and the inward code separated by a space. If the 
         postcode is deemed to be incorrect a value of false is returned.
         
         Example call:
         
         if (checkPostCode (myPostCode)) {
         alert ("Postcode has a valid format")
         } 
         else {alert ("Postcode has invalid format")};
         
         --------------------------------------------------------------------------------------------------*/

        function checkPostCode(toCheck) {

            // Permitted letters depend upon their position in the postcode.
            var alpha1 = "[abcdefghijklmnoprstuwyz]";                       // Character 1
            var alpha2 = "[abcdefghklmnopqrstuvwxy]";                       // Character 2
            var alpha3 = "[abcdefghjkpmnrstuvwxy]";                         // Character 3
            var alpha4 = "[abehmnprvwxy]";                                  // Character 4
            var alpha5 = "[abdefghjlnpqrstuwxyz]";                          // Character 5
            var BFPOa5 = "[abdefghjlnpqrst]";                               // BFPO alpha5
            var BFPOa6 = "[abdefghjlnpqrstuwzyz]";                          // BFPO alpha6

            // Array holds the regular expressions for the valid postcodes
            var pcexp = new Array();

            // BFPO postcodes
            pcexp.push(new RegExp("^(bf1)(\\s*)([0-6]{1}" + BFPOa5 + "{1}" + BFPOa6 + "{1})$", "i"));

            // Expression for postcodes: AN NAA, ANN NAA, AAN NAA, and AANN NAA
            pcexp.push(new RegExp("^(" + alpha1 + "{1}" + alpha2 + "?[0-9]{1,2})(\\s*)([0-9]{1}" + alpha5 + "{2})$", "i"));

            // Expression for postcodes: ANA NAA
            pcexp.push(new RegExp("^(" + alpha1 + "{1}[0-9]{1}" + alpha3 + "{1})(\\s*)([0-9]{1}" + alpha5 + "{2})$", "i"));

            // Expression for postcodes: AANA  NAA
            pcexp.push(new RegExp("^(" + alpha1 + "{1}" + alpha2 + "{1}" + "?[0-9]{1}" + alpha4 + "{1})(\\s*)([0-9]{1}" + alpha5 + "{2})$", "i"));

            // Exception for the special postcode GIR 0AA
            pcexp.push(/^(GIR)(\s*)(0AA)$/i);

            // Standard BFPO numbers
            pcexp.push(/^(bfpo)(\s*)([0-9]{1,4})$/i);

            // c/o BFPO numbers
            pcexp.push(/^(bfpo)(\s*)(c\/o\s*[0-9]{1,3})$/i);

            // Overseas Territories
            pcexp.push(/^([A-Z]{4})(\s*)(1ZZ)$/i);

            // Anguilla
            pcexp.push(/^(ai-2640)$/i);

            // Load up the string to check
            var postCode = toCheck;

            // Assume we're not going to find a valid postcode
            var valid = false;

            // Check the string against the types of post codes
            for (var i = 0; i < pcexp.length; i++) {

                if (pcexp[i].test(postCode)) {

                    // The post code is valid - split the post code into component parts
                    pcexp[i].exec(postCode);

                    // Copy it back into the original string, converting it to uppercase and inserting a space 
                    // between the inward and outward codes
                    postCode = RegExp.$1.toUpperCase() + " " + RegExp.$3.toUpperCase();

                    // If it is a BFPO c/o type postcode, tidy up the "c/o" part
                    postCode = postCode.replace(/C\/O\s*/, "c/o ");

                    // If it is the Anguilla overseas territory postcode, we need to treat it specially
                    if (toCheck.toUpperCase() == 'AI-2640') {
                        postCode = 'AI-2640'
                    }
                    ;

                    // Load new postcode back into the form element
                    valid = true;

                    // Remember that we have found that the code is valid and break from loop
                    break;
                }
            }

            // Return with either the reformatted valid postcode or the original invalid postcode
            //if (valid) {return postCode;} else return false;
            if (valid) {
                //return postCode;
                //return true;        
                document.getElementById('postcode').innerHTML = postCode;
                document.getElementById('postcodeerror').innerHTML = ''; //clear the previously error message
            } else {
                //display error
                document.getElementById('postcodeerror').innerHTML = 'postcode is not valid';
                return false;
            }

        }

    </script>


    <?php
    return ob_get_clean();
}

add_shortcode('irf_contact_form', 'shordcodefonksiyon'); //Create shortcode



/*
 *==========
 *  <form action="" method="post">
        <input type="hidden" name="formtoken1" id="formtoken" value="<?php echo isset($_SESSION['formtoken1']) ? $_SESSION['formtoken1'] : ''; ?>" />  
        <p class="hp" style="display: none;"> <input type="text" name="med" id="med" value=""> </p>
        
        <div class="form-group">
            <label for="fullname">Full Name (required)</label>
            <input type="text" name="name" value="" class="form-control" placeholder="Enter Name" required aria-required="true" />
        </div>
        <div class="form-group">
          <label for="email">Email address (required)</label>
          <input type="email" name="email" class="form-control" placeholder="Enter email" required aria-required="true" />
        </div>
        
        
        <p><input type="submit" name="cf-submitted" value="Send"></p>
    </form>  
 */

