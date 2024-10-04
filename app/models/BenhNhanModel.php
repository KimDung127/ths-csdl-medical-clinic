<?php

class BenhNhanModel extends Model
{
    public static function getById($id)
    {
        $benhNhan = self::DB()
            ->query('SELECT * FROM benh_nhan WHERE id = :id', ['id' => $id]);
        $benhNhan = $benhNhan[0]??[];
        return $benhNhan;
    }

    public static function getAll()
    {
        return self::DB()->query('SELECT * FROM benh_nhan');
    }
}