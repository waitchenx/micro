<?php

if (version_compare(PHP_VERSION, '5.6.1', '<')) {
    die('require PHP > 5.6.1 !');
}
/**
 * 引入框架目录.
 */
require __DIR__ .'/../micro.php';