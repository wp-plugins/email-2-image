<<<<<<< .mine
<?php
/*
Plugin Name: Email to Image
Description: Scan comments, pages and post for email addresses and swap them form cool images to avoid spamming email harversting bots with some style. <a href="http://anduriell.es"> Donate and Support Here</a>
Version: 2.0
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

add_action('admin_menu', 'menu');
function menu() {
	add_options_page('Email2Image', 'Email2Image', 10, __FILE__, 'opt');
}

function opt() {
	
	$pluginURL = get_option(siteurl)."/wp-content/plugins/email-2-image/";
	$hd = 'submit1';

	$tcl = get_option('tcl');
	$tsz = get_option('tsz');
	if($_POST[ $hd ] == '1' ) {
		$tcl = $_POST['tcl'];
		$tsz = $_POST['tsz'];
		if (!is_numeric($tsz)) $tsz = 12;
		if (($tsz < 8) OR ($tsz>22)) $tsz = 12;
		if (!$tcl) $tcl = '#000000';
		update_option('tcl', $tcl);
		update_option('tsz', $tsz);
		upt();
?>

	<div id="message">
  		<p><strong>Saved.</strong></p>
	</div>
<?php	} ?>

	<div style="margin-left: 500px; margin-top: 100px" id="colorpicker301" class="colorpicker301"></div>
	<div class="wrap">
	<h2>Email2Image By Anduriell</h2>
	<form name="forma" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  		<input type="hidden" name="<?php echo $hd; ?>" value="1">

		<table class="form-table" style="border-bottom: 1px solid #aaa">

			<tr valign="top">
				<th scope="row">Color:</th>
				<td>
					<input id="txtcl" type="text" name="tcl" value="<?php echo $tcl; ?>" /> 
					<img src="<?php echo $pluginURL; ?>select.jpg" onClick="showColorGrid3('txtcl','none');" title="Select color" style="vertical-align: bottom" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Size [8 - 22]:</th>
				<td>
					<input type="text" name="tsz" value="<?php echo $tsz; ?>" /> 
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" class="button-primary" value="Save Options" />
		</p>
	</form>
	</div>
<script type="text/javascript">function getScrollY(){var scrOfX = 0,scrOfY=0;if(typeof(window.pageYOffset)=='number'){scrOfY=window.pageYOffset;scrOfX=window.pageXOffset;}else if(document.body&&(document.body.scrollLeft||document.body.scrollTop)){scrOfY=document.body.scrollTop;scrOfX=document.body.scrollLeft;}else if(document.documentElement&&(document.documentElement.scrollLeft||document.documentElement.scrollTop)){scrOfY=document.documentElement.scrollTop;scrOfX=document.documentElement.scrollLeft;}return scrOfY;}document.write("<style>.colorpicker301{text-align:center;visibility:hidden;display:none;position:absolute;background-color:#FFF;border:solid 1px #CCC;padding:4px;z-index:999;filter:progid:DXImageTransform.Microsoft.Shadow(color=#D0D0D0,direction=135);}.o5582brd{border-bott6om:solid 1px #DFDFDF;border-right:solid 1px #DFDFDF;padding:0;width:12px;height:14px;}a.o5582n66,.o5582n66,.o5582n66a{font-family:arial,tahoma,sans-serif;text-decoration:underline;font-size:9px;color:#666;border:none;}.o5582n66,.o5582n66a{text-align:center;text-decoration:none;}a:hover.o5582n66{text-decoration:none;color:#FFA500;cursor:pointer;}.a01p3{padding:1px 4px 1px 2px;background:whitesmoke;border:solid 1px #DFDFDF;}</style>");function gett6op6(){csBrHt=0;if(typeof(window.innerWidth)=='number'){csBrHt=window.innerHeight;}else if(document.documentElement&&(document.documentElement.clientWidth||document.documentElement.clientHeight)){csBrHt=document.documentElement.clientHeight;}else if(document.body&&(document.body.clientWidth||document.body.clientHeight)){csBrHt=document.body.clientHeight;}ctop=((csBrHt/2)-132)+getScrollY();return ctop;}function getLeft6(){var csBrWt=0;if(typeof(window.innerWidth)=='number'){csBrWt=window.innerWidth;}else if(document.documentElement&&(document.documentElement.clientWidth||document.documentElement.clientHeight)){csBrWt=document.documentElement.clientWidth;}else if(document.body&&(document.body.clientWidth||document.body.clientHeight)){csBrWt=document.body.clientWidth;}cleft=(csBrWt/2)-125;return cleft;}var nocol1="&#78;&#79;&#32;&#67;&#79;&#76;&#79;&#82;",clos1="&#67;&#76;&#79;&#83;&#69;",tt6="&#70;&#82;&#69;&#69;&#45;&#67;&#79;&#76;&#79;&#82;&#45;&#80;&#73;&#67;&#75;&#69;&#82;&#46;&#67;&#79;&#77;",hm6="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;";hm6+=tt6;tt6="&#80;&#79;&#87;&#69;&#82;&#69;&#68;&#32;&#98;&#121;&#32;&#70;&#67;&#80;";function setCCbldID6(objID,val){document.getElementById(objID).value=val;}function setCCbldSty6(objID,prop,val){switch(prop){case "bc":if(objID!='none'){document.getElementById(objID).style.backgroundColor=val;}break;case "vs":document.getElementById(objID).style.visibility=val;break;case "ds":document.getElementById(objID).style.display=val;break;case "tp":document.getElementById(objID).style.top=val;break;case "lf":document.getElementById(objID).style.left=val;break;}}function putOBJxColor6(OBjElem,Samp,pigMent){if(pigMent!='x'){setCCbldID6(OBjElem,pigMent);setCCbldSty6(Samp,'bc',pigMent);}setCCbldSty6('colorpicker301','vs','hidden');setCCbldSty6('colorpicker301','ds','none');}function showColorGrid3(OBjElem,Sam){var objX=new Array('00','33','66','99','CC','FF');var c=0;var z='"'+OBjElem+'","'+Sam+'",""';var xl='"'+OBjElem+'","'+Sam+'","x"';var mid='';mid+='<center><table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="border:solid 1px #F0F0F0;padding:2px;"><tr>';mid+="<td colspan='18' align='left' style='font-size:10px;background:#6666CC;color:#FFF;font-family:arial;'>&nbsp;Combo-Chromatic Selection Palette</td></tr><tr><td colspan='18' align='center' style='margin:0;padding:2px;height:14px;' ><input class='o5582n66' type='text' size='10' id='o5582n66' value='#FFFFFF'><input class='o5582n66a' type='text' size='2' style='width:14px;' id='o5582n66a' onclick='javascript:alert(\"click on selected swatch below...\");' value='' style='border:solid 1px #666;'>&nbsp;|&nbsp;<a class='o5582n66' href='javascript:onclick=putOBJxColor6("+z+")'><span class='a01p3'>"+nocol1+"</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='o5582n66' href='javascript:onclick=putOBJxColor6("+xl+")'><span class='a01p3'>"+clos1+"</span></a></td></tr><tr>";var br=1;for(o=0;o<6;o++){mid+='</tr><tr>';for(y=0;y<6;y++){if(y==3){mid+='</tr><tr>';}for(x=0;x<6;x++){var grid='';grid=objX[o]+objX[y]+objX[x];var b="'"+OBjElem+"', '"+Sam+"','#"+grid+"'";mid+='<td class="o5582brd" style="background-color:#'+grid+'"><a class="o5582n66"  href="javascript:onclick=putOBJxColor6('+b+');" onmouseover=javascript:document.getElementById("o5582n66").value="#'+grid+'";javascript:document.getElementById("o5582n66a").style.backgroundColor="#'+grid+'";  title="#'+grid+'"><div style="width:12px;height:14px;"></div></a></td>';c++;}}}mid+='</tr></table>';var objX=new Array('0','3','6','9','C','F');var c=0;var z='"'+OBjElem+'","'+Sam+'",""';var xl='"'+OBjElem+'","'+Sam+'","x"';mid+='<table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="border:solid 1px #F0F0F0;padding:1px;"><tr>';var br=0;for(y=0;y<6;y++){for(x=0;x<6;x++){if(br==18){br=0;mid+='</tr><tr>';}br++;var grid='';grid=objX[y]+objX[x]+objX[y]+objX[x]+objX[y]+objX[x];var b="'"+OBjElem+"', '"+Sam+"','#"+grid+"'";mid+='<td class="o5582brd" style="background-color:#'+grid+'"><a class="o5582n66"  href="javascript:onclick=putOBJxColor6('+b+');" onmouseover=javascript:document.getElementById("o5582n66").value="#'+grid+'";javascript:document.getElementById("o5582n66a").style.backgroundColor="#'+grid+'";  title="#'+grid+'"><div style="width:12px;height:14px;"></div></a></td>';c++;}}mid+="</tr><tr><td colspan='18' align='right' style='padding:2px;border:solid 1px #FFF;background:#FFF;'><a href='"+hm6+"' style='color:#666;font-size:8px;font-family:arial;text-decoration:none;lett6er-spacing:1px;'>"+tt6+"</a></td>";mid+='</tr></table></center>';setCCbldSty6('colorpicker301','tp','100px');document.getElementById('colorpicker301').style.top=gett6op6();document.getElementById('colorpicker301').style.left=getLeft6();setCCbldSty6('colorpicker301','vs','visible');setCCbldSty6('colorpicker301','ds','block');document.getElementById('colorpicker301').innerHTML=mid;}</script>
<?php
} 

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

function hexrgb($hexstr, $rgb){ 
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
		$font_c = get_option('tcl'); 
		$font_size = get_option('tsz'); 
		$font_url = ABSPATH . 'wp-content/plugins/email-2-image/arial.ttf'; 
                $srcUrl = ABSPATH . 'wp-content/plugins/email-2-image/'.$hst.'.gif'; 
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
			$border = imagecolorallocate($image, $border_color['r'], $border_color['g'], $border_color['b']); 
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
		imagepng($image,$htpabs."chtem/".$fgh.".png"); 
		imagedestroy($image);
                return $fgh.".png";
	}
}

function upt() {
$sDir = ABSPATH . 'wp-content/chtem';
if (is_dir($sDir)) {
$sDir = rtrim($sDir, '/');
$oDir = dir($sDir);
while (($sFile = $oDir->read()) !== false) {
if ($sFile != '.' && $sFile != '..') {
(!is_link("$sDir/$sFile") && is_dir("$sDir/$sFile")) ? upt() : unlink("$sDir/$sFile");
}
}
$oDir->close();
return true;
}
return false;
}


add_filter('the_content', 'em');
add_filter('the_excerpt', 'em');
add_filter('comment_text', 'em',20); 
add_filter('widget_text', 'em');
add_filter('author_email', 'em');
add_filter('comment_email', 'em');
add_filter('the_content_rss', 'em');
=======
<?php
/*
Plugin Name: Email to Image
Description: Scan comments, pages and post for email addresses and swap them form cool images to avoid spamming email harversting bots with some style. <a href="http://anduriell.es"> Donate and Support Here</a>
Version: 1.1
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

function hexrgb($hexstr, $rgb){ 
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

		$font_url = ABSPATH . 'wp-content/plugins/email-2-image/arial.ttf'; 
                $srcUrl = ABSPATH . 'wp-content/plugins/email-2-image/'.$hst.'.gif'; 
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
			$border = imagecolorallocate($image, $border_color['r'], $border_color['g'], $border_color['b']); 
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
                

		
		imagepng($image,$htpabs."chtem/".$fgh.".png"); 
		imagedestroy($image);
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

>>>>>>> .r190573
?>