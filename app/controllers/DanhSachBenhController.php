<?php

class DanhSachBenhController extends Controller
{
    public function index()
    {
        $month = Router::get('month');
        if (!isset($month)) {
            $month = date("Y-m");
        }

        $data = DanhSachKhamChuaModel::getDanhSachBenh($month);
        $this->view('danhSachBenh', [
            'month' => $month,
            'danhSachBenh' => $data
        ]);
    }
}