<?php

if (!class_exists('Timber\Timber')) {
	die();
}

$context = Timber\Timber::get_context();

Timber\Timber::render('templates/pages/index.twig', $context);
