<?php

define( 'ROOT_DIR', dirname( __FILE__ ) );
define( 'ROOT_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . str_replace( 'index.php', '', $_SERVER['SCRIPT_NAME'] ) );

require_once ROOT_DIR . '/config.php';
require_once ROOT_DIR . '/classes/class-items.php';
require_once ROOT_DIR . '/classes/class-controller.php';
require_once ROOT_DIR . '/classes/class-database.php';
require_once ROOT_DIR . '/classes/class-model.php';
require_once ROOT_DIR . '/controllers/class-entry-list.php';
require_once ROOT_DIR . '/controllers/class-form.php';
require_once ROOT_DIR . '/controllers/class-not-found.php';
