
<div id="sidebar-left">  
	<ul>  
    <?php 						
		/*
		* NOTE: the code will check to see if a child page exists, if child doesn't exists it will display ALL TOP LEVEL menus
		* I created LOCAL AUTHORITY page and menu. The browser was displaying ALL TOP MENUS when i visited the 
		* 'local author' page. this is was because i had not created a child page under LOCAL AUTHORITY.
		*/		
		$args = array(
			//'child_of' IS NOT SET HERE, SO IT WILL DEFAULT TO 0, WHICH DISPLAYS ALL PAGES
			'depth' 	=> '1',
			'title_li' 	=> '',
			'exclude' => '64,274,280',
			'echo'     	=> 0
		);		
		//we exclude the 'About us page (id=64),  'Contact us page (id=274)' and privacy page (280)
		
		//----------+			
		//child_of: |
		//----------+ 
		//(integer) Displays the sub-pages of a single Page only; uses the ID for a Page as the value.
		//Note that the child_of parameter will also fetch "grandchildren" of the given ID, not just direct descendants. 
		//Defaults to 0 (displays all Pages).
		
		$output = wp_list_pages($args); //initially set $output to display ALL PAGES, we'll overwrite it if 'TENANTS' has children
		//echo "<h1>".$output."</h1>";
		
		//code take from: http://codex.wordpress.org/Function_Reference/wp_list_pages
//		if(is_page() ) 	{ //is_page() returns TRUE When any Page is being displayed. Since we want side menu to appear in blog pages as well, we comment it out
					
			  $page = $post->ID; //Get the ID of the page, i.e. 'TENANTS'			  			  
			  if($post->post_parent) { //IF the page HAS parent, i.e. if user clicked 'tenantSubLink' which is under 'TENANT', this is true
				  $page = $post->post_parent; //Get the parent of the page. $page IS THE 'TENANT' menu's id number
				  //$page @ this point in 'TENANTS' or 'LANDLORDS' etc...
			  }
			  
			  $args2 = array(
				  'echo'     	=> 0,
				  //'child_of'     => 0, [0] is default and displays all pages. Instead, we will pass the ID of 'TENANTS' page
				  'child_of'     => $page, //this will get us the children of 'TENANTS' because $page refers to 'TENANTS' assuming user clicked 'TENANT'
				  'title_li' 	=> ''
			  );
			  
			  
			  $children = wp_list_pages($args2); //if 'TENANTS' has child pages, wp_list_pages() returns them			
			  
			  if($children) { //IF 'TENANTS' above has children, do			 
				  $args3 = array(
					'echo'     	=> 0,
					'child_of'     => $page, // $page == TENANTS_ID
					'title_li' => ''
				  );								
				$output = wp_list_pages ($args3);
			  }
			  
			  echo $output;
//		}//End IF()  ?>
    </ul>
           
</div><!-- #sidebar-left -->





