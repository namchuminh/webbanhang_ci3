<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Đơn Hàng</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/don-hang/'); ?>">Đơn Hàng</a></li>
                            <li class="breadcrumb-item active">Xem Chi Tiết</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách sản phẩm</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th tabindex="0" aria-controls="basic-datatable"
                                                rowspan="1" colspan="1"
                                                >Mã Đơn Hàng</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"colspan="1">Tên Sản Phẩm</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"colspan="1">Giá Bán</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"colspan="1">Số Lượng</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"colspan="1">Thành Tiền</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $tongdon = 0; ?>
                                            <?php foreach ($list as $key => $value): ?>
                                                <tr role="row" class="odd">
                                                    <td><?php echo $value['MaDonHang']; ?></td>
                                                    <td><?php echo $value['TenSanPham']; ?></td>
                                                    <td><?php echo number_format($value['GiaBan']); ?> đ</td>
                                                    <td><?php echo $value['SoLuong']; ?> sản phẩm</td>
                                                    <td><?php echo number_format($value['SoLuong'] * $value['GiaBan'] ); ?> đ</td>
                                                </tr>
                                                <?php $tongdon += $value['SoLuong'] * $value['GiaBan']; ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if(!empty($list[0])){ ?>
                                    <div class="text-right mt-5">
                                        <div class="container-fluid">
                                            <div class="d-flex ml-5" style="float: right;">
                                                <b>Thành Tiền: </b>
                                                <p class="ml-2"><?php echo number_format($tongdon - $list[0]['GiamGia']); ?> đ</p>
                                            </div>

                                            <div class="d-flex ml-5" style="float: right;">
                                                <b>Giảm Giá: </b>
                                                <p class="ml-2"><?php echo number_format($tongdon); ?>đ - <?php echo number_format($list[0]['GiamGia']); ?>đ</p>
                                            </div>

                                            <div class="d-flex" style="float: right;">
                                                <b>Tổng Đơn: </b>
                                                <p class="ml-2"><?php echo number_format($tongdon); ?> đ</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <div class="text-right mt-5">
                                        <div class="container-fluid">
                                            <div class="d-flex ml-5" style="float: right;">
                                                <b>Thành Tiền: </b>
                                                <p class="ml-2">0đ</p>
                                            </div>

                                            <div class="d-flex ml-5" style="float: right;">
                                                <b>Giảm Giá: </b>
                                                <p class="ml-2">0đ</p>
                                            </div>

                                            <div class="d-flex" style="float: right;">
                                                <b>Tổng Đơn: </b>
                                                <p class="ml-2">0đ</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>