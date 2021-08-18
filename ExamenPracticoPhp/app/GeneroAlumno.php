<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use GuzzleHttp\Client;
use Config;

class GeneroAlumno extends Model
{
    public function GenerosAlumno()
    {
        $client = new Client();
        $res = $client->request('GET', env('HOST_API').'/api/GetGenero');

        if($res->getStatusCode()!=200)
        {
            return "Error";
        }
        else
        {
            return json_decode($res->getBody());
        }
    }
}
