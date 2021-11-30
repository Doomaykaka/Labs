<?php

	require './_config.php';
	$smarty -> assign('date', date('Y:m:d'));
	$smarty -> assign('time', date('H:i:s'));
        require './panel.php';
        $smarty -> assign('log', lgt());
        $smarty -> display('high.tpl');
        
        if((isset($_GET['abus']))&&($_GET['abus']==1)){ //check page type
         $smarty -> display('abus.tpl');
        }elseif((isset($_GET['lin']))&&($_GET['lin']==1)){
         $smarty -> display('lin.tpl');
        }else{
         require './engine.php';
         $smarty -> assign('news', preprocessing());
	 $smarty -> display('main.tpl');
        }
        
        
        $smarty -> display('low.tpl');

?>