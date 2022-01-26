<?php

/**
 * Utiities class conatins methods for cleaning and sanitizing user database
 */
function cleanData($user_data){
  $user_data = trim($user_data);
  $user_data = stripslashes($user_data);
  $user_data = htmlspecialchars($user_data);

  return $user_data;
}
