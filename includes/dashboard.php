<?php
include './db/connect.php';
$khachhang_id = $_SESSION['khachhang_id'];
?>
<section class="main-container col2-right-layout wow bounceInUp animated">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9">
                <div class="my-account">
                    <div class="page-title">
                        <h2>My Dashboard</h2>
                    </div>
                    <div class="dashboard">
                        <div class="recent-orders">
                            <div class="title-buttons"><strong>Recent Orders</strong></div>
                            <div class="table-responsive">
                                <table class="data-table" id="my-orders-table">

                                    <thead>
                                        <tr class="first last">
                                            <th>Order #</th>
                                            <th>Date</th>
                                            <th>Ship to</th>
                                            <th><span class="nobr">Order Total</span></th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_select_donhang = mysqli_query($con, "SELECT * FROM tbl_donhang WHERE khachhang_id='$khachhang_id'");

                                        while ($row_select_donhang = mysqli_fetch_array($sql_select_donhang)) {
                                        ?>
                                        <tr class="first odd">
                                            <td><?php echo $row_select_donhang['mahang'] ?></td>
                                            <td><?php echo $row_select_donhang['ngaythang'] ?></td>
                                            <td><?php echo $row_select_donhang['diachi'] ?></td>
                                            <td><span class="price"><?php echo $row_select_donhang['subtotal'] ?> VND</span></td>
                                            <td><em><?php if ($row_select_donhang['tinhtrang'] == 0) { echo 'pending';} else { echo 'shipping';} ?></em></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>