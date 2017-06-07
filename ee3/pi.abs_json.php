<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'abs_json',
	'pi_version' => '1.0',
	'pi_author' => 'Noble Studios',
	'pi_author_url' => 'http://noblestudios.com/',
	'pi_description' => 'Returns the input string in JSON friendly form.',
	'pi_usage' => Abs_json::usage()
);

	class Abs_json {

		public $return_data = "";

		public function __construct() {
			$this->EE =& get_instance();
			# Get text
			$text = $this->EE->TMPL->tagdata;

	        # Get params
	        $options = $this->EE->TMPL->fetch_param('options','');
			$isSnippet = $this->EE->TMPL->fetch_param('snippet',0);

			# REMOVE HTML
			$text = strip_tags($text);

			# REMOVE LINE BREAKS
			$text =preg_replace( "/\r|\n|\"|\\\|\\/|\t|\\'/", "", $text );

			# SNIP IT
			if ($isSnippet > 0) {
				$text = $this->shorten_string($text, $isSnippet);
			}

			# RETURN IT
			$this->return_data = $text;
		}

		function shorten_string($string, $wordsreturned) {
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

		static function usage() {
			ob_start();
			include "usage.php";
			$buffer = ob_get_contents();
			ob_end_clean();
			return $buffer;
		}

	}

?>