<?php

//
// PHASE: BOOTSTRAP
//
define('FLOYD_INSTALL_PATH', dirname(__FILE__));
define('FLOYD_SITE_PATH', FLOYD_INSTALL_PATH . '/site');

require(FLOYD_INSTALL_PATH.'/src/bootstrap.php');

$fl = CFloyd::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$fl->FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
//
$fl->ThemeEngineRender();