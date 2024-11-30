<?php
include "../db/connect.php";

if (isset($_POST['thembaiviet'])) {
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $path = '../images/';
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    $sql_insert_product = mysqli_query($con, "INSERT INTO tbl_baiviet(tenbaiviet,tomtat,noidung,baiviet_image) values ('$tenbaiviet','$tomtat','$noidung','$hinhanh')");
    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
} elseif (isset($_POST['capnhatbaiviet'])) {
    $id_update = $_POST['id_update'];
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    $noidung = $_POST['noidung'];
    $tomtat = $_POST['tomtat'];
    $path = '../images/';
    if ($hinhanh == '') {
        $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$noidung',tomtat='$tomtat' WHERE baiviet_id='$id_update'";
    } else {
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$noidung',tomtat='$tomtat',baiviet_image='$hinhanh' WHERE baiviet_id='$id_update'";
    }
    mysqli_query($con, $sql_update_image);
} elseif (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con, "DELETE FROM tbl_baiviet WHERE baiviet_id='$id'");
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>BÀI VIẾT<h1>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['quanly']) == 'capnhat') {
                    $id_capnhat = $_GET['capnhat_id'];
                    $sql_capnhat = mysqli_query($con, "SELECT * FROM tbl_baiviet WHERE baiviet_id='$id_capnhat'");
                    $row_capnhat = mysqli_fetch_assoc($sql_capnhat);
                ?>
                    <div class="col-md-4">
                        <h4>Cập nhật bài viết</h4>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <label>Tên bài viết</label>
                            <input type="text" class="form-control" name="tenbaiviet" value="<?php echo $row_capnhat['tenbaiviet'] ?>"><br>
                            <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['baiviet_id'] ?>">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="hinhanh"><br>
                            <img src="../images/<?php echo $row_capnhat['baiviet_image'] ?>" height="80" width="80"><br>
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="10" name="tomtat"><?php echo $row_capnhat['tomtat'] ?></textarea><br>
                            <label>Chi tiết</label>
                            <textarea class="form-control" rows="10" name="noidung"><?php echo $row_capnhat['noidung'] ?></textarea><br>
                            <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-default">
                        </form>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-md-4">
                        <h4>Thêm bài viết</h4>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <label>Tên bài viết</label>
                            <input type="text" class="form-control" name="tenbaiviet" placeholder="Tên bài viết"><br>
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="hinhanh"><br>

                            <label>tóm tắt</label>
                            <textarea class="form-control" name="tomtat"></textarea><br>
                            <label>nội dung</label>
                            <textarea class="form-control" name="noidung"></textarea><br>
                            <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-default">
                        </form>
                    </div>
                <?php
                }

                ?>
                <div class="col-md-8">
                    <h4>Liệt kê bài viết</h4>
                    <?php
                    $sql_select_bv = mysqli_query($con, "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC");
                    ?>
                    <table class="table" style="background-color: #ccc; text-align: center;">
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên bài viết</th>
                            <th>Hình ảnh</th>
                            <th>Quản lý</th>
                        </tr>
                        <?php
                        $i = 0;
                        while ($row_bv = mysqli_fetch_array($sql_select_bv)) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row_bv['tenbaiviet'] ?></td>
                                <td><img src="../images/<?php echo $row_bv['baiviet_image'] ?>" width="60"></td>
                                <td><a href="?xoa=<?php echo $row_bv['baiviet_id'] ?>">Xóa</a> || <a href="?quanly=capnhat&capnhat_id=<?php echo $row_bv['baiviet_id'] ?>">Cập nhật</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>