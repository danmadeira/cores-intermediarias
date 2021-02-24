<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'ConversaoEspacoCor.class.php';
require 'CoresIntermediarias.class.php';

$inter = new DMetibr\CoresIntermediarias();
$convert = new DMetibr\ConversaoEspacoCor();

$n = 11;

$a_rgb = array('red' => 255, 'green' =>   0, 'blue' => 255); // magenta
$b_rgb = array('red' => 255, 'green' => 255, 'blue' =>   0); // yellow
//$a_rgb = array('red' =>   0, 'green' =>   0, 'blue' => 255); // blue
//$b_rgb = array('red' =>   0, 'green' => 255, 'blue' =>   0); // green
$e_rgb = $inter->entrecoresrgb($a_rgb, $b_rgb, $n);

$a_hsl = array('hue' => 300, 'saturation' => 100, 'lightness' =>  50); // magenta
$b_hsl = array('hue' =>  60, 'saturation' => 100, 'lightness' =>  50); // yellow
//$a_hsl = array('hue' => 240, 'saturation' => 100, 'lightness' =>  50); // blue
//$b_hsl = array('hue' => 120, 'saturation' => 100, 'lightness' =>  50); // green
$e_hsl = $inter->entrecoreshsl($a_hsl, $b_hsl, $n);

$a_hsv = array('hue' => 300, 'saturation' => 100, 'value' => 100); // magenta
$b_hsv = array('hue' =>  60, 'saturation' => 100, 'value' => 100); // yellow
//$a_hsv = array('hue' => 240, 'saturation' => 100, 'value' => 100); // blue
//$b_hsv = array('hue' => 120, 'saturation' => 100, 'value' => 100); // green
$e_hsv = $inter->entrecoreshsv($a_hsv, $b_hsv, $n);

$rh = $convert->rgbtohsl($a_rgb);
$lr = $convert->hsltorgb($a_hsl);
$vr = $convert->hsvtorgb($a_hsv);

echo '<!DOCTYPE html><html><head><title>Cores Intermediárias</title></head><body>';
echo '<table style="border-collapse: separate; border-spacing: 5px 5px; font-family: monospace;  font-size: xx-large;">' . PHP_EOL;
echo '<tr><td>&nbsp;</td><td colspan="2" style="text-align:left;">RGB</td><td colspan="2" style="text-align: left;">HSL</td><td colspan="2" style="text-align:left;">HSV</td></tr>' . PHP_EOL;
echo '<tr><td>A</td>';
echo '<td style="background-color:rgb('.$a_rgb['red'].','.$a_rgb['green'].','.$a_rgb['blue'].');">'.$a_rgb['red'].','.$a_rgb['green'].','.$a_rgb['blue'].'</td><td style="background-color:rgb('.$a_rgb['red'].','.$a_rgb['green'].','.$a_rgb['blue'].'); text-align: right;">'.$rh['hue'].'° '.$rh['saturation'].'% '.$rh['lightness'].'%</td>';
echo '<td style="background-color:hsl('.$a_hsl['hue'].','.$a_hsl['saturation'].'%,'.$a_hsl['lightness'].'%); text-align:right;">'.$a_hsl['hue'].'° '.$a_hsl['saturation'].'% '.$a_hsl['lightness'].'%</td><td style="background-color:hsl('.$a_hsl['hue'].','.$a_hsl['saturation'].'%,'.$a_hsl['lightness'].'%);">'.$lr['red'].','.$lr['green'].','.$lr['blue'].'</td>';
echo '<td style="background-color:rgb('.$vr['red'].','.$vr['green'].','.$vr['blue'].'); text-align: right;">'.$a_hsv['hue'].'° '.$a_hsv['saturation'].'% '.$a_hsv['value'].'%</td><td style="background-color:rgb('.$vr['red'].','.$vr['green'].','.$vr['blue'].');">'.$vr['red'].','.$vr['green'].','.$vr['blue'].'</td>';
echo '</tr>' . PHP_EOL;
for($i = 1; $i <= $n; $i++) {
    $rh = $convert->rgbtohsl($e_rgb[$i]);
    $lr = $convert->hsltorgb($e_hsl[$i]);
    $vr = $convert->hsvtorgb($e_hsv[$i]);
    echo '<tr><td>&nbsp;</td>';
    echo '<td style="background-color:rgb('.$e_rgb[$i]['red'].','.$e_rgb[$i]['green'].','.$e_rgb[$i]['blue'].');">'.$e_rgb[$i]['red'].','.$e_rgb[$i]['green'].','.$e_rgb[$i]['blue'].'</td><td style="background-color:rgb('.$e_rgb[$i]['red'].','.$e_rgb[$i]['green'].','.$e_rgb[$i]['blue'].'); text-align: right;">'.$rh['hue'].'° '.$rh['saturation'].'% '.$rh['lightness'].'%</td>';
    echo '<td style="background-color:hsl('.$e_hsl[$i]['hue'].','.$e_hsl[$i]['saturation'].'%,'.$e_hsl[$i]['lightness'].'%); text-align: right;">'.$e_hsl[$i]['hue'].'° '.$e_hsl[$i]['saturation'].'% '.$e_hsl[$i]['lightness'].'%</td><td style="background-color:hsl('.$e_hsl[$i]['hue'].','.$e_hsl[$i]['saturation'].'%,'.$e_hsl[$i]['lightness'].'%);">'.$lr['red'].','.$lr['green'].','.$lr['blue'].'</td>';
    echo '<td style="background-color:rgb('.$vr['red'].','.$vr['green'].','.$vr['blue'].'); text-align: right;">'.$e_hsv[$i]['hue'].'° '.$e_hsv[$i]['saturation'].'% '.$e_hsv[$i]['value'].'%</td><td style="background-color:rgb('.$vr['red'].','.$vr['green'].','.$vr['blue'].');">'.$vr['red'].','.$vr['green'].','.$vr['blue'].'</td>';
    echo '</tr>' . PHP_EOL;
}
$rh = $convert->rgbtohsl($b_rgb);
$lr = $convert->hsltorgb($b_hsl);
$vr = $convert->hsvtorgb($b_hsv);
echo '<tr><td>B</td>';
echo '<td style="background-color:rgb('.$b_rgb['red'].','.$b_rgb['green'].','.$b_rgb['blue'].');">'.$b_rgb['red'].','.$b_rgb['green'].','.$b_rgb['blue'].'</td><td style="background-color:rgb('.$b_rgb['red'].','.$b_rgb['green'].','.$b_rgb['blue'].'); text-align: right;">'.$rh['hue'].'° '.$rh['saturation'].'% '.$rh['lightness'].'%</td>';
echo '<td style="background-color:hsl('.$b_hsl['hue'].','.$b_hsl['saturation'].'%,'.$b_hsl['lightness'].'%); text-align: right;">'.$b_hsl['hue'].'° '.$b_hsl['saturation'].'% '.$b_hsl['lightness'].'%</td><td style="background-color:hsl('.$b_hsl['hue'].','.$b_hsl['saturation'].'%,'.$b_hsl['lightness'].'%);">'.$lr['red'].','.$lr['green'].','.$lr['blue'].'</td>';
echo '<td style="background-color:rgb('.$vr['red'].','.$vr['green'].','.$vr['blue'].'); text-align: right;">'.$b_hsv['hue'].'° '.$b_hsv['saturation'].'% '.$b_hsv['value'].'%</td><td style="background-color:rgb('.$vr['red'].','.$vr['green'].','.$vr['blue'].');">'.$vr['red'].','.$vr['green'].','.$vr['blue'].'</td>';
echo '</tr>' . PHP_EOL;
echo '</table>' . PHP_EOL;
echo '</body></html>';

