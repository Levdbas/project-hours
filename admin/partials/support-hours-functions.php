<?php

// function to explode on hours and calculates them to minutes.
function hoursToMinutes($hours){
  $minutes = 0;
  if (strpos($hours, ':') !== false)
  {
      list($hours, $minutes) = explode(':', $hours);
  }
  return $hours * 60 + $minutes;
}

// function to strip the hours displayed in the clock of minutes if the hour is round.
function minuszeros($hours2) {
  $minutes = 0;
  if (preg_match("/0+([1-9]:)/", $hours2) == true) {
    $hours2 = ltrim($hours2, '0');
  } elseif(preg_match("/00:00/", $hours2) == true){
    $hours2 = substr($hours2, 1);
  }
  if (strpos($hours2, ':00') !== false) {
      list($hours2, $minutes) = explode(':', $hours2);
  }
  return $hours2;
}


/*
Checks the workfields for the time fields. Adds all timefields and returns them.
If no workfields and therefore no time fields are filled, returns 00:00
*/
function AddTime($workFields) {
  if($workFields != null){
    $minutes = 0;
    foreach ($workFields as $time) {
        //  Check if the field is not empty. Else stay with 0.
        if($time['used'] !== ""){
          list($hour, $minute) = explode(':', $time['used']);
          $minutes += $hour * 60;
          $minutes += $minute;
        }
    }
    $hours = floor($minutes / 60);
    $minutes -= $hours * 60;
    return sprintf('%02d:%02d', $hours, $minutes);
  } else{
    return "00:00";
  }
}

  // set of vars used in different files and functions.
  $options = get_option($this->plugin_name);
  $users = $options['users'];
  $email = $options['email'];
  $workFields = $options['workFields'];

  $used_hours_calc = hoursToMinutes(AddTime($workFields));
  $used_hours = AddTime($workFields);
  $used_hours= minuszeros($used_hours);
  $bought_hours_calc = hoursToMinutes($options['bought_hours']);
  $bought_hours = $options['bought_hours'];
  $bought_hours = minuszeros($bought_hours);
  $current_color = get_user_option( 'admin_color' );
  $size = 'big';

  // TODO:set code to functions.
  if (strpos($used_hours, ':') !== false){
    $size = 'small';
  } else{
    $size = 'big';
  }
  if($used_hours_calc > $bought_hours_calc){
    $used_hours = $bought_hours;
  }
  if(!empty($bought_hours_calc)){
    $percentage = $used_hours_calc * 100 / $bought_hours_calc;
    if($percentage > 100){
      $percentage = 100;
    }
    $percentage = round($percentage);
  }
 ?>
