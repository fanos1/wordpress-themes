<?php


/*override teh default search form which creates invalid attribute called "role" */
echo '
	<form id="searchform" action="http://www.hackneyshop.co.uk/" method="get">
	  <div>
		  <label class="screen-reader-text" for="s">Search for:</label>
		  <input id="s" type="text" name="s" value="" />
		  <input id="searchsubmit" type="submit" value="look" />
	  </div>
	</form>
'; 


/* override teh default search form which creates invalid attribute called "role" 
echo '
	<form id="searchform" action="http://www.hackneyshop.co.uk/" method="get">
	  <div>
		  <label class="screen-reader-text" for="s">Search for:</label>
		  <input id="s" type="text" name="s" value="">
		  <input id="searchsubmit" type="submit" value="look">
	  </div>
	</form>
'; 
*/

?>
