<?php

function convert_hastag($text) {
  	$text = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $text);
  	$text = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text);
  	$text = preg_replace("/@(\w+)/", "<a href=\"".base_url()."/\\1\" target=\"_blank\">@\\1</a>", $text);
  	$text = preg_replace("/#(\w+)/", "<a href=\"".base_url()."/search?q=\\1\" target=\"_blank\">#\\1</a>", $text);
	return trim($text);
}

function display_time_ago($timestamp){    		
	$time = explode(',', timespan($timestamp, time()));
	return strtolower("$time[0]");
}