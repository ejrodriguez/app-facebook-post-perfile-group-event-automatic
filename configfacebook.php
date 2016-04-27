<?php
$config = ConfigApp::First()->get();
return  array(
//codigo quemado
/*	'app_id'=>'41975030xxxxxxxx47',
	'app_secret'=>'c9eb43xxxxxxxxxxxxeec1f22f3b1',
	'app_scopes'=> array('email','read_friendlists','user_online_presence','publish_actions','user_groups','manage_pages','user_events')
*/
//codigo desde base de datos
	'app_id'=> $config[0]["AppIdFacebook"],
	'app_secret'=>$config[0]["AppSecretFacebook"],
	'app_scopes'=> array('email','publish_actions','publish_pages','user_groups','manage_pages','user_events')
)
?>
