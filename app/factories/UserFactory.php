<?php


namespace factories;

use models\{Coach, Sportif};

class UserFactory
{
    public function create($data)
    {
        switch ($data->role) {
            case 'coach':
                return new Coach(
                    $data->nom,
                    $data->phone,
                    $data->email,
                    $data->password,
                    $data->pic,
                    $data->sport,
                    $data->exp,
                    $data->bio
                );

            case 'sportif':
                return new Sportif(
                    $data->nom,
                    $data->phone,
                    $data->email,
                    $data->password,
                    $data->pic,
                    $data->id
                );
            default: //for testing
                return new Sportif(
                    $data->nom,
                    $data->phone,
                    $data->email,
                    $data->password,
                    $data->pic,
                    $data->user_id
                );
        }
    }

    }
