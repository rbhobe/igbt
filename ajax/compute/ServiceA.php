<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/common/compute/ComputeUtils.php');

// User inputs
$userPart = 'IRG4BC20UD';
$userTj = 50;
$userIMin = .7; // 10% of part's Irated
$userIMax = 28; // 4X part's Irated

// Generate the range of I, spaced out appropriately
$lowI = 0;
$iRated = 7;
$highI = 4*$iRated;

// 10 points between Ilow and Irated, 10 points between Irated and Ihigh
$lowIVals = ComputeUtils::linearlyInterpolateValuesOneDim($lowI, $iRated, 11);
$highIVals = ComputeUtils::linearlyInterpolateValuesOneDim($iRated, $highI, 11);
// Final set of I values has 21 points
$iVals = array_values(array_unique(array_merge($lowIVals, $highIVals)));
// var_dump($iVals);

// Vce,on at Tj = Tjmax
$tjmax = 150;
$vt_tjmax = 0.755;
$a_tjmax = 0.368;
$b_tjmax = 0.601;

// Vce,on at Tj = 25C
$tjlow = 25;
$vt_tjlow = 0.9960;
$a_tjlow = 0.3441;
$b_tjlow = 0.4977;

// Vce,on at Tj = $userTj: linearly interpolate between values of Vce,on at Tjmax and Vce,on at Tjlow
$vce = array();
foreach ($iVals as $i) {
    
    $vceValsTjmax = ComputeUtils::GetExponentialValsForXVals($i, array('offset' => $vt_tjmax, 'a' => $a_tjmax, 'b' => $b_tjmax));
    // var_dump($vceValsTjmax);
    $vceValsTjlow = ComputeUtils::GetExponentialValsForXVals($i, array('offset' => $vt_tjlow, 'a' => $a_tjlow, 'b' => $b_tjlow));
    // var_dump($vceValsTjlow);

    $low = new stdClass();
    $low->x = $tjlow;
    $low->y = $vceValsTjlow;

    $high = new stdClass();
    $high->x = $tjmax;
    $high->y = $vceValsTjmax;

    $vceVals[] = ComputeUtils::getValueFromLinearInterpolationTwoDim($low, $high, $userTj);

}

// print_r($iVals);
// echo '<br /><br />';
// print_r($vceVals);

// Merge the data into (x,y) value pairs
$data = array();
foreach($vceVals as $key => $vce) {
    $data[] = array($vce, $iVals[$key]);
}

// Prepare the response
$response = array('status' => 'ok', 'payload' => array( array('type' => 1, 'data' => $data) ) );

header('Content-Type: application/json');
echo json_encode($response);

?>