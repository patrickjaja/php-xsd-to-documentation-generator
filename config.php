<?php 

require_once("gui.load.php");
$gui=new GuiLoader("theme1.php");

echo $gui->getHTML();