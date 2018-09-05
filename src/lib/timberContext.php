<?php

namespace ThemeName;

use Timber;

class TimberContext
{
	public function __construct() {
		add_filter('timber/context', array($this, 'commonContext'));
	}

	public function commonContext($context) {
		$context['post'] = new Timber\Post();
		$context['mainNav'] = new Timber\Menu('Main Nav');

		return $context;
	}
}
