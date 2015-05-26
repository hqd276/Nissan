<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('add_array_key'))
{
	function add_array_key($field, $array)
	{
		$data = array();
		foreach ($array as $key => $value) {
			$data[$value[$field]] = $value;
		}

		return $data;
	}
}

if ( ! function_exists('split_char'))
{
	function split_char($str, $limit = 150, $opt = 0) {  
	    $string = mb_substr($str,0, $limit, 'UTF-8');
	    if($opt == 1) { // Kiểu cắt thêm
	        $tempLen = mb_strlen($string);
	        for($i = $limit; $i < $tempLen; $i++) {
	            $str_tmp = mb_substr($str, $i,1, 'UTF-8');
	            if($str_tmp != ' ') {
	                $string .= $str_tmp;
	            }
	            else { break; die(); }
	        }
	    }
	    elseif($opt == 0) { //Kiểu cắt bớt
	        for($i = $limit; $i > 2; $i--) {
	            $str_tmp = mb_substr($str, $i, 1, 'UTF-8');
	            if($str_tmp != ' ') {
	                $string = mb_substr($string,0, -1, 'UTF-8');
	            }
	            else {break;}
	        }
	    }

	    return $string;
	}
}
if ( ! function_exists('safe_title'))
{
	function safe_title($text, $special_char = "-")
    {
        $text = post_db_parse_html($text);
        $text = stripUnicode($text);
        $text = _name_cleaner($text, $special_char);
        $text = str_replace("----", "-", $text);
        $text = str_replace("---", "-", $text);
        $text = str_replace("--", "-", $text);
        $text = trim($text, '-');
        $text = str_replace("/", "", $text);

        if ($text) {
            return $text;
        } else {
            return "";
        }
    }
}
if ( ! function_exists('post_db_parse_html'))
{
	function post_db_parse_html($t = "")
    {
        if ($t == "") {
            return $t;
        }

        //-----------------------------------------
        // Remove <br>s 'cos we know they can't
        // be user inputted, 'cos they are still
        // &lt;br&gt; at this point :)
        //-----------------------------------------

        /* 		if ( $this->pp_nl2br != 1 )
          {
          $t = str_replace( "<br>"    , "\n" , $t );
          $t = str_replace( "<br />"  , "\n" , $t );
          } */

        $t = str_replace("&#39;", "'", $t);
        $t = str_replace("&#33;", "!", $t);
        $t = str_replace("&#036;", "$", $t);
        $t = str_replace("&#124;", "|", $t);
        $t = str_replace("&amp;", "&", $t);
        $t = str_replace("&gt;", ">", $t);
        $t = str_replace("&lt;", "<", $t);
        $t = str_replace("&quot;", '"', $t);

        //-----------------------------------------
        // Take a crack at parsing some of the nasties
        // NOTE: THIS IS NOT DESIGNED AS A FOOLPROOF METHOD
        // AND SHOULD NOT BE RELIED UPON!
        //-----------------------------------------

        $t = preg_replace("/javascript/i", "j&#097;v&#097;script", $t);
        $t = preg_replace("/alert/i", "&#097;lert", $t);
        $t = preg_replace("/about:/i", "&#097;bout:", $t);
        $t = preg_replace("/onmouseover/i", "&#111;nmouseover", $t);
        $t = preg_replace("/onmouseout/i", "&#111;nmouseout", $t);
        $t = preg_replace("/onclick/i", "&#111;nclick", $t);
        $t = preg_replace("/onload/i", "&#111;nload", $t);
        $t = preg_replace("/onsubmit/i", "&#111;nsubmit", $t);
        $t = preg_replace("/object/i", "&#111;bject", $t);
        $t = preg_replace("/frame/i", "fr&#097;me", $t);
        $t = preg_replace("/applet/i", "&#097;pplet", $t);
        $t = preg_replace("/meta/i", "met&#097;", $t);
        $t = preg_replace("/embed/i", "met&#097;", $t);

        return $t;
    }
}
if ( ! function_exists('stripUnicode'))
{
	function stripUnicode($str)
    {
        if (!$str)
            return false;
        $marTViet = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă",
            "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề"
        , "ế", "ệ", "ể", "ễ",
            "ì", "í", "ị", "ỉ", "ĩ",
            "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ"
        , "ờ", "ớ", "ợ", "ở", "ỡ",
            "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
            "ỳ", "ý", "ỵ", "ỷ", "ỹ",
            "đ",
            "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă"
        , "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
            "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
            "Ì", "Í", "Ị", "Ỉ", "Ĩ",
            "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ"
        , "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
            "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
            "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
            "Đ");

        $marKoDau = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a"
        , "a", "a", "a", "a", "a", "a",
            "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
            "i", "i", "i", "i", "i",
            "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o"
        , "o", "o", "o", "o", "o",
            "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
            "y", "y", "y", "y", "y",
            "d",
            "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A"
        , "A", "A", "A", "A", "A",
            "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
            "I", "I", "I", "I", "I",
            "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O"
        , "O", "O", "O", "O", "O",
            "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
            "Y", "Y", "Y", "Y", "Y",
            "D");

        $str = str_replace($marTViet, $marKoDau, $str);
        return $str;
    }
}
if ( ! function_exists('_name_cleaner'))
{
	function _name_cleaner($name, $replace_string = "_")
    {
        return preg_replace("/[^a-zA-Z0-9\-\_\/\.,]/", $replace_string, $name);
    }
}
?>