<?php
// Get errors.
error_reporting(-1);
ini_set("display_errors", 1);

// DSN.
$nvm1 = dirname(__DIR__, 1) . "/db/nvm.sqlite";
$dsnNVM1 = "sqlite:$nvm1";
$nvm2 = dirname(__DIR__, 1) . "/db/nvm2.sqlite";
$dsnNVM2 = "sqlite:$nvm2";
