<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="mb-3 w-25">
                    <label for="month" class="form-label">Tháng</label>
                    <input name="month" type="month" class="form-control" id="month" value="<?=$month?>">
                    <div id="emailHelp" class="form-text">Tìm kiếm danh sách bệnh theo tháng</div>
                </div>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Danh sách các loại bệnh</h5>
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
                            <h6 class="fw-semibold mb-0">Số bệnh nhân mắc</h6>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if (count($danhSachBenh) > 0): ?>
                            <?php foreach ($danhSachBenh as $i => $benh):?>
                                <tr>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?=$i+1?></h6></td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1"><?=$benh['ten_benh']?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal"><?=$benh['so_lan_mac_benh']?></p>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="border-bottom-0">
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