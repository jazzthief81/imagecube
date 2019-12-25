<?php
/*
 * ImageCube by Lars Vandenbergh
 * 3rd septmber 2004
 *
 * A PHP script for generating static 3D views of the 3x3x3 Rubik's Cube 
 */
 
// initialize paramaters
import_request_variables("PG","");
if(!$size){
  $size=200;
}
$scale=2;
$scalepx=$size*$scale/200;
$im = imagecreate($size*$scale,$size*$scale);
imageantialias ($im,true);

// allocate colors
$back = imagecolorallocate($im, 255, 255, 255);
$col_poly = imagecolorallocate($im, 0, 0, 0);
$red = imagecolorallocate($im, 200, 0, 0);
$orange = imagecolorallocate($im, 255, 161, 0);
$blue = imagecolorallocate($im, 0, 0, 182);
$green = imagecolorallocate($im, 0, 182, 72);
$white = imagecolorallocate($im,247,247,247);
$yellow = imagecolorallocate($im, 239, 239, 0);
$grey = imagecolorallocate($im, 200, 200, 200);
$colors=array("r"=>$red,
  "o"=>$orange,
  "b"=>$blue,
  "g"=>$green,
  "w"=>$white,
  "y"=>$yellow,
  "x"=>$grey);
  
// draw cube silhouette
imagepolygon($im, 
             array (
                   78*$scalepx, 16*$scalepx,
                   183*$scalepx, 28*$scalepx,
                   185*$scalepx, 133*$scalepx,
                   141*$scalepx, 194*$scalepx,
                   31*$scalepx, 168*$scalepx,
                   15*$scalepx,62*$scalepx
             ),
             6,
             $col_poly);
// draw inner edges
imageline($im,134*$scalepx,78*$scalepx,183*$scalepx,28*$scalepx,$col_poly);
imageline($im,134*$scalepx,78*$scalepx,141*$scalepx,194*$scalepx,$col_poly);
imageline($im,134*$scalepx,78*$scalepx,15*$scalepx,62*$scalepx,$col_poly);
// draw BEF layers
imageline($im,60*$scalepx,29*$scalepx,168*$scalepx,43*$scalepx,$col_poly);
imageline($im,168*$scalepx,43*$scalepx,172*$scalepx,151*$scalepx,$col_poly);
imageline($im,39*$scalepx,45*$scalepx,151*$scalepx,60*$scalepx,$col_poly);
imageline($im,151*$scalepx,60*$scalepx,158*$scalepx,171*$scalepx,$col_poly);
// draw LMR layers
imageline($im,108*$scalepx,19*$scalepx,54*$scalepx,66*$scalepx,$col_poly);
imageline($im,54*$scalepx,66*$scalepx,65*$scalepx,177*$scalepx,$col_poly);
imageline($im,144*$scalepx,23*$scalepx,93*$scalepx,73*$scalepx,$col_poly);
imageline($im,93*$scalepx,73*$scalepx,103*$scalepx,185*$scalepx,$col_poly);
// draw UED layers
imageline($im,21*$scalepx,100*$scalepx,136*$scalepx,119*$scalepx,$col_poly);
imageline($im,136*$scalepx,119*$scalepx,184*$scalepx,66*$scalepx,$col_poly);
imageline($im,26*$scalepx,136*$scalepx,138*$scalepx,158*$scalepx,$col_poly);
imageline($im,138*$scalepx,158*$scalepx,185*$scalepx,102*$scalepx,$col_poly);

//UBL sticker
imagefill($im,$scalepx*85,25*$scalepx,$colors[substr($stickers,0,1)]);
//UB sticker
imagefill($im,$scalepx*123,30*$scalepx,$colors[substr($stickers,1,1)]);
//UBR sticker
imagefill($im,$scalepx*158,32*$scalepx,$colors[substr($stickers,2,1)]);
//UL sticker
imagefill($im,$scalepx*71,40*$scalepx,$colors[substr($stickers,3,1)]);
//U sticker
imagefill($im,$scalepx*101,40*$scalepx,$colors[substr($stickers,4,1)]);
//UR sticker
imagefill($im,$scalepx*143,46*$scalepx,$colors[substr($stickers,5,1)]);
//UFL sticker
imagefill($im,$scalepx*43,56*$scalepx,$colors[substr($stickers,6,1)]);
//UF sticker
imagefill($im,$scalepx*88,57*$scalepx,$colors[substr($stickers,7,1)]);
//UFR sticker
imagefill($im,$scalepx*121,63*$scalepx,$colors[substr($stickers,8,1)]);
//FLU sticker
imagefill($im,$scalepx*35,91*$scalepx,$colors[substr($stickers,9,1)]);
//FU sticker
imagefill($im,$scalepx*78,91*$scalepx,$colors[substr($stickers,10,1)]);
//FRU sticker
imagefill($im,$scalepx*120,91*$scalepx,$colors[substr($stickers,11,1)]);
//FL sticker
imagefill($im,$scalepx*40,135*$scalepx,$colors[substr($stickers,12,1)]);
//F sticker
imagefill($im,$scalepx*80,135*$scalepx,$colors[substr($stickers,13,1)]);
//FR sticker
imagefill($im,$scalepx*120,135*$scalepx,$colors[substr($stickers,14,1)]);
//FDL sticker
imagefill($im,$scalepx*50,170*$scalepx,$colors[substr($stickers,15,1)]);
//FD sticker
imagefill($im,$scalepx*90,170*$scalepx,$colors[substr($stickers,16,1)]);
//FDR sticker
imagefill($im,$scalepx*130,170*$scalepx,$colors[substr($stickers,17,1)]);
//RUF sticker
imagefill($im,$scalepx*146,87*$scalepx,$colors[substr($stickers,18,1)]);
//RU sticker
imagefill($im,$scalepx*162,68*$scalepx,$colors[substr($stickers,19,1)]);
//RUB sticker
imagefill($im,$scalepx*177,51*$scalepx,$colors[substr($stickers,20,1)]);
//RF sticker
imagefill($im,$scalepx*150,130*$scalepx,$colors[substr($stickers,21,1)]);
//R sticker
imagefill($im,$scalepx*160,110*$scalepx,$colors[substr($stickers,22,1)]);
//RB sticker
imagefill($im,$scalepx*180,95*$scalepx,$colors[substr($stickers,23,1)]);
//RFD sticker
imagefill($im,$scalepx*150,170*$scalepx,$colors[substr($stickers,24,1)]);
//RD sticker
imagefill($im,$scalepx*160,145*$scalepx,$colors[substr($stickers,25,1)]);
//RFD sticker
imagefill($im,$scalepx*180,130*$scalepx,$colors[substr($stickers,26,1)]);

// resample image and make background transparent
$interm=ImageCreateTrueColor($size,$size);
imagecopyresampled($interm,$im,0,0,0,0,$size,$size,$size*$scale,$size*$scale);
$output=ImageCreate($size,$size);
imagecopyresized($output,$interm,0,0,0,0,$size,$size,$size,$size);
$back = imagecolorallocate($output,221,221,221);
imagecolortransparent($output,$back);
imagefill($output,0,0,$back);

// send image to client
header("Content-type: image/png");
imagepng($output);
imagedestroy($im);
imagedestroy($output);
?>