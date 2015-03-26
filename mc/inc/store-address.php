<?php
/*///////////////////////////////////////////////////////////////////////
Part of the code from the book 
Building Findable Websites: Web Standards, SEO, and Beyond
by Aarron Walter (aarron@buildingfindablewebsites.com)
http://buildingfindablewebsites.com

Distrbuted under Creative Commons license
http://creativecommons.org/licenses/by-sa/3.0/us/
///////////////////////////////////////////////////////////////////////*/


function storeAddress(){
	
	// Validation
	if(!$_GET['email']){ return "No email address provided"; } 

	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_GET['email'])) {
		return '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong> Email address is invalid</div>'; 
	}

	require_once('MCAPI.class.php');
	// grab an API Key from http://admin.mailchimp.com/account/api/
	$api = new MCAPI('da45f758a637f21e1a7995b328ccd5e8-us6');
	
	// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
	// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
	$list_id = "aced639025";

	if($api->listSubscribe($list_id, $_GET['email'], '') === true) {
		// It worked!	
		return '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Success! Check your email to confirm sign up.</div>';
	}else{
		// An error ocurred, return error message	
		return '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Error: </strong> '. $api->errorMessage . '</div>' ;
	}
	
}

// If being called via ajax, autorun the function
if($_GET['ajax']){ echo storeAddress(); }

