<div class="container-fluid">
    <div class="card overflow-hidden">
        <div class="card-body p-4">
            <h5 class="card-title mb-9 fw-semibold">Doanh thu</h5>
            <div class="row align-items-center">
                <div class="col-8">
                    <h4 class="fw-semibold mb-3"><?=number_format($doanhThu['tong_doanh_thu'], 0, '', ',');?>đ</h4>
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">Tiền khám chữa: <?=number_format($doanhThu['tong_tien_kham'], 0, '', ',');?>đ</span>
                        </div>
                        <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">Tiền thuốc: <?=number_format($doanhThu['tong_tien_thuoc'], 0, '', ',');?>đ</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <div id="breakup"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>