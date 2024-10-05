
<?php

    class CanBoPhongKhamModel extends Model
    {
        public static function getLuongCanBo()
        {
            $data = self::DB()->query('
                SELECT
                    cb.id,
                    cb.ten,
                    cb.ma_so_nhan_vien,
                    cb.so_dien_thoai,
                    cb.trinh_do,
                    cb.chuyen_mon,
                    cb.bac_nghe,
                    ( CASE WHEN cb.type = 0 THEN "Bác sĩ" WHEN cb.type = 1 THEN "Y tá" ELSE NULL END ) AS chuc_danh,
                    (
                    CASE
                            
                            WHEN cb.type = 0 THEN
                            ( 7000000 + ( CASE WHEN ds_kham_chua_thanh_cong.bac_si_id IS NOT NULL THEN ds_kham_chua_thanh_cong.kham_chua_thanh_cong ELSE 0 END ) * 1000000 ) 
                            WHEN cb.type = 1 THEN
                            ( 5000000 + ( CASE WHEN ds_y_ta_ho_tro.y_ta_id IS NOT NULL THEN ds_y_ta_ho_tro.so_lan_ho_tro ELSE 0 END ) * 200000 ) ELSE NULL 
                        END 
                        ) AS luong_thang 
                    FROM
                        can_bo_phong_kham AS cb
                        LEFT JOIN (
                            SELECT
                                bac_si_id,
                                COUNT( id ) AS kham_chua_thanh_cong 
                            FROM
                                thong_tin_kham 
                            WHERE
                                MONTH ( ngay_ra_vien ) = MONTH (
                                CURRENT_DATE ()) 
                                AND YEAR ( ngay_ra_vien ) = YEAR (
                                CURRENT_DATE ()) 
                                AND ngay_ra_vien <= NOW() 
                                AND trang_thai_tai_kham = 0 
                            GROUP BY
                                bac_si_id
                        ) AS ds_kham_chua_thanh_cong ON ( ds_kham_chua_thanh_cong.bac_si_id = cb.id )
                        LEFT JOIN (
                            SELECT
                                COUNT( id ) AS so_lan_ho_tro,
                                y_ta_id 
                            FROM
                                thong_tin_kham 
                            WHERE
                                MONTH ( ngay_ra_vien ) = MONTH(CURRENT_DATE()) 
                                AND YEAR ( ngay_ra_vien ) = YEAR(CURRENT_DATE()) 
                                AND ngay_ra_vien <= NOW() 
                            GROUP BY
                                y_ta_id 
                        ) AS ds_y_ta_ho_tro ON ( ds_y_ta_ho_tro.y_ta_id = cb.id ) 
                ORDER BY
                    cb.type
            ');

            return $data;
        }
    }