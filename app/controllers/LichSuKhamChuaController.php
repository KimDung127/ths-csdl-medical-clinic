<?php

class LichSuKhamChuaController extends Controller
{
    public function benhNhan()
    {
        $benhNhanId = Router::get('benhNhan');
        $lichSuKhamChua = LichSuKhamChuaModel::getLichSuKhamChuaByBenhNhan($benhNhanId);
        $benhNhan = BenhNhanModel::getById($benhNhanId);

        $benhNhans = BenhNhanModel::getAll();
        $this->view('lichSuKham', [
            'lichSuKhamChua' => $lichSuKhamChua,
            'benhNhanId' => $benhNhanId,
            'benhNhan' => $benhNhan,
            'benhNhans' => $benhNhans
        ]);
    }

    public function doanhThu()
    {
        $doanhThu = LichSuKhamChuaModel::getDoanhThu();
        $this->view('doanhThu', [
            'doanhThu' => $doanhThu
        ]);
    }
}