<?php

	require './_config.php';


	$smarty -> assign('date', date('D'));
	$smarty -> assign('time', date('H:i:s'));
/*	
	$smarty -> assign('HEAD', $smarty -> fetch('head.tpl'));
	$smarty -> assign('FOOTER', $smarty -> fetch('footer.tpl'));
	
*/
	
	$smarty -> display('main.tpl');

?>