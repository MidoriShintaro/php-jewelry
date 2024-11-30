<div class="main-col">
    <div class="container">
        <div class="row">
            <!-- Featured Slider -->
            <div class="best-pro container wow bounceInUp animated">
                <div class="slider-items-products">
                    <div class="new_title center">
                        <h2>Best Seller</h2>
                    </div>
                    <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <?php
                            include "./db/connect.php";

                            $bestSeller = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_hot=1");

                            while ($row = mysqli_fetch_array($bestSeller)) {
                            ?>
                                <div class="item">
                                    <form action="<?php if (isset($_SESSION['name'])) {
                                                        echo 'index.php?cart';
                                                    } else {
                                                        echo 'process.php';
                                                    } ?>" method="post" class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info"> <a class="product-image" title="Sample Product" href="index.php?quanly=chitiet&id=<?php echo $row['sanpham_id'] ?>"> <img alt="Sample Product" src="images/<?php echo $row['sanpham_image'] ?>"></a>
                                                <div class="sale-label sale-top-left">sale</div>
                                                <div class="item-box-hover">
                                                    <div class="box-inner">
                                                        <div class="actions">
                                                            <fieldset style="display: none;">
                                                                <input type="hidden" name="tensanpham" value="<?php echo $row['sanpham_name']; ?>">
                                                                <input type="hidden" name="sanpham_id" value="<?php echo $row['sanpham_id']; ?>">
                                                                <input type="hidden" name="giasanpham" value="<?php echo $row['sanpham_giakhuyenmai']; ?>">
                                                                <input type="hidden" name="hinhanh" value="<?php echo $row['sanpham_image']; ?>">
                                                                <input type="hidden" name="soluong" value="1">
                                                            </fieldset>
                                                            <div class="add_cart">
                                                                <button class="button btn-cart" type="submit" name="themgiohang"><span>Add to Cart</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a title="Sample Product" href="index.php?quanly=chitiet&id=<?php echo $row['sanpham_id'] ?>"><?php echo $row['sanpham_name'] ?></a></div>
                                                <div class="item-content">
                                                    <div class="rating">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div style="width:100%" class="rating"></div>
                                                            </div>
                                                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                        </div>
                                                    </div>
                                                    <div class="item-price">
                                                        <div class="price-box">
                                                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"><?php echo $row['sanpham_gia'] ?> VND</span> </p>
                                                            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"><?php echo $row['sanpham_giakhuyenmai'] ?> VND</span> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- End Item -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Featured Slider -->
        </div>
    </div>
</div>