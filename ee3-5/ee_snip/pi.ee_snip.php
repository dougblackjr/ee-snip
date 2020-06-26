<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ee_snip {

	public $return_data = "";

	public function __construct()
	{
		
		// Get text
		$text = ee()->TMPL->tagdata;

		// Get params
		$options = ee()->TMPL->fetch_param('options', '');
		$isSnippet = ee()->TMPL->fetch_param('snippet', 0);
		$replace = ee()->TMPL->fetch_param('replace');
		$replaceWith = ee()->TMPL->fetch_param('replace_with');

		// Remove HTML
		$text = strip_tags($text);

		// Remove line breaks
		$text = preg_replace( "/\r|\n|\"|\\\|\\/|\t|\\'/", "", $text );

		// Do replacements
		if($replace) {
			$text = $this->processReplace($text, $replace, $replaceWith);
		}

		// Snip it
		if ($isSnippet > 0) {
			$text = $this->shorten_string($text, $isSnippet);
		}

		// Return it
		$this->return_data = $text;

	}

	/**
	 * shortens the string
	 * @var $string = string
	 * @var  $wordsreturned = How many words would you like to return
	 * @return string = snipped string
	 */
	private function shorten_string($string, $wordsreturned) {
		
		$retval = $string;
		$string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
		$string = str_replace("\n", " ", $string);
		$array = explode(" ", $string);
		if (count($array)<=$wordsreturned)
		{
			$retval = $string;
		}
		else
		{
			array_splice($array, $wordsreturned);
			$retval = implode(" ", $array)." ...";
		}
		return $retval;
	}

	/**
	 * replaces one string with another
	 * @param  string $text
	 * @param  string $replace
	 * @param  string $replaceWith
	 * @return string
	 */
	private function processReplace($text, $replace, $replaceWith)
	{

		return str_replace($replace, $replaceWith, $text);

	}

}