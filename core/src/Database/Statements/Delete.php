<?php

namespace Core\Database\Statements;

class Delete extends AbstractQuery
{
    /**
     * Generated Query
     *
     * @var string
     */
    private static $query;


    public static function generate($params=null)
    {
        static::$query = "DELETE FROM ";

        return static::$query;
    }
}