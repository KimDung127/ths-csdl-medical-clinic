<?php
class DanhSachKhamChuaModel extends Model {
    public static function getDanhSachBenh($month)
    {
        $date = \DateTime::createFromFormat('Y-m', $month);

        $y = $date->format('Y');
        $m = $date->format('m');

        $params = [
            "lskc_month" => $m,
            "lskc_year" => $y,
        ];
        $data = self::DB()->query('
            SELECT
                lskc.benh_id,
                dsb.ten AS ten_benh,
                COUNT( lskc.id ) AS so_lan_mac_benh
            FROM
                lich_su_kham_chua AS lskc
                INNER JOIN danh_sach_benh AS dsb ON dsb.id = lskc.benh_id
            WHERE
                MONTH ( lskc.ngay_vao_vien ) = :lskc_month
                AND YEAR ( lskc.ngay_vao_vien ) = :lskc_year
                AND lskc.is_tai_kham = 0
            GROUP BY
                benh_id
            ORDER BY COUNT( lskc.id ) DESC
        ', $params);
        return $data;
    }
}