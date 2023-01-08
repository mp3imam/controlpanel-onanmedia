<?php

function myHash($string)
{
  $hashedPass = password_hash($string, PASSWORD_BCRYPT);
  return $hashedPass;
}

function verifyHash($string, $hash){
 return password_verify($string, $hash);
}


