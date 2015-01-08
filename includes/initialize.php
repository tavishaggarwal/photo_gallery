<?php

defined('DS') ? null : define('DS',DIRECTORY_SEPERATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT',DS.'var' .DS.'www'.DS.'html'.DS.'photo_gallery');

defined('LIB_PATH') ? null : define('LIB_PATH',SITE_ROOT.DS.'includes');

require_once (LIB_PATH.DS.'session.php');
require_once (LIB_PATH.DS.'database.php');
?>