<?php

if (!class_exists('Timber\Timber')) {
	die();
}

$context = Timber\Timber::get_context();
$context['post'] = new Timber\Post();
Timber\Timber::render('templates/pages/index.twig', $context);
