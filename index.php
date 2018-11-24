<?php
  include 'controllers\MenuController.php';
	use controllers\MenuController as menu;

	$menu = new menu;
  $menu->index();
?>
