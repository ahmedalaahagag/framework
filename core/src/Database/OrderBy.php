<?php

namespace Core\Database;

class OrderBy extends AbstractQuery
{
    private static $query;
    
    public static function generate($params)
    {
        list($column) = $params;

        $type = $params[1] ?? "ASC";

        $orderBy = $column ." ". $type;
        
        if (is_null(static::$query)) {
            // if orderBy not exists before
            $statement = " ORDER BY ". $orderBy;
        } else {
            $statement = ", ". $orderBy;
        }

        static::$query .= $statement;

        return static::$query;
    }
}