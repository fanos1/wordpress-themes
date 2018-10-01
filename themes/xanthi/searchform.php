
<form class="navbar-form navbar-right"  action="<?php echo $_SERVER['PHP_SELF']; ?>" role="search" method="get">
    
    <div class="form-group">
        <label class="sr-only" for="search">search in<?php echo home_url( '/' );  ?> </label>  
        <input type="text" class="form-control" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search"> 
    </div>
    <button type="submit" name="search" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
        
    
</form>



