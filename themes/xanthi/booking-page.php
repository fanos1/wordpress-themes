<?php
/*
  Template Name: Booking Page
 */

get_header(); 

$errors = array();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //check if the form submited is our own form
    if(!isset($_POST['formtoken1']) || $_POST['formtoken1'] !== $_SESSION['formtoken1'] ) {
        //$formtoken should always be set, if it is not set, create error
        $errors['token'] = '<div class="alert alert-danger">The form submited is not valid. Please try again or contact support for additional assistance.</div>'; 
    }
	
    $honeypot = trim(strip_tags($_POST['med']) );   
    if (!empty($honeypot)) { //!empty means bots must have populated form submited 
        $errors['pot'] = '<div class="alert alert-danger">The form submited is not valid. Please try again or contact support for additional assistance.</div>';     
    }
    
    if (preg_match('/^[A-Z \'.-s]{2,45}$/i', $_POST['name'])) {
        $name = strip_tags($_POST['name']);
    } else {
        $errors['name'] = 'Please enter your name!';
    }
        
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === $_POST['email']) {
        $email = strip_tags($_POST['email']);        
    } else {
        $errors['email'] = 'Please enter a valid email address!';
    }
    
    if (preg_match('/^[0-9]{8,16}$/', $_POST['phone'])) {
        $phone = strip_tags($_POST['phone']);
    } else {
        $errors['phone'] = 'Please enter your phone';
    }
    
    if (preg_match('/^[0-9a-z\s]{1,46}$/i', $_POST['address1'])) {
        $address1 = strip_tags($_POST['address1']);
    } else {
        $errors['address1'] = 'First address you entered is not valid!';
    }

    if(empty($_POST['address2']) ) {
       $address2 = '';//2nd address not a must
    } else {
        if(preg_match('/^[0-9a-z\s]{1,46}$/i', $_POST['address2'])) {
            $address2 = strip_tags($_POST['address2']);
        } else {
            $errors['address2'] = 'The 2nd address field is not valid!';
        }
    }
    
    if(empty($_POST['address3']) ) {
       $address3 = '';//2nd address not a must
    } else {
        if(preg_match('/^[0-9a-z]{1,46}$/i', $_POST['address3'])) {
            $address3 = strip_tags($_POST['address3']);
        } else {
            $errors['address3'] = 'The address3 is not valid!';
        }
    }
    
    //For POSTCODE validation, i use libarary taken from:http://www.braemoor.co.uk/software/postcodes.shtml    
    if (preg_match('/^[0-9a-z\s]{1,8}$/i', $_POST['postcode'])) {
        $postcode = strip_tags($_POST['postcode']);
    } else {
        $errors['postcode'] = 'Please enter your postcode!';
    }
    
    if(!empty($_POST['optionsRadios1'])) {
        $haveProvisionLicence = strip_tags($_POST['optionsRadios1']);
    } else {
        $haveProvisionLicence = '';        
    }
        
    if(!empty($_POST['optionsRadios10'])) {
        $havePassedTheory = strip_tags($_POST['optionsRadios10']);
    } else {
        $havePassedTheory = '';        
    }    
    
    if(!empty($_POST['optionsRadios100'])) {
        $takenLessonBefore = strip_tags($_POST['optionsRadios100']);
    } else {
        $takenLessonBefore = '';        
    }
        
    if(!empty($_POST['transmission'])) {
        $whatTransmission = strip_tags($_POST['transmission']);
    } else {
        $whatTransmission = ''; //Not a must, user is allowed to submit empty       
    }
    
    
    
    //$_POST['checkbox'] is an array()
    //Loop throug this array, and validate values as string. User can submit 2 values or 3 etc..
    
    $whichDaysToBook = '';
    foreach($_POST['checkbox'] as $k => $v) {
        if (preg_match('/^[a-z]{1,13}$/i', $v)) {
            $whichDaysToBook .= strip_tags($v).' ,';
        } else {
            $errors['postcode'] = "chosen day for booking not valid:: $v";
        }
    }
    
    if(preg_match("/^[a-z0-9\,.-_$&%*()+]$/i", $_POST['textmessage']) ) {
        $textAreaMsg = strip_tags($_POST['textmessage']);
    }
    
    //=====================
    // Send the email if no error
    //============================
    if(empty($errors)) {        
        $to = "info@declondon.com";
        $subject = "New booking enquiry from DecLondon.com website";
        
        $message = "<b>This is a new HTML message coming from declondon.com customer.</b>";
                
        $table = '
        <table class="table">
            <thead>
              <tr>                        
                <th>Title1</th>                    
              </tr>
            </thead>
            <tbody>
                <tr>                                              
                  <td>name: '. $name.'</td>
                </tr>
                <tr>                      
                  <td>email: '. $email.'</td>                    
                </tr>
                <tr>                                            
                  <td>phone: '. $phone.'</td>                    
                </tr>
                <tr>                                            
                  <td>address1: '. $address1.'</td>                    
                </tr>
                <tr>                                            
                  <td>address2: '. $address2.'</td>                      
                </tr>         
                <tr>                                            
                  <td>address3: '. $address3.'</td>                      
                </tr>                    
                <tr>                                            
                  <td>postcode: '. $postcode.'</td>                      
                </tr>
                <tr>                                            
                  <td>have you passed theory: '. $havePassedTheory.'</td>            
                </tr>
                <tr>                                            
                  <td>have you taken lessons before: '. $takenLessonBefore.'</td>            
                </tr>         
                <tr>                                            
                  <td>Transmission or Automatic: '. $whatTransmission.'</td>            
                </tr>         
                <tr>                                            
                  <td>What days would you like to book: '. $whichDaysToBook.'</td>            
                </tr>
                <tr>                                            
                  <td>Any additional information: '. $textAreaMsg.'</td>            
                </tr>

            </tbody>
        </table>                  
        ';
        
        $message .= "<div>$table</div>";
         
        
        $header = "From:abc@somedomain.com \r\n";
        $header .= "Cc:khurshidmoghal@hotmail.co.uk \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail($to, $subject, $message, $header);
        
        
        if($retval) {
           echo '<h3 class="alert alert-success">Message sent successfully...</h3>';           
        } else {
           echo '<h3 class="alert alert-error" Message could not be sent...</h3>';           
        }        
    } 
}


$_SESSION['formtoken1'] = md5(uniqid(rand(), true));
$formToken1 = htmlspecialchars($_SESSION['formtoken1']);

if(!empty($errors)) {

    echo "<h1>validation Errors Found!</h1>";
    foreach ($errors as $k => $v) {
        echo "<h3>$k :: $v</h3>";
    }
}
?>
	
	
<div class="row">
	<div class="col-xs-12 col-md-7 col-lg-7">                                                                
		<form action="" role="form" method="post">
			<input type="hidden" name="formtoken1" id="formtoken" value="<?php echo isset($formToken1)?$formToken1:''; ?>" />   
			<p class="hp" style="display: none;"> <input type="text" name="med" id="med" value=""> </p>
			
			<div class="form-group">
				<label for="fullname">Full Name (required)</label>
				<input type="text" name="name" value="" class="form-control" placeholder="Enter Name" required aria-required="true" />
			</div>
			<div class="form-group">
			  <label for="email">Email address (required)</label>
			  <input type="email" name="email" class="form-control" placeholder="Enter email" required aria-required="true" />
			</div>                    
			<div class="form-group">
			  <label for="telephonenumber">Telephone No:</label>
			  <input type="text" name="phone" class="form-control" placeholder="Phone number">
			</div>
			<div class="form-group">
			  <label for="firstlineaddress">First Line Address (required)</label>
			  <input type="text" name="address1" class="form-control" placeholder="First Line Address" required aria-required="true" />
			</div>
			<div class="form-group">
			  <label for="secondlineaddress">Second Line Address (required)</label>
			  <input type="text" name="address2" class="form-control" placeholder="2nd address" />
			</div>
			<div class="form-group">
			  <label for="thirdlineaddress">Third Line Address</label>
			  <input type="text" name="address3" class="form-control" placeholder="Third Line Address">
			</div>
			<div class="form-group">
			  <label for="postcode">Post Code (required)</label>
			  <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Post Code" required aria-required="true" 
					 onfocus="checkPostCode(document.getElementById('postcode').value)" 
					 onblur="checkPostCode(document.getElementById('postcode').value)" />
			  <span id="postcodeerror"></span>
			</div>                    
			<hr />
			
			<p>Do you have a provisional license?: </p>                    
			<label class="radio-inline">
				<input type="radio" name="optionsRadios1" value="yes"> Yes
			</label>
			<label class="radio-inline">
				<input type="radio" name="optionsRadios1" value="no"> No
			</label>                    
			
			<p>Have you passed your theory</p>                    
			<label class="readio-inline">
				<input type="radio" name="optionsRadios10" value="yes"> Yes
			</label>
			<label class="radio-inline">
				<input type="radio" name="optionsRadios10" value="no"> No
			</label>                    
			
			<p>Have you taken lessons before?</p>                    
			<label class="radio-inline">                        
				<input type="radio" name="optionsRadios100" value="yes"> Yes
			</label>
			<label class="radio-inline">
				<input type="radio" name="optionsRadios100" value="no"> No
			</label>
			
			<p>What transmission?</p>                    
			<label class="radio-inline">
				<input type="radio" name="transmission" value="manuel"> Manuel
			</label>
			<label class="radio-inline">
				<input type="radio" name="transmission" value="automatic"> Automatic
			</label>
			
			<p>Which days are you available?</p>                    
			<label class="checkbox-inline">
				<input type="checkbox" name="checkbox[]" value="Monday"> Monday
			</label>
			<label class="checkbox-inline">                        
				<input type="checkbox" name="checkbox[]" value="Tuesday"> Tuesday
			</label>
			<label class="checkbox-inline">                        
				<input type="checkbox" name="checkbox[]" value="Wednesday"> Wednesday
			</label>
			<label class="checkbox-inline">                        
				<input type="checkbox" name="checkbox[]" value="Thursday"> Thursday
			</label>                    
			<label class="checkbox-inline">                        
				<input type="checkbox" name="checkbox[]" value="Friday"> Friday
			</label>                    
			<label class="checkbox-inline">                        
				<input type="checkbox" name="checkbox[]" value="Saturday"> Saturday
			</label>                    
			<label class="checkbox-inline">                        
				<input type="checkbox" name="checkbox[]" value="Sunday"> Sunday
			</label>
						
			<hr />                             
			
			<p>Any additional information?</p>
			<textarea name="textmessage" cols="40" rows="10" class="form-control"></textarea>
											
			<p><button type="submit" class="btn btn-default">Submit</button></p>
		</form>
		
	</div>
	
	<div class="col-xs-12 col-md-5 col-lg-5">
		<p class="lead">Please fill in the form, and we will call you back</p>
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

function checkPostCode (toCheck) {

  // Permitted letters depend upon their position in the postcode.
  var alpha1 = "[abcdefghijklmnoprstuwyz]";                       // Character 1
  var alpha2 = "[abcdefghklmnopqrstuvwxy]";                       // Character 2
  var alpha3 = "[abcdefghjkpmnrstuvwxy]";                         // Character 3
  var alpha4 = "[abehmnprvwxy]";                                  // Character 4
  var alpha5 = "[abdefghjlnpqrstuwxyz]";                          // Character 5
  var BFPOa5 = "[abdefghjlnpqrst]";                               // BFPO alpha5
  var BFPOa6 = "[abdefghjlnpqrstuwzyz]";                          // BFPO alpha6
  
  // Array holds the regular expressions for the valid postcodes
  var pcexp = new Array ();
  
  // BFPO postcodes
  pcexp.push (new RegExp ("^(bf1)(\\s*)([0-6]{1}" + BFPOa5 + "{1}" + BFPOa6 + "{1})$","i"));

  // Expression for postcodes: AN NAA, ANN NAA, AAN NAA, and AANN NAA
  pcexp.push (new RegExp ("^(" + alpha1 + "{1}" + alpha2 + "?[0-9]{1,2})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));
  
  // Expression for postcodes: ANA NAA
  pcexp.push (new RegExp ("^(" + alpha1 + "{1}[0-9]{1}" + alpha3 + "{1})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));

  // Expression for postcodes: AANA  NAA
  pcexp.push (new RegExp ("^(" + alpha1 + "{1}" + alpha2 + "{1}" + "?[0-9]{1}" + alpha4 +"{1})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));
  
  // Exception for the special postcode GIR 0AA
  pcexp.push (/^(GIR)(\s*)(0AA)$/i);
  
  // Standard BFPO numbers
  pcexp.push (/^(bfpo)(\s*)([0-9]{1,4})$/i);
  
  // c/o BFPO numbers
  pcexp.push (/^(bfpo)(\s*)(c\/o\s*[0-9]{1,3})$/i);
  
  // Overseas Territories
  pcexp.push (/^([A-Z]{4})(\s*)(1ZZ)$/i);  
  
  // Anguilla
  pcexp.push (/^(ai-2640)$/i);

  // Load up the string to check
  var postCode = toCheck;

  // Assume we're not going to find a valid postcode
  var valid = false;
  
  // Check the string against the types of post codes
  for ( var i=0; i<pcexp.length; i++) {
  
    if (pcexp[i].test(postCode)) {
    
      // The post code is valid - split the post code into component parts
      pcexp[i].exec(postCode);
      
      // Copy it back into the original string, converting it to uppercase and inserting a space 
      // between the inward and outward codes
      postCode = RegExp.$1.toUpperCase() + " " + RegExp.$3.toUpperCase();
      
      // If it is a BFPO c/o type postcode, tidy up the "c/o" part
      postCode = postCode.replace (/C\/O\s*/,"c/o ");
      
      // If it is the Anguilla overseas territory postcode, we need to treat it specially
      if (toCheck.toUpperCase() == 'AI-2640') {postCode = 'AI-2640'};
      
      // Load new postcode back into the form element
      valid = true;
      
      // Remember that we have found that the code is valid and break from loop
      break;
    }
  }
  
  // Return with either the reformatted valid postcode or the original invalid postcode
  //if (valid) {return postCode;} else return false;
    if(valid) {
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


  

