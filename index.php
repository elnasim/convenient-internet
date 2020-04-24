<?php

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Db.php');

$db = new Db();

require_once(ROOT.'/components/Router.php');
