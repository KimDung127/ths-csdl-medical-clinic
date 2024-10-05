<?php

class LichSuKhamChuaModel extends Model
{
    public static function getLichSuKhamChuaByBenhNhan($benhNhanId = 0)
    {
        $data = self::DB()
            ->query('
                SELECT
                    tong_hop_benh.*,
                    dsb.ten as ten_benh,
                    DATE_FORMAT(lskc.ngay_vao_vien, "%H:%i:%s %d/%m/%Y") AS ngay_vao_vien_gan_nhat,
                    DATE_FORMAT(lskc.ngay_ra_vien, "%H:%i:%s %d/%m/%Y") AS ngay_ra_vien_gan_nhat 
                FROM
                    (
                    SELECT
                        lskc.benh_nhan_id,
                        lskc.benh_id,
                        MAX(lskc.lan_mac_benh) AS so_lan_mac_benh,
                        COUNT(lskc.id) AS so_lan_kham_benh 
                    FROM
                        thong_tin_kham AS lskc
                    WHERE
                        lskc.benh_nhan_id = :benh_nhan_id 
                    GROUP BY
                        lskc.benh_nhan_id, lskc.benh_id
                    ) AS tong_hop_benh
                INNER JOIN (
                    SELECT
                        MAX(id) AS lan_kham_gan_nhat,
                        benh_nhan_id,
                        benh_id
                    FROM
                        thong_tin_kham
                    GROUP BY
                        benh_id, benh_nhan_id
                    ORDER BY
                        benh_nhan_id
                ) AS kham_gan_nhat ON tong_hop_benh.benh_nhan_id = kham_gan_nhat.benh_nhan_id 
                    AND tong_hop_benh.benh_id = kham_gan_nhat.benh_id
                INNER JOIN thong_tin_kham AS lskc ON lskc.id = kham_gan_nhat.lan_kham_gan_nhat
                INNER JOIN benh as dsb ON dsb.id = lskc.benh_id;
            ', [
                'benh_nhan_id' => $benhNhanId
            ]);

        return $data;
    }

    public static function getDoanhThu()
    {
        $data = self::DB()
            ->query('
                SELECT 
                SUM(IFNULL(lskc.tien_kham, 0)) AS tong_tien_kham,
                SUM(IFNULL(lskt.thanh_tien, 0)) AS tong_tien_thuoc,
                (SUM(IFNULL(lskc.tien_kham, 0)) + SUM(IFNULL(lskt.thanh_tien, 0))) AS tong_doanh_thu
            FROM 
                thong_tin_kham lskc
            LEFT JOIN 
                don_thuoc lskt ON lskc.id = lskt.thong_tin_kham_id;
            ');
        return $data[0]??[];
    }
}