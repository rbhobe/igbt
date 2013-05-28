<?php

class ComputeUtils {

    public static function getValueFromLinearInterpolationTwoDim($start, $end, $betweenX) {

        $xRange = $end->x - $start->x;
        $yRange = $end->y - $start->y;

        $yDiff = ( ($betweenX - $start->x)/($end->x - $start->x) ) * ($end->y - $start->y);
        return $start->y + $yDiff;
    }

    public static function linearlyInterpolateValuesOneDim($start, $end, $numPoints, $options = array()) {
        // default, interpolate between two points at evenly spaced intervals
        $defaults = array();
        $options = array_merge($defaults, $options);

        $step = ($end-$start)/($numPoints-1);

        $interp = array();
        for ($i=0; $i < $numPoints; $i++) { 
            $interp[] = $start + $i*$step;
        }

        if ($interp[sizeof($interp)-1] != $end) {
            echo "MISMATCH";
            var_dump($interp); var_dump($end); exit();
        }

        return $interp;

    }

    public static function GetExponentialValsForXVals($xVals, $options = array()) {
        $defaults = array('offset' => 0, 'a' => 1, 'b' => 1);
        $options = array_merge($defaults, $options);

        $offset = $options['offset'];
        $a = $options['a'];
        $b = $options['b'];

        // Generate array of values for input values
        if (is_array($xVals)) {
            $yVals = array();
            foreach($xVals as $x) {
                $yVals[] = $offset + $a*($x^$b);
            }
            return $yVals;
        } else {
            // Generate value for one input value
            // var_dump($xVals);
            // var_dump($offset + $a*($xVals^$b));
            return $offset + $a*pow($xVals, $b);
        }

        
    }

    public static function linearInterpolateTwoDim($start, $end, $numPoints, $options = array()) {
        // default, interpolate between two points at evenly spaced intervals
        $defaults = array();
        $options = array_merge($defaults, $options);

        $xStep = ($end->x - $start->x) / $numPoints;
        $yStep = ($end->y - $start->y) / $numPoints;

        $interpX = array();
        $interpY = array();

        for ($i=0; $i < $numPoints; $i++) { 
            $interpX[] = $start->x + $i*$xStep;
            $interpY[] = $start->y + $i*$yStep;
        }

        if ($interpX[sizeof($interpX)-1] != $end->x) {
            var_dump($interpX[sizeof($interpX)-1]); var_dump($end->x);
        }

        if ($interpX[sizeof($interpY)-1] != $end->y) {
            var_dump($interpY[sizeof($interpY)-1]); var_dump($end->y);
        }

    }
    

}

?>