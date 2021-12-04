<?php
/* Smarty version 3.1.36, created on 2021-12-01 11:02:24
  from '/srv/disk6/3951199/www/ip-labs-istbd-32.atwebpages.com/lab4/tpls/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_61a75640743123_38144976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e82f1d23b14eb37573d7a4b9455690450574b6d' => 
    array (
      0 => '/srv/disk6/3951199/www/ip-labs-istbd-32.atwebpages.com/lab4/tpls/main.tpl',
      1 => 1638356540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a75640743123_38144976 (Smarty_Internal_Template $_smarty_tpl) {
?>  <div class="workspace" align="left">
   Введите адрес сайта для грабинга ссылок.
   <form action="processor.php"enctype="multipart/form-data" method="post">
            <p>Адресс <input type="text" name="addr" placeholder="http://Example"></input></p>        
            <p><input type="submit" value="Обработать"></p>
   </form> 
  </div><?php }
}
