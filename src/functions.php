<?php

namespace ThemeName;

if (!defined(ABSPATH)) {
    die();
}

$autoload = ABSPATH . 'vendor/autoload.php';

if (file_exists($autoload)) {
    require_once($autoload);
}

require_once(__DIR__ . '/lib/setup.php');
require_once(__DIR__ . '/lib/pluginActivation.php');
require_once(__DIR__ . '/lib/plugins.php');
require_once(__DIR__ . '/lib/timberContext.php');

use Timber;

if (class_exists('Timber\Timber')) {
    new Timber\Timber();
}

new Setup();
new Plugins();
new TimberContext();
