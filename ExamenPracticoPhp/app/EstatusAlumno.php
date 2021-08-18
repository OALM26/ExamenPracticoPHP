<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use GuzzleHttp\Client;
use Config;

class EstatusAlumno extends Model
{
    public function CargaEstatusAlumno()
    {
        $client = new Client();
        $res = $client->request('GET', env('HOST_API').'/api/GetEstatus');

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
