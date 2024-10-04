<?php

class CanBoPhongKhamController extends Controller
{
    public function index()
    {
        $data = CanBoPhongKhamModel::getLuongCanBo();
        $this->view('danhSachCanBo', [
            'danhSachCanBo' => $data
        ]);
    }
}