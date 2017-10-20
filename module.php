<?php
namespace TryPhp;

/**
 * Function to strip control characters from a string, weak ones like \t and \n will be just replaced with a single space to 
 * keep the semantical correctness of the text
 * @param string $content
 * @return string
 */
function stripControlCharacters(string $content): string {
	$removedStrongControlCharacters = str_replace([
		"\a",
		"\0",
		"\b",
		"\v",
		"\f",
		"\r",
		"\e"
	], '', $content);

	$replacedWeakControlCharacters = str_replace([
		"\t",
		"\n"
	], ' ', $removedStrongControlCharacters);

	return $replacedWeakControlCharacters;
}

/**
 * Function to remove color escape characters from text content
 * @param string $content
 * @return string
 */
function stripColorCharacters(string $content): string {
	$removedColorCharacter = preg_replace('/\\e\[\d+m/', '', $content);
	return $removedColorCharacter;
}
