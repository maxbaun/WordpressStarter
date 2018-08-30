<?php

namespace ThemeName;

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
	require_once( __DIR__ . '/vendor/autoload.php');
}



require_once(__DIR__ . '/lib/setup.php');
require_once(__DIR__ . '/lib/plugin-activation.php');
require_once(__DIR__ . '/lib/plugins.php');

use Timber;

if (class_exists('Timber\Timber')) {
	new Timber\Timber();
}

new Setup();
new Plugins();
