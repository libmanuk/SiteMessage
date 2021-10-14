<?php
/**
 * SiteMessage
 * 
 * @copyright Copyright 2021 Eric C. Weig 
 * @license http://opensource.org/licenses/MIT MIT
 */

/**
 * The SiteMessage plugin.
 * 
 * @package Omeka\Plugins\SiteMessage
 */
 
     // Define Constants

    define('DEFAULT_SITE_MESSAGE_STMT', '');
    define('DEFAULT_SITE_MESSAGE_STMT_TTL', '');
    define('DEFAULT_BACKGROUND_COLOR', '#ffffff');

    class SiteMessagePlugin extends Omeka_Plugin_AbstractPlugin
    {
    
    // Define Hooks

    protected $_hooks = array(
        'install',
        'uninstall',
        'public_body',
        'public_collections_browse',
        'public_collections_browse_each',
        'public_collections_show',
        'public_content_top',
        'public_footer',
        'public_head',
        'public_header',
        'public_home',
        'public_items_browse',
        'public_items_browse_each',
        'public_items_search',
        'public_items_show',
	'define_routes',
	'config',
        'config_form'
	);

    public function hookInstall()
    {
        set_option('site_message_stmt', DEFAULT_SITE_MESSAGE_STMT); 
        set_option('site_message_stmt_ttl', DEFAULT_SITE_MESSAGE_STMT_TTL); 
        set_option('background_color', DEFAULT_BACKGROUND_COLOR);    
        set_option('public_body', '0'); 
        set_option('public_collections_browse', '0'); 
        set_option('public_collections_browse_each', '0'); 
        set_option('public_collections_show', '0'); 
        set_option('public_content_top', '0'); 
        set_option('public_footer', '0'); 
        set_option('public_header', '0'); 
        set_option('public_home', '0'); 
        set_option('public_items_browse', '0'); 
        set_option('public_items_browse_each', '0'); 
        set_option('public_items_search', '0'); 
        set_option('public_items_show', '0'); 
    }
    
    public function hookUninstall()
    {
        delete_option('site_message_stmt');   
        delete_option('site_message_stmt_ttl'); 
        delete_option('background_color');    
        delete_option('public_body'); 
        delete_option('public_collections_browse'); 
        delete_option('public_collections_browse_each'); 
        delete_option('public_collections_show'); 
        delete_option('public_content_top'); 
        delete_option('public_footer'); 
        delete_option('public_header'); 
        delete_option('public_home'); 
        delete_option('public_items_browse'); 
        delete_option('public_items_browse_each'); 
        delete_option('public_items_search'); 
        delete_option('public_items_show'); 
    }
	
    function hookDefineRoutes($args)
    {
        $router = $args['router'];
    }
    
    public function hookConfigForm() 
    {
        include 'config_form.php';
    }
    
    public function hookConfig($args)
    {
    	$post = $args['post'];
        set_option('site_message_stmt',$post['site_message_stmt']);
        set_option('site_message_stmt_ttl',$post['site_message_stmt_ttl']);
        set_option('background_color',$post['background_color']);
        set_option('public_body',$post['public_body']);
        set_option('public_collections_browse',$post['public_collections_browse']);
        set_option('public_collections_browse_each',$post['public_collections_browse_each']);
        set_option('public_collections_show',$post['public_collections_show']); 
        set_option('public_content_top',$post['public_content_top']);
        set_option('public_footer',$post['public_footer']);
        set_option('public_header',$post['public_header']);
        set_option('public_home',$post['public_home']);
        set_option('public_items_browse',$post['public_items_browse']);
        set_option('public_items_browse_each',$post['public_items_browse_each']);
        set_option('public_items_search',$post['public_items_search']);
        set_option('public_items_show',$post['public_items_show']); 
    }
    
    public function hookPublicHead()
    {
	queue_css_file('sitemessage');
    }

    public function hookPublicBody($args)
    {
        $flag = get_option('public_body');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			  echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicCollectionsBrowse($args)
    {
        $flag = get_option('public_collections_browse');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			   echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicCollectionsBrowseEach($args)
    {
        $flag = get_option('public_collections_browse_each');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			  echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicCollectionsShow($args)
    {
        $flag = get_option('public_collections_show');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			  echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicContentTop($args)
    {
        $flag = get_option('public_content_top');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			    echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicFooter($args)
    {
        $flag = get_option('public_footer');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			      echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicHeader($args)
    {
        $flag = get_option('public_header');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			      echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicHome($args)
    {
        $flag = get_option('public_home');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			      echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicItemsBrowse($args)
    {
        $flag = get_option('public_items_browse');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			    echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicItemsBrowseEach($args)
    {
        $flag = get_option('public_items_browse_each');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;			
			    echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicItemsSearch($args)
    {
        $flag = get_option('public_items_search');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
			      echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
			        if (!empty($stmt_ttl)):	
			          echo "<h4>$stmt_ttl</h4>";
			        endif;
			    echo "<p>$stmt</p></div>";
		  }
    }

    public function hookPublicItemsShow($args)
    {
        $flag = get_option('public_items_show');
        $bgcolor = get_option('background_color');
		    if ($flag == "1") {
        		$stmt_ttl = get_option('site_message_stmt_ttl');
        		$stmt = get_option('site_message_stmt');
            echo "<div class=\"page-site-message-statement\" style=\"background:$bgcolor;\">";
        	    if (!empty($stmt_ttl)):	
			          echo "<h3>$stmt_ttl</h3>";
			        endif;
  			echo "<p>$stmt</p></div>";
	  	}
    }


}
