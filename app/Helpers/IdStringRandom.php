<?php
  namespace App\Helpers;

use Illuminate\Support\Str;

  class IdStringRandom
  {
      public static function stringRandom(){
        return "cl".Str::lower(Str::random(23));
      }

  }
