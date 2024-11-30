<?php
include "./db/connect.php";

$khachhang_id = $_SESSION['khachhang_id'];

if (isset($_POST['themgiohang'])) {
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $hinhanh = $_POST['hinhanh'];
    $giasanpham = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];

    $sql_giohang = mysqli_query($con, "INSERT INTO tbl_giohang(tensanpham, sanpham_id, giasanpham, hinhanh, soluong, khachhang_id) VALUES ('$tensanpham', '$sanpham_id', '$giasanpham', '$hinhanh', '$soluong', '$khachhang_id')");
} elseif (isset($_GET['xoa'])) {
    $giohang_id_update = $_GET['xoa'];

    $sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang WHERE giohang_id='$giohang_id_update'");
} elseif (isset($_POST['xoatatcasanpham'])) {
    mysqli_query($con, "DELETE FROM tbl_giohang WHERE khachhang_id='$khachhang_id'");
}

$sql_select_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE khachhang_id='$khachhang_id' ORDER BY giohang_id");
?>
<?php
include "header.php";
?>
<section class="main-container col1-layout wow bounceInUp animated">
    <?php
    if (mysqli_num_rows($sql_select_giohang) > 0) {
    ?>
        <div class="main container">
            <div class="col-main">
                <div class="cart">
                    <div class="page-title">
                        <h2>Shopping Cart</h2>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="post">
                            <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                            <fieldset>
                                <table class="data-table cart-table" id="shopping-cart-table">
                                    <thead>
                                        <tr class="first last">
                                            <th rowspan="1">&nbsp;</th>
                                            <th rowspan="1"><span class="nobr">Product Name</span></th>
                                            <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                                            <th class="a-center " rowspan="1">Qty</th>
                                            <th colspan="1" class="a-center">Subtotal</th>
                                            <th class="a-center" rowspan="1">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="first last">
                                            <td class="a-right last" colspan="8"><a href="index.php" class="button btn-continue" title="Continue Shopping" type="button"><span>Continue Shopping</span></a>
                                                <button id="empty_cart_button" class="button" title="Clear Cart" value="empty_cart" name="xoatatcasanpham" type="submit"><span>Clear Cart</span></button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $total = 0;

                                        $sql_select_giohang_list = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE khachhang_id='$khachhang_id' ORDER BY giohang_id");

                                        while ($row_select_giohang = mysqli_fetch_array($sql_select_giohang_list)) {
                                        ?>
                                            <tr class="first odd">
                                                <td class="image">
                                                    <a class="product-image" title="Sample Product" href="index.php?quanly=chitiet&id=<?php echo $row_select_giohang['sanpham_id']; ?>">
                                                        <img width="60" alt="<?php echo $row_select_giohang['tensanpham']; ?>" src="images/<?php echo $row_select_giohang['hinhanh']; ?>">
                                                    </a>
                                                </td>

                                                <td>
                                                    <h2 class="product-name">
                                                        <a href="index.php?quanly=chitiet&id=<?php echo $row_select_giohang['sanpham_id']; ?>"><?php echo $row_select_giohang['tensanpham']; ?>
                                                        </a>
                                                    </h2>
                                                </td>

                                                <td class="a-center hidden-table">
                                                    <span class="cart-price">
                                                        <span class="price"><?php echo $row_select_giohang['giasanpham']; ?> VND</span>
                                                    </span>
                                                </td>

                                                <td class="a-center movewishlist">
                                                    <span class="cart-price">
                                                        <span class="price"><?php echo $row_select_giohang['soluong']; ?></span>
                                                    </span>

                                                </td>

                                                <td class="a-center movewishlist">
                                                    <span class="cart-price">
                                                        <span class="price">
                                                            <?php
                                                            $subtotal =  $row_select_giohang['giasanpham'] * $row_select_giohang['soluong'];
                                                            $total += $subtotal;
                                                            echo $subtotal;
                                                            ?>
                                                            VND
                                                        </span>
                                                    </span>
                                                </td>

                                                <td class="a-center last">
                                                    <!-- <button class="button remove-item" title="Remove item" type="submit" name="xoasanpham">Remove item</button> -->
                                                    <a class="button" href="index.php?cart&xoa=<?php echo $row_select_giohang['giohang_id']; ?>">delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </fieldset>
                        </form>
                    </div>
                    <!-- BEGIN CART COLLATERALS -->
                    <div class="cart-collaterals row">
                        <div class="totals col-sm-4">
                            <h3>Shopping Cart Total</h3>
                            <div class="inner">
                                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                                    <tbody>
                                        <tr>
                                            <td colspan="1" class="a-left"> <strong>total</strong> </td>
                                            <td class="a-right"><span class="price"><strong><?php echo $total; ?> VND</strong></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="checkout">
                                    <li>
                                        <a href="index.php?checkout"><button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button></a>
                                    </li>
                                </ul>
                            </div>
                            <!--inner-->
                        </div>
                    </div>
                    <!--cart-collaterals-->
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div style="display: flex; align-items: center; justify-content: center; margin-top: 10%">
            <ul class="checkout">
                <li>
                    <a href="index.php" style="padding: 0 1rem;">
                        <button class="button btn-proceed-checkout" type="button"><span>GIỎ HÀNG TRỐNG? MUA SẮM THÔI</span></button>
                    </a>
                </li>
            </ul>
        </div>
    <?php
    }
    ?>
</section>