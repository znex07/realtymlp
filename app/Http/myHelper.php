<?php
use App\User;
/**
* format the address given
*
* @param string $province
* @param string $city
* @param string $brgy
* @param string $street_address
* @param string $village
* @return full_address
**/
function formatAddress($province = '', $city = '', $brgy = '', $street_address = '', $village = '')
{
  $province = $province ? preg_replace('!\s+!', ' ', $province) : '';
  $city = $city ? preg_replace('!\s+!', ' ', $city) : '';
  $brgy = $brgy ? preg_replace('!\s+!', ' ', $brgy) : '';
  $street_address = $street_address ? preg_replace('!\s+!', ' ', $street_address) : '';
  $village = $village ? preg_replace('!\s+!', ' ', $village) : '';

  $delimiter = $province && $city ? ', ' : '';

  $full = $province .' '. $delimiter .' '. $city .' '. $brgy .' '. $street_address .' '. $village;
  $full = preg_replace('!\s+!', ' ', $full);
  $full = ctype_space($full) ? '' : $full;
  return $full;
}
function getUserById($id) 
{
  return User::findOrFail($id);
}
function formatPrice($price)
{
  return number_format(floatval($price * 1));
}

function gross_price($price, $unit) 
{
  $gross = floatval($price) * floatval($unit);
  return $gross;
}

function price_per($price, $unit)
{
  $gross = floatval($price) / floatval($unit);
  return round($gross) + 0;
}

function cansee($sharable, $is_owner,$section, $viewed_from_affiliate)
{
  list($parent, $data) = explode('.',$section);
  if (!$is_owner) {
    if (!is_null($sharable)) 
      return $sharable->$parent->$data;
  }
  return true;
}

function canseeimg($sharable, $is_owner, $section)
{
  list($parent, $data, $index) = explode('.', $section);
  if (!$is_owner) {
    if (!is_null($sharable)) {
//      return $sharable->attachments->images[$index]->checked;
    }
  }
  return true;
}

function canseedoc($sharable, $is_owner, $section)
{
  list($parent, $data, $index) = explode('.', $section);
  if (!$is_owner) {
    if (!is_null($sharable)) {
      return $sharable->attachments->documents[$index]->checked;
    }
  }
  return true;
}

function pluralize($obj, $str, $reverse = false)
{
  if (!$reverse) {
    if ($obj > 1) 
      return $obj .' '. str_plural($str);
    return $obj . ' '. $str;
  }
  else {
    if ($obj > 1) 
      return str_plural($str) . ' ' . $obj;
    return $str .': '. $obj;
  }
}


function format_num($num, $precision = 2) {
  if ($num >= 1000 && $num < 1000000) {
    $n_format = number_format($num/1000,$precision).'K';
  } 
  else if ($num >= 1000000 && $num < 1000000000) {
    $n_format = number_format($num/1000000,$precision).'M';
  } 
  else if ($num >= 1000000000) {
    $n_format=number_format($num/1000000000,$precision).'B';
  } 
  else {
    $n_format = $num;
  }
  return $n_format;
} 