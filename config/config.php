<?php
// config/config.php
require_once LIB.'smarty/libs/Smarty.class.php';
define("DBHOST", "localhost");
define("DBUSER", "crm_brx");
define("DBPASS", "5MlqQssgZ1qwn7vs");
define("DBNAME", "ai");
define("COLLATE", "utf8");

$smarty = new \Smarty\Smarty;
$smarty->debugging = true;
$smarty->caching = false;
$smarty->cache_lifetime = 1;

?>