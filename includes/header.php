<?php
include "./db/connect.php";
?>
<header>
    <div class="header-container">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-xs-6 col-lg-2 hidden-xs">
                        <div class="welcome-msg"> Welcomes to my Shop!! </div>
                    </div>
                    <div class="col-sm-10 col-xs-6 col-lg-10">
                        <div class="toplinks">
                            <div class="links">
                                <div class="check hidden-xs"><a title="Checkout" href="index.php?checkout"><span class="hidden-xs">Checkout</span></a></div>
                                <div class="demo hidden-xs"><a title="Blog" href="?blog"><span class="hidden-xs">Blog</span></a></div>
                                <div class="check hidden-xs"><a title="About us" href="index.php?about"><span class="hidden-xs">About Us</span></a></div>
                                <?php
                                if (isset($_SESSION['name'])) {
                                    echo '<div style="margin: 0 0.5rem;"><form action="process.php" method="post">
                                        <input type="submit" name="logout" value="Log Out">
                                    </form></div>';
                                } else {
                                    echo '<div style="margin: 0 0.5rem;"><form action="process.php" method="post">
                                    <button type="submit" name="signin">sign in</button>
                                    </form></div>';
                                }
                                ?>
                            </div>
                            <!-- links -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-sm-3 col-xs-12 col-md-2">
                        <!-- Header Logo -->
                        <div class="logo"><a title="Magento Commerce" href="index.php"><img alt="Magento Commerce" src="images/logo.png"></a></div>
                        <!-- End Header Logo -->
                    </div>
                    <!-- Navbar -->
                    <div class="nav-inner">
                        <ul id="nav" class="hidden-xs">
                            <li class="level0"><a href="index.php"><span>Home</span></a></li>
                            <?php
                            $category = mysqli_query($con, "SELECT * FROM tbl_category");

                            while ($row = mysqli_fetch_array($category)) {
                            ?>
                                <li class="mega-menu"><a href="index.php?quanly=grid&danhmuc=<?php echo $row['category_id'] ?>" class="level-top"><span><?php echo $row['category_name'] ?></span></a></li>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="menu_top">
                            <div class="top-cart-contain pull-right">
                                <!-- Top Cart -->
                                <?php
                                if (isset($_SESSION['name'])) {
                                    $khachhang_id = $_SESSION['khachhang_id'];
                                    $sql_select_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE khachhang_id='$khachhang_id' ORDER BY giohang_id DESC");
                                ?>
                                    <div class="mini-cart">
                                        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                                            <a href="index.php?cart">(<?php echo mysqli_num_rows($sql_select_giohang) ?>)</a>
                                        </div>
                                        <div>
                                            <div class="top-cart-content" style="display: none;">
                                                <div class="block-subtitle">
                                                    <!--top-subtotal-->
                                                    <div class="pull-right">
                                                        <button title="View Cart" class="view-cart" type="button"><a href="index.php?cart"><span>View Cart</span></a></button>
                                                    </div>
                                                    <!--pull-right-->
                                                </div>
                                                <!--block-subtitle-->
                                                <ul class="mini-products-list" id="cart-sidebar">
                                                    <?php
                                                    while ($row_select_giohang = mysqli_fetch_array($sql_select_giohang)) {
                                                    ?>
                                                        <li class="item first">
                                                            <div class="item-inner"><a href="index.php?quanly=chitiet&id=<?php echo $row_select_giohang['sanpham_id'] ?>" class="product-image" title="Sample Product"><img alt="Sample Product" src="images/<?php echo $row_select_giohang['hinhanh'] ?>"></a>
                                                                <div class="product-details">
                                                                    <!--access--> <strong><?php echo $row_select_giohang['soluong'] ?></strong> x <span class="price"><?php echo $row_select_giohang['giasanpham'] ?> VND</span>
                                                                    <p class="product-name"><a href="index.php?quanly=chitiet&id=<?php echo $row_select_giohang['sanpham_id'] ?>"><?php echo $row_select_giohang['tensanpham'] ?></a></p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                                <?php
                                                if (mysqli_num_rows($sql_select_giohang) > 0) {
                                                ?>
                                                    <div class="actions">
                                                        <button class="btn-checkout" title="Checkout" type="button"><a href="index.php?checkout">Checkout</a></button>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- Top Cart -->
                                <div id="ajaxconfig_info" style="display:none"><a href="#/"></a>
                                    <input value="" type="hidden">
                                    <input id="enable_module" value="1" type="hidden">
                                    <input class="effect_to_cart" value="1" type="hidden">
                                    <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                                </div>
                            </div>
                            <!-- Header Language -->
                            <div class="lang-curr">
                                <div class="form-language">
                                    <ul class="lang">
                                        <li class=""><a href="#" title="English"><img src="images/english.png" alt="English" /> <span>English</span></a></li>
                                        <li class=""><a href="#" title="German"><img src="images/german.png" alt="German" /> <span>german</span></a></li>
                                    </ul>
                                </div>
                                <div class="form-currency">
                                    <ul class="currencies_list">
                                        <li class=""><a class="" title="Dollar" href="#">$</a></li>
                                        <li class=""><a class="" title="Euro" href="#">&euro;</a></li>
                                        <li class=""><a class="" title="Pound" href="#">&pound;</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- End Header Currency -->

                        </div>
                    </div>

                    <!-- end nav -->

                </div>
            </div>
        </div>
    </div>
</header>

<div class="mm-toggle-wrap">
    <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
</div>