<?php
namespace GOA\models;
class Environement
{
    public static function get()
    {
        return json_decode(file_get_contents('environement.dev.json'));
    }
}