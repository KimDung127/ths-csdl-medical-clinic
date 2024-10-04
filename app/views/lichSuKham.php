<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="mb-3 w-25">
                    <label for="benhNhan" class="form-label">Bệnh nhân</label>
                    <select name="benhNhan" class="form-control" id="benhNhan">
                        <option>[ Bệnh nhân ]</option>
                        <?php foreach ($benhNhans as $bn):?>
                            <option <?=$bn['id'] === (int)$benhNhanId ? 'selected' : ''?> value="<?=$bn['id']?>"><?=$bn['ten'].' - '.$bn['ma_benh_nhan']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <?php if (!empty($benhNhan)):?>
    <div class="card">
        <div class="card-body">
            <h6 class="fw-semibold mb-1"><?=$benhNhan['ten']?></h6>
            <p class="mb-0">Mã số BN: <?=$benhNhan['ma_benh_nhan']?></p>
            <p class="mb-0">Ngày sinh: <?=DateTime::createFromFormat('Y-m-d', $benhNhan['ngay_sinh'])->format('d/m/Y')?></p>
            <p class="mb-0">SĐT: <?=$benhNhan['so_dien_thoai']?></p>
            <p class="mb-0">Địa chỉ: <?=$benhNhan['dia_chi']?></p>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Lịch sử khám chữa của bênh nhân <?=$benhNhan['ten']?>: </h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">STT</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên bệnh</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Số lần mắc</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Số lần khám bệnh</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Ngày vào viện gần nhất</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Ngày ra viện gần nhất</h6>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($lichSuKhamChua) > 0): ?>
                        <?php foreach ($lichSuKhamChua as $i => $lichSu):?>
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?=$i+1?></h6></td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$lichSu['ten_benh']?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=$lichSu['so_lan_mac_benh']?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=$lichSu['so_lan_kham_benh']?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=$lichSu['ngay_vao_vien_gan_nhat']?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?=$lichSu['ngay_ra_vien_gan_nhat']?></p>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="border-bottom-0">
                                <p class="mb-0 fw-normal text-center">Chưa có lịch sử khám chữa</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>