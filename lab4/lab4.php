<?php

	require './_config.php';
	$smarty -> assign('date', date('Y:m:d'));
	$smarty -> display('high.tpl');    
	
	$smarty -> display('main.tpl'); 
        
    $smarty -> display('low.tpl');

?>