<?php
/*
 * ImageRevenge by Lars Vandenbergh
 * 27th septmber 2005
 *
 * A PHP script for generating static 3D views of the 4x4x4 Rubik's Cube 
 */
 
// initialize paramaters
import_request_variables("PG","");
if(!$size){
    $size=200;
}
$scale=2;
$scalepx=$size*$scale/220;
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
                   200*$scalepx, 31*$scalepx,
                   89*$scalepx, 18*$scalepx,
                   14*$scalepx, 59*$scalepx,
                   29*$scalepx, 185*$scalepx,
                   147*$scalepx, 211*$scalepx,
                   206*$scalepx,151*$scalepx
             ),
             6,
             $col_poly);
// draw inner edges
imageline($im,138*$scalepx,77*$scalepx,14*$scalepx,59*$scalepx,$col_poly);
imageline($im,138*$scalepx,77*$scalepx,200*$scalepx,31*$scalepx,$col_poly);
imageline($im,138*$scalepx,77*$scalepx,147*$scalepx,211*$scalepx,$col_poly);
// draw BSF layers
imageline($im,37*$scalepx,46*$scalepx,156*$scalepx,64*$scalepx,$col_poly);
imageline($im,156*$scalepx,64*$scalepx,164*$scalepx,194*$scalepx,$col_poly);
imageline($im,57*$scalepx,35*$scalepx,172*$scalepx,52*$scalepx,$col_poly);
imageline($im,172*$scalepx,52*$scalepx,180*$scalepx,178*$scalepx,$col_poly);
imageline($im,74*$scalepx,26*$scalepx,188*$scalepx,40*$scalepx,$col_poly);
imageline($im,188*$scalepx,40*$scalepx,194*$scalepx,164*$scalepx,$col_poly);
// draw LMR layers
imageline($im,111*$scalepx,20*$scalepx,43*$scalepx,63*$scalepx,$col_poly);
imageline($im,43*$scalepx,63*$scalepx,57*$scalepx,192*$scalepx,$col_poly);
imageline($im,139*$scalepx,23*$scalepx,74*$scalepx,67*$scalepx,$col_poly);
imageline($im,74*$scalepx,67*$scalepx,86*$scalepx,198*$scalepx,$col_poly);
imageline($im,169*$scalepx,27*$scalepx,106*$scalepx,73*$scalepx,$col_poly);
imageline($im,106*$scalepx,73*$scalepx,116*$scalepx,205*$scalepx,$col_poly);
// draw UED layers
imageline($im,18*$scalepx,92*$scalepx,140*$scalepx,112*$scalepx,$col_poly);
imageline($im,140*$scalepx,112*$scalepx,202*$scalepx,62*$scalepx,$col_poly);
imageline($im,21*$scalepx,124*$scalepx,142*$scalepx,146*$scalepx,$col_poly);
imageline($im,142*$scalepx,146*$scalepx,203*$scalepx,94*$scalepx,$col_poly);
imageline($im,25*$scalepx,156*$scalepx,144*$scalepx,179*$scalepx,$col_poly);
imageline($im,144*$scalepx,179*$scalepx,205*$scalepx,124*$scalepx,$col_poly);

//UBL sticker
imagefill($im,$scalepx*92,24*$scalepx,$colors[substr($stickers,0,1)]);
//UB stickers
imagefill($im,$scalepx*126,26*$scalepx,$colors[substr($stickers,1,1)]);
imagefill($im,$scalepx*152,30*$scalepx,$colors[substr($stickers,2,1)]);
//UBR sticker
imagefill($im,$scalepx*184,34*$scalepx,$colors[substr($stickers,3,1)]);
//UL stickers
imagefill($im,$scalepx*77,33*$scalepx,$colors[substr($stickers,4,1)]);
imagefill($im,$scalepx*58,42*$scalepx,$colors[substr($stickers,8,1)]);
//U stickers
imagefill($im,$scalepx*106,37*$scalepx,$colors[substr($stickers,5,1)]);
imagefill($im,$scalepx*136,39*$scalepx,$colors[substr($stickers,6,1)]);
imagefill($im,$scalepx*88,48*$scalepx,$colors[substr($stickers,9,1)]);
imagefill($im,$scalepx*118,51*$scalepx,$colors[substr($stickers,10,1)]);
//UR stickers
imagefill($im,$scalepx*168,43*$scalepx,$colors[substr($stickers,7,1)]);
imagefill($im,$scalepx*153,57*$scalepx,$colors[substr($stickers,11,1)]);
//UFL sticker
imagefill($im,$scalepx*38,56*$scalepx,$colors[substr($stickers,12,1)]);
//UF stickers
imagefill($im,$scalepx*70,60*$scalepx,$colors[substr($stickers,13,1)]);
imagefill($im,$scalepx*101,63*$scalepx,$colors[substr($stickers,14,1)]);
//UFR sticker
imagefill($im,$scalepx*137,67*$scalepx,$colors[substr($stickers,15,1)]);
//FLU sticker
imagefill($im,$scalepx*28,78*$scalepx,$colors[substr($stickers,16,1)]);
//FU stickers
imagefill($im,$scalepx*65,91*$scalepx,$colors[substr($stickers,17,1)]);
imagefill($im,$scalepx*88,91*$scalepx,$colors[substr($stickers,18,1)]);
//FRU sticker
imagefill($im,$scalepx*126,91*$scalepx,$colors[substr($stickers,19,1)]);
//FL stickers
imagefill($im,$scalepx*30,110*$scalepx,$colors[substr($stickers,20,1)]);
imagefill($im,$scalepx*35,140*$scalepx,$colors[substr($stickers,24,1)]);
//F stickers
imagefill($im,$scalepx*70,119*$scalepx,$colors[substr($stickers,21,1)]);
imagefill($im,$scalepx*90,120*$scalepx,$colors[substr($stickers,22,1)]);
imagefill($im,$scalepx*63,150*$scalepx,$colors[substr($stickers,25,1)]);
imagefill($im,$scalepx*96,155*$scalepx,$colors[substr($stickers,26,1)]);
//FR stickers
imagefill($im,$scalepx*133,121*$scalepx,$colors[substr($stickers,23,1)]);
imagefill($im,$scalepx*127,159*$scalepx,$colors[substr($stickers,27,1)]);
//FDL sticker
imagefill($im,$scalepx*44,177*$scalepx,$colors[substr($stickers,28,1)]);
//FD stickers
imagefill($im,$scalepx*67,175*$scalepx,$colors[substr($stickers,29,1)]);
imagefill($im,$scalepx*100,187*$scalepx,$colors[substr($stickers,30,1)]);
//FDR sticker
imagefill($im,$scalepx*136,195*$scalepx,$colors[substr($stickers,31,1)]);
//RUF sticker
imagefill($im,$scalepx*148,87*$scalepx,$colors[substr($stickers,32,1)]);
//RU stickers
imagefill($im,$scalepx*167,78*$scalepx,$colors[substr($stickers,33,1)]);
imagefill($im,$scalepx*182,65*$scalepx,$colors[substr($stickers,34,1)]);
//RUB sticker
imagefill($im,$scalepx*197,51*$scalepx,$colors[substr($stickers,35,1)]);
//RF stickers
imagefill($im,$scalepx*153,122*$scalepx,$colors[substr($stickers,36,1)]);
imagefill($im,$scalepx*153,150*$scalepx,$colors[substr($stickers,40,1)]);
//R stickers
imagefill($im,$scalepx*166,110*$scalepx,$colors[substr($stickers,37,1)]);
imagefill($im,$scalepx*183,100*$scalepx,$colors[substr($stickers,38,1)]);
imagefill($im,$scalepx*170,140*$scalepx,$colors[substr($stickers,41,1)]);
imagefill($im,$scalepx*182,127*$scalepx,$colors[substr($stickers,42,1)]);
//RB stickers
imagefill($im,$scalepx*197,83*$scalepx,$colors[substr($stickers,39,1)]);
imagefill($im,$scalepx*197,120*$scalepx,$colors[substr($stickers,43,1)]);
//RFD sticker
imagefill($im,$scalepx*155,190*$scalepx,$colors[substr($stickers,44,1)]);
//RD stickers
imagefill($im,$scalepx*170,178*$scalepx,$colors[substr($stickers,45,1)]);
imagefill($im,$scalepx*185,156*$scalepx,$colors[substr($stickers,46,1)]);
//RFD sticker
imagefill($im,$scalepx*201,145*$scalepx,$colors[substr($stickers,47,1)]);

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