<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use GuzzleHttp\Client;
use Config;

class GradoEscolarAlumno extends Model
{
    public function CargaGradoEscolar()
    {
        $client = new Client();
        $res = $client->request('GET', env('HOST_API').'/api/GetGradoEscolar');

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
