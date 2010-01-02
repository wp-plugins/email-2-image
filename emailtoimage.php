<?php
/*
Plugin Name: Email to Image
Description: Scan comments, pages and post for email addresses and swap them form cool images to avoid spamming email harversting bots with some style. <a href="http://anduriell.es"> Donate and Support Here</a>
Version: 1
License: GPL
Author: Arturo Emilio (Anduriell)
Author URI: http://anduriell.es
*/
/*  Copyright 2009  Arturo Emilio  (email : anduriell@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/



define( "ADDR_PATTERN",
        "(?P<email>[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4})" );





function em($xxx) {
   


 


  $xxx = preg_replace("|mailto:".ADDR_PATTERN."|i", '$1', $xxx);

   


  $xxx = preg_replace_callback(
    "/\[([^]]+)]([\s]|&nbsp;)*".ADDR_PATTERN."/i",
    create_function(
        '$match',
      '			$htp = get_option(siteurl)."/wp-content/chtem/";
			list ( $us, $do ) = split ("@",$match[0]);
			if (($f = ima($us,$do)) == "FALSE"){ $dd = $us."@".$do;}
			else{ $dd = "<img src=".$htp.$f." />";}
			return $dd;' ),
    $xxx );


  $xxx = preg_replace_callback(
    '|'.ADDR_PATTERN.'|i',
    create_function(
        '$match',
      '			$htp = get_option(siteurl)."/wp-content/chtem/";
			list ( $us, $do ) = split ("@",$match[0]);
			if (($f = ima($us,$do)) == "FALSE"){ $dd = $us."@".$do;}
			else {$dd = "<img src=".$htp.$f." />";}
			return $dd;' ),
    $xxx );


  return $xxx;
}

function hexrgb($hexstr, $rgb){ //
 $int = hexdec(str_replace("#", '', $hexstr));
 switch($rgb) {
		case "r":
		return 0xFF & $int >> 0x10;
			break;
		case "g":
		return 0xFF & ($int >> 0x8);
			break;
		case "b":
		return 0xFF & $int;
			break;
		default:
		return array(
			"r" => 0xFF & $int >> 0x10,
			"g" => 0xFF & ($int >> 0x8),
			"b" => 0xFF & $int
			);
			break;
	}    
}

function ima($user,$hst){
	
	
              

	$urs = trim($user); 
	$fgh = $urs.$hst;
	$fgh = str_rot13($fgh);
	$htpabs = ABSPATH . 'wp-content/';
        
        if(!file_exists($htpabs ."/chtem")){ 
			mkdir($htpabs ."/chtem");
		}

	

	if(file_exists($htpabs."chtem/".$fgh.".png")){
		$fgh = $fgh.".png";	
		return $fgh;
	}else {
	   	$back_c = "#ffffff"; 
		$border_c = '#000'; 
		$font_c = '#ff0000'; 
		$font_size = '12'; 

		$font_url = ABSPATH . 'wp-content/plugins/andumail/arial.ttf'; 
                $srcUrl = ABSPATH . 'wp-content/plugins/andumail/'.$hst.'.gif'; 
		$htpabs = ABSPATH . 'wp-content/';

		$is_border = 0; 
		
      		if($hst) $is_logo = 1; else $is_logo=0; 

		$srcWidth = 0;
		$srcHeight = 0;

		$str_pos = imagettfbbox($font_size,0,$font_url,$urs);
		$str_width = intval($str_pos[2]); 
		$str_height = intval(str_replace("-","",$str_pos[5])); 


		if($is_logo){
			if(!file_exists($srcUrl)){
			        $fgh = "FALSE";
                                return $fgh;
			}
			$origImg = ImageCreateFromGIF($srcUrl);
			$srcWidth = intval(imagesx($origImg)); 
			$srcHeight = intval(imagesy($origImg)); 
		}

		$newWidth = $str_width + 15 + $srcWidth; 
		$newHeight = ($srcHeight>$str_height) ? $srcHeight+2 : $str_height+8;

		$image=imagecreatetruecolor($newWidth, $newHeight); 

		$back_color = hexrgb($back_c,rgb); 
		$back = imagecolorallocate($image, $back_color['r'], $back_color['g'], $back_color['b']); 
		imagefilledrectangle($image, 0, 0, $newWidth - 1, $newHeight - 1, $back); 

		if($is_border){
			$border_color = hexrgb($border_c,rgb); 
			$border = imagecolorallocate($image, $border_color['r'], $border_color['g'], $border_color['b']); //±ß¿òÑÕÉ«
			imagerectangle($image, 0, 0, $newWidth - 1, $newHeight - 1, $border); 
		}

		if($is_logo){
			$srcX = $str_width+10; 
			$srcY = ($newHeight - $srcHeight)/2; 
			ImageCopy($image, $origImg, $srcX,$srcY,0,0,$srcWidth,$srcHeight);
		}

		$font_color = hexrgb($font_c,rgb); 
		$color = imagecolorallocate($image, $font_color['r'], $font_color['g'], $font_color['b']); 
		$str_x = $str_height+($newHeight-$str_height)/2;
		if(!$is_logo) $str_x-=2; 
		imagettftext($image, $font_size, 0, 6, $str_x, $color, $font_url, $urs); 
                

		
		//header("Content-type: image/png");	
		imagepng($image,$htpabs."chtem/".$fgh.".png"); 
		imagedestroy($image);
               // header("location: ?show=".$fgh);
		return $fgh;
	}
    
}




add_filter('the_content', 'em');
add_filter('the_excerpt', 'em');
add_filter('comment_text', 'em',20); 
add_filter('widget_text', 'em');
add_filter('author_email', 'em');
add_filter('comment_email', 'em');
add_filter('the_content_rss', 'em');

?>