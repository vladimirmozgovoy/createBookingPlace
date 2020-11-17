<?php


namespace App\Helpers;


class TableHelper
{
    /**
     * @param $row
     * @param $data
     * @return mixed
     * Разбить данные на колонки и столбцы
     */
    public static function dataToColumn($row,$data){


        $col = count($data)/$row;
        $t = 0;
        for ($i = 0 ; $i < $col ; $i++){
            for ($j = 0 ; $j < $row; $j++){
                $result[$i][] = $data[$t];
                $t++;
            }
        }
    return $result;
    }
}
