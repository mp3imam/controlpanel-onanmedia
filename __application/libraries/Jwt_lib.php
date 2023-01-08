<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Jwt_lib
{
  private $CI;
  function __construct()
  {
		$this->CI =& get_instance();
  }

  function createToken($payload)
  {
    $key = $this->CI->config->item('token_key');
    $issuedAt   = time();
    $expire     = $issuedAt + 60 * 60 * 24 * 30;
    $payload['iat'] = $issuedAt;
    $payload['nbf'] = $issuedAt;
    $payload['exp'] = $expire;
    $payload['iss'] = $this->CI->config->item('app_name');

    $token = JWT::encode($payload, $key, 'HS256');
    return $token;
  }

  function verifyToken($token)
  {
    $key = $this->CI->config->item('token_key');
    try {
      $decoded = JWT::decode($token, new Key($key, 'HS256'));
      return ['success' => true, 'data' => $decoded];
    } catch (\Throwable $th) {
      return ['success' => false, 'msg' => $th->getMessage()];
    }
  }

  // function createActivationToken($payload)
  // {
  //   $key = getenv('tokenKey');
  //   $issuedAt   = time();
  //   $expire     = $issuedAt + 60;
  //   $payload['exp'] = $expire;
  //   $token = JWT::encode($payload, $key, 'HS256');
  //   return $token;
  // }
}
