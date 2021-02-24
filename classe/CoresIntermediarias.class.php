<?php

namespace DMetibr;

/**
 * Esta classe contém funções para projeção das cores intermediárias em RGB, HSL e HSV.
 */
class CoresIntermediarias
{
    /**
     * Calcula as n cores RGB intermediárias entre a e b.
     * 
     * @param array $a ['red', 'green', 'blue']
     * @param array $b ['red', 'green', 'blue']
     * @param int $n
     * @return array []['red', 'green', 'blue']
     */
    public function entrecoresrgb(array $a, array $b, int $n = 1): array
    {
        $e = array();
        $n++;
        for ($i = 1; $i < $n; $i++) {
            $red   = round($a['red'] + ($b['red'] - $a['red']) * $i / $n);
            $green = round($a['green'] + ($b['green'] - $a['green']) * $i / $n);
            $blue  = round($a['blue'] + ($b['blue'] - $a['blue']) * $i / $n);
            $e[$i] = array('red' => $red, 'green' => $green, 'blue' => $blue);
        }
        return $e;
    }

    /**
     * Calcula as n cores HSL intermediárias entre a e b.
     * 
     * @param array $a ['hue', 'saturation', 'lightness']
     * @param array $b ['hue', 'saturation', 'lightness']
     * @param int $n
     * @return array []['hue', 'saturation', 'lightness']
     */
    public function entrecoreshsl(array $a, array $b, int $n = 1): array
    {
        $e = array();
        $n++;
        
        $concavo = (abs($a['hue'] - $b['hue']) > 180);
        
        if ($concavo) {
            /*
            if ($a['hue'] > $b['hue']) {
                $d = 360 - $a['hue'];
                $a['hue'] = 0;
                $b['hue'] += $d;
            } else {
                $d = 360 - $b['hue'];
                $b['hue'] = 0;
                $a['hue'] += $d;
            }
            */
            $d = min(360 - $a['hue'], 360 - $b['hue']);
            $a['hue'] = ($a['hue'] + $d == 360 ? 0 : $a['hue'] + $d);
            $b['hue'] = ($b['hue'] + $d == 360 ? 0 : $b['hue'] + $d);
        }
    
        for ($i = 1; $i < $n; $i++) {
            $hue = round($a['hue'] + ($b['hue'] - $a['hue']) * $i / $n);
            if ($concavo) {
                $hue -= $d;
                if ($hue < 0) {
                    $hue += 360;
                }
            }
            $saturation = round($a['saturation'] + ($b['saturation'] - $a['saturation']) * $i / $n);
            $lightness = round($a['lightness'] + ($b['lightness'] - $a['lightness']) * $i / $n);
            $e[$i] = array('hue' => $hue, 'saturation' => $saturation, 'lightness' => $lightness);
        }
        return $e;
    }

    /**
     * Calcula as n cores HSV intermediárias entre a e b.
     * 
     * @param array $a ['hue', 'saturation', 'value']
     * @param array $b ['hue', 'saturation', 'value']
     * @param int $n
     * @return array []['hue', 'saturation', 'value']
     */
    public function entrecoreshsv(array $a, array $b, int $n = 1): array
    {
        $e = array();
        $n++;
        
        $concavo = (abs($a['hue'] - $b['hue']) > 180);
        
        if ($concavo) {
            /*
            if ($a['hue'] > $b['hue']) {
                $d = 360 - $a['hue'];
                $a['hue'] = 0;
                $b['hue'] += $d;
            } else {
                $d = 360 - $b['hue'];
                $b['hue'] = 0;
                $a['hue'] += $d;
            }
            */
            $d = min(360 - $a['hue'], 360 - $b['hue']);
            $a['hue'] = ($a['hue'] + $d == 360 ? 0 : $a['hue'] + $d);
            $b['hue'] = ($b['hue'] + $d == 360 ? 0 : $b['hue'] + $d);
        }
        
        for ($i = 1; $i < $n; $i++) {
            $hue = round($a['hue'] + ($b['hue'] - $a['hue']) * $i / $n);
            if ($concavo) {
                $hue -= $d;
                if ($hue < 0) {
                    $hue += 360;
                }
            }
            $saturation = round($a['saturation'] + ($b['saturation'] - $a['saturation']) * $i / $n);
            $lightness = round($a['value'] + ($b['value'] - $a['value']) * $i / $n);
            $e[$i] = array('hue' => $hue, 'saturation' => $saturation, 'value' => $lightness);
        }
        return $e;
    }

}
