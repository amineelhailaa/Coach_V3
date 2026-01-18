<?php

namespace libraries;


class Middleware
{


    private static array $dashboard = [
        'sportif' => 'Location: '.URLROOT.'sportif/list',
        'coach' => 'Location: '.URLROOT.'coach/dashboard'
    ];
    public static function getUserPath(){
        $role= self::getRole();
        return str_replace("Location: ","",self::$dashboard[$role]);
    }

    public static function getUserId(): ?int
    {
        if(isset($_SESSION["id"])){
            return $_SESSION["id"];
        }
        return null;
    }

    public static function getRole(): ?string
    {
        return $_SESSION['role'] ?? null;
    }

    public static function isLoggedIn()
    {
        if (!self::getUserId()) {
            header(URLROOT.'/users/login');
            exit();
        }
    }

    public static function requireRole($role): void
    {
        self::isLoggedIn();
        if (self::getRole() != $role) {
            self::redirectToDashboard();
        }
    }

    public static function redirectToDashboard()
    {
        if(self::getUserId()){
            $role = self::getRole();
            header(self::$dashboard[$role]);
            exit();
        }

    }


}