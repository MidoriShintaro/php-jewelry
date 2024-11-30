<?php
$khachhang_id = $_SESSION['khachhang_id'];
$sql_select_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE khachhang_id='$khachhang_id' ORDER BY giohang_id");

if (isset($_POST['cod'])) {
  $donhang_mahang = date("YmdHis") . rand(1000, 9999);
  $donhang_diachi = $_POST['donhang_address'];
  $donhang_phone = $_POST['donhang_phone'];
  $donhang_note = $_POST['donhang_note'];

  while ($row_insert_donhang = mysqli_fetch_array($sql_select_giohang)) {
    $donhang_sanpham_id = $row_insert_donhang['sanpham_id'];
    $donhang_sanpham_soluong = $row_insert_donhang['soluong'];
    $subtotal_donhang = $row_insert_donhang['soluong'] * $row_insert_donhang['giasanpham'];

    mysqli_query($con, "INSERT INTO tbl_donhang (sanpham_id, soluong, mahang, khachhang_id, tinhtrang, diachi, phone, note, subtotal) VALUES ('$donhang_sanpham_id', '$donhang_sanpham_soluong', '$donhang_mahang', '$khachhang_id', 0, '$donhang_diachi', '$donhang_phone', '$donhang_note', '$subtotal_donhang')");
  }

  mysqli_query($con, "DELETE FROM tbl_giohang WHERE khachhang_id='$khachhang_id'");
}
?>
<?php
include "header.php";
?>
<section class="main-container col2-right-layout bounceInUp animated">

  <?php
  if (mysqli_num_rows($sql_select_giohang) > 0) {
  ?>
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9">
          <div class="page-title">
            <h2>Checkout</h2>
          </div>
          <div id="checkoutSteps" style="width: 100%; margin-bottom: 15px; overflow-y: hidden; -ms-overflow-style: -ms-autohiding-scrollbar; border: 1px solid #ddd;">
            <fieldset>
              <table class="data-table cart-table" id="shopping-cart-table">
                <thead>
                  <tr class="first last">
                    <th rowspan="1">&nbsp;</th>
                    <th rowspan="1"><span class="nobr">Product Name</span></th>
                    <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                    <th class="a-center " rowspan="1">Qty</th>
                    <th colspan="1" class="a-center">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  $sql_select_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE khachhang_id='$khachhang_id' ORDER BY giohang_id");

                  while ($row_select_giohang = mysqli_fetch_array($sql_select_giohang)) {
                    $sanpham_id = $row_select_giohang['sanpham_id'];
                    $hinhanh = $row_select_giohang['hinhanh'];
                    $tensanpham = $row_select_giohang['tensanpham'];
                    $giasanpham = $row_select_giohang['giasanpham'];
                    $soluong = $row_select_giohang['soluong'];
                  ?>
                    <tr class="first odd">
                      <td class="image">
                        <a class="product-image" title="Sample Product" href="index.php?quanly=chitiet&id=<?php echo $sanpham_id; ?>">
                          <img width="60" alt="<?php echo $tensanpham; ?>" src="images/<?php echo $hinhanh; ?>">
                        </a>
                      </td>

                      <td>
                        <h2 class="product-name">
                          <a href="index.php?quanly=chitiet&id=<?php echo $sanpham_id; ?>"><?php echo $tensanpham; ?>
                          </a>
                        </h2>
                      </td>

                      <td class="a-center hidden-table">
                        <span class="cart-price">
                          <span class="price"><?php echo $giasanpham; ?> VND</span>
                        </span>
                      </td>

                      <td class="a-center movewishlist">
                        <span><?php echo $soluong; ?></span>
                      </td>

                      <td class="a-center movewishlist">
                        <span class="cart-price">
                          <span class="price">
                            <?php
                            $subtotal =  $giasanpham * $soluong;
                            $total += $subtotal;
                            echo $subtotal;
                            ?>
                            VND
                          </span>
                        </span>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td><strong>TOTAL:</strong></td>
                    <td></td>
                    <td></td>
                    <td><span style="font-size: 2rem;"><strong><?php echo $total; ?> VND</strong></span></td>
                  </tr>
                </tfoot>
              </table>
            </fieldset>
          </div>
        </div>
        <aside class="col-right sidebar col-sm-3">
          <div class="block block-progress">
            <div class="block-title ">Your Checkout</div>
            <div class="block-content">
              <form action="index.php?checkout" method="post">
                <div style="margin-bottom: 4px;">
                  <label>địa chỉ :</label> <br>
                  <input type="text" style="width: 100%;" name="donhang_address">
                </div>
                <div style="margin-bottom: 4px;">
                  <label>số điện thoại :</label> <br>
                  <input type="text" style="width: 100%;" name="donhang_phone">
                </div>
                <div style="margin-bottom: 40px;">
                  <label>ghi chú :</label> <br>
                  <input type="text" style="width: 100%;" name="donhang_note">
                </div>

                <input type="submit" class="button btn-orima" name="cod" value="thanh toán COD" style="width: 100%; margin-bottom: 4px; border-color: black;">
                <br>
                <button type="button" class="button" style="width: 100%; border-color: black;">
                  <a href="./vnpay_php">thanh toán VNPAY</a>
                </button>
              </form>
            </div>
          </div>
        </aside>
      </div>
    </div>
  <?php
  } else {
  ?>
    <div style="display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10%">
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