<?php
include "../db/connect.php";

if (isset($_POST['themdanhmuc'])) {
    $tendanhmuc = $_POST['danhmuc'];
    $sql_insert = mysqli_query($con, "INSERT INTO tbl_category(category_name) VALUES ('$tendanhmuc')");
}
elseif (isset($_POST['capnhatdanhmuc'])) {
    $id_post_capnhat = $_POST['id_danhmuc'];
    $tendanhmuc = $_POST['danhmuc'];
    $sql_insert = mysqli_query($con, "UPDATE tbl_category SET category_name='$tendanhmuc' WHERE category_id='$id_post_capnhat'");
}

if (isset($_GET['xoa'])) {
    $id_xoa = $_GET['xoa'];

    $sql_delete = mysqli_query($con, "DELETE FROM tbl_category WHERE category_id='$id_xoa'");
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>DANH MỤC<h1>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['quanly']) == 'capnhat') {
                    $id_capnhat = $_GET['id'];
                    $sql_capnhat = mysqli_query($con, "SELECT * FROM tbl_category WHERE category_id='$id_capnhat'");

                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                ?>
                    <div class="col-md-4">
                        <h4>cập nhật danh mục</h4>
                        <label>tên danh mục</label>
                        <form action="" method="post">
                            <input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat['category_name'] ?>" required>
                            <input type="hidden" name="id_danhmuc" value="<?php echo $row_capnhat['category_id'] ?>">
                            <input type="submit" class="form-control btn btn-primary" name="capnhatdanhmuc" value="cập nhật danh mục" style="margin-top: 4px;">
                        </form>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-md-4">
                        <h4>thêm danh mục</h4>
                        <label>tên danh mục</label>
                        <form action="" method="post">
                            <input type="text" class="form-control" name="danhmuc" placeholder="tên danh mục" required>
                            <input type="submit" class="form-control btn btn-primary" name="themdanhmuc" value="thêm danh mục" style="margin-top: 4px;">
                        </form>
                    </div>
                <?php
                }
                ?>
                <div class="col-md-8">
                    <h4>liệt kê danh mục</h4>
                    <?php
                    $sql_select = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC");
                    ?>
                    <table class="table" style="background-color: #ccc; text-align: center;">
                        <tr>
                            <th style="text-align: center;">thứ tự</th>
                            <th style="text-align: center;">tên danh mục</th>
                            <th style="text-align: center;">quản lý</th>
                        </tr>
                        <?php
                        $i = 0;
                        while ($row_category = mysqli_fetch_array($sql_select)) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row_category['category_name'] ?></th>
                                <td><a href="?xoa=<?php echo $row_category['category_id'] ?>">xóa</a> || <a href="?quanly=capnhap&id=<?php echo $row_category['category_id'] ?>">cập nhập</a></td>
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