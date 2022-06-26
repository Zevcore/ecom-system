<?php

namespace App\Lib;

class Creators
{
    private static $instances = [];

    private static array $creators = [
        'Piotr Jarema' => 'SCRUM Master',
        'Maciej Wójcik' => 'Project Manager',
        'Mikołaj Pięcek' => 'Developer',
        'Dariusz Letkiewicz' => 'Graphic Designer'
    ];

    public static function getCreators(): array
    {
        return self::$creators;
    }

    public static function getInstance()
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
}
