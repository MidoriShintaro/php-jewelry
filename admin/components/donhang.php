<?php
include "../db/connect.php";
?>
<?php
if (isset($_POST['capnhatdonhang'])) {
    $xuly = $_POST['xuly'];
    $mahang = $_POST['mahang_xuly'];
    $sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET tinhtrang='$xuly' WHERE mahang='$mahang'");
    $sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET tinhtrangdon='$xuly' WHERE magiaodich='$mahang'");
}

?>
<?php
if (isset($_GET['xoadonhang'])) {
    $mahang = $_GET['xoadonhang'];
    $sql_delete = mysqli_query($con, "DELETE FROM tbl_donhang WHERE mahang='$mahang'");
    header('Location:xulydonhang.php');
} elseif (isset($_GET['xoa1sanpham'])) {
    $donhang_id = $_GET['xoa1sanpham'];

    mysqli_query($con, "DELETE FROM tbl_donhang WHERE donhang_id='$donhang_id'");
} else {
    $huydon = '';
    $magiaodich = '';
}
$sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET tinhtrang='$huydon' WHERE mahang='$magiaodich'");
$sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET tinhtrang='$huydon' WHERE magiaodich='$magiaodich'");
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>ĐƠN HÀNG<h1>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h4>Liệt kê đơn hàng</h4>
                    <?php
                    $sql_select = mysqli_query($con, "SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id GROUP BY mahang ");
                    ?>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Thứ tự</th>
                            <th>Mã hàng</th>
                            <th>Tình trạng đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Ghi chú</th>
                            <th>Quản lý</th>
                        </tr>
                        <?php
                        $i = 0;
                        while ($row_donhang = mysqli_fetch_array($sql_select)) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>

                                <td><?php echo $row_donhang['mahang']; ?></td>
                                <td><?php
                                    if ($row_donhang['tinhtrang'] == 0) {
                                        echo 'Chưa xử lý';
                                    } else {
                                        echo 'Đã xử lý';
                                    }
                                    ?></td>
                                <td><?php echo $row_donhang['name']; ?></td>

                                <td><?php echo $row_donhang['ngaythang'] ?></td>
                                <td><?php echo $row_donhang['note'] ?></td>

                                <td><a href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>">Xóa</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem </a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
                if (isset($_GET['quanly']) == 'xemdonhang') {
                    $mahang = $_GET['mahang'];
                    $sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.mahang='$mahang'");
                ?>
                    <div class="col-md-7">
                        <p>Xem chi tiết đơn hàng</p>
                        <form action="" method="POST">
                            <table class="table table-bordered ">
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Mã hàng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt</th>
                                </tr>
                                <?php
                                $i = 0;
                                while ($row_donhang = mysqli_fetch_array($sql_chitiet)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row_donhang['mahang']; ?></td>

                                        <td><?php echo $row_donhang['sanpham_name']; ?></td>
                                        <td><?php echo $row_donhang['soluong']; ?></td>
                                        <td><?php echo $row_donhang['sanpham_giakhuyenmai']; ?></td>
                                        <td><?php echo number_format($row_donhang['soluong'] * $row_donhang['sanpham_giakhuyenmai']) . 'vnđ'; ?></td>

                                        <td><?php echo $row_donhang['ngaythang'] ?></td>
                                        <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['mahang'] ?>">

                                        <td><a href="?xoa1sanpham=<?php echo $row_donhang['donhang_id'] ?>">Xóa</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>

                            <select class="form-control" name="xuly">
                                <option value="1">Đã xử lý | Giao hàng</option>
                                <option value="0">Chưa xử lý</option>
                            </select><br>

                            <input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
                        </form>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-md-7">
                        <p>Đơn hàng</p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</div>