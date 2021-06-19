<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MichaelDrennen\Geonames\Models\Geoname as BaseGeoname;

class Geoname extends BaseGeoname
{
    use HasFactory;

    function scopeReverse($q, $latitude, $longitude, $is = '<=', $compare = 1) {
      $calc = 1.1515 * 1.609344;
      $q->from(fn ($q) => $q->selectRaw(
        "*, (
          ACOS(
              SIN($latitude * PI() / 180)
              * SIN(latitude * PI() / 180)
              + COS($latitude * PI() / 180)
              * COS(latitude * PI() / 180)
              * COS(($longitude - longitude) * PI() / 180)
            ) * 180 / PI()
         ) * 60 * $calc distance"
      )->from('geonames'))
      ->whereBetween('latitude', [$latitude - 0.01, $latitude + 0.01])
      ->whereBetween('longitude', [$longitude - 0.01, $longitude + 0.01])
      ->where('distance', $is, $compare)
      ->orderBy('distance', 'ASC');
    }
}
