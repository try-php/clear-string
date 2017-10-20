<?php
require_once __DIR__ . '/vendor/autoload.php';

use function TryPhp\{stripControlCharacters, stripColorCharacters};

$shouldBeRemoved = "\a\0\b\v\f\r\e";
$toBeTested = stripControlCharacters($shouldBeRemoved);

if ($toBeTested !== '') {
	trigger_error('test failed', E_USER_ERROR);
}

$shouldBeReplaced = "\nSome\tThings\t";
$toBeTested = trim(stripControlCharacters($shouldBeReplaced));

if ($toBeTested !== 'Some Things') {
	trigger_error('test failed', E_USER_ERROR);
}

$shouldBeReplaced = " ";
$toBeTested = stripControlCharacters($shouldBeReplaced);

if ($toBeTested !== ' ') {
	trigger_error('test failed', E_USER_ERROR);
}

$shouldBeRemoved ="\e[34mSome String\e[0m";
$toBeTested = stripColorCharacters($shouldBeRemoved);

if ($toBeTested !== 'Some String') {
	trigger_error('test failed', E_USER_ERROR);
}

$shouldBeSimplified = trim(stripControlCharacters(stripColorCharacters("\t\n\e[34mSome String\e[0m\n\e[34mSome String\e[0m\n\e[34mSome String\e[0m")));
if ($shouldBeSimplified !== 'Some String Some String Some String') {
	trigger_error('test failed', E_USER_ERROR);
}