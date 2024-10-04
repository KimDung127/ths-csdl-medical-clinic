<div class="container-fluid">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Lương tháng cán bộ phòng khám đến <?=date('d/m/Y', time())?></h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">STT</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên cán bộ</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Chức danh</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Trình độ</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Chuyên môn</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Bậc nghề</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Lương tháng</h6>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($danhSachCanBo) > 0): ?>
                        <?php foreach ($danhSachCanBo as $i => $canBo):?>
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?=$i+1?></h6></td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$canBo['ten']?></h6>
                                    <p class="mb-0 fw-normal"><?=$canBo['ma_so_nhan_vien']?></p>
                                    <p class="mb-0 fw-normal">SĐT: <a href="tel:<?=$canBo['so_dien_thoai']?>"><?=$canBo['so_dien_thoai']?></a></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=$canBo['chuc_danh']?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=$canBo['trinh_do']?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=$canBo['chuyen_mon']?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=$canBo['bac_nghe']?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=number_format($canBo['luong_thang'], 0, '', ',');?>đ</p>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="border-bottom-0">
                                <p class="mb-0 fw-normal text-center">Chưa có lịch sử khám chữa</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>