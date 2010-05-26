<?php

/**
 * Builds a gravatar url.
 *
 * @param string $email The user email.
 * @param integer $size The gravatar size.
 * @param string $rating The gravatar rating.
 * @param string $default The default image to use if the email does not have
 *                        a gravatar image.
 *
 * @return string The gravatar image url.
 */
function _build_url($email, $size, $rating, $default)
{
  $url = 'http://www.gravatar.com/avatar/';

  $email_hash = md5(trim(strtolower($email)));

  $url .= $email_hash;

  $params_added = false;
  if ($size >= 1 && $size <= 512)
  {
    $url .= "?s=$size";
    $params_added = true;
  }

  if ($rating == 'g' || $rating == 'pg' || $rating == 'r' || $rating == 'x')
  {
    $url .= ($params_added?'&':'?')."r=$rating";
  }

  if (!is_null(($default)))
  {
    $url .= ($params_added?'&':'?')."d=$default";
  }

  return $url;
}

/**
 * Builds a gravatar url.
 *
 * @param string $email The user email.
 * @param integer $size The gravatar size.
 * @param string $rating The gravatar rating.
 * @param string $default The default image to use if the email does not have
 *                        a gravatar image.
 *
 * @return string The gravatar image url.
 */
function gravatar_url($email, $size = 80, $rating = 'g', $default = null)
{
  return _build_url($email, $size, $rating, $default);
}

/**
 * Builds an <img> tag using a gravatar image.
 *
 * @param string $email The user email.
 * @param integer $size The gravatar size.
 * @param string $rating The gravatar rating.
 * @param string $default The default image to use if the email does not have
 *                        a gravatar image.
 *
 * @return string The gravatar image url.
 */
function gravatar($email, $size = 80, $rating = 'g', $default = null)
{
  return image_tag(gravatar_url($email, $size, $rating, $default));
}
