<?php
include "./db/connect.php";
if (isset($_GET['danhmuc'])) {
    $category_id = $_GET['danhmuc'];
} else {
    header('location: index.php');
}

$danhmuc = mysqli_query($con, "SELECT * FROM tbl_category WHERE category_id='$category_id'");
$chitiet_danhmuc = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE category_id='$category_id'");
?>
<!-- Breadcrumbs -->
<div class="breadcrumbs bounceInUp animated">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>» </span></li>
                    <li class="category13">
                        <strong>
                            <?php while ($row_danhmuc = mysqli_fetch_assoc($danhmuc)) {
                                $danhmuc_name = $row_danhmuc['category_name'];
                                echo $danhmuc_name;
                            } ?>
                        </strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col2-left-layout bounceInUp animated">
    <div class="container">
        <div class="row">
            <div class="col-main col-sm-9 col-sm-push-3">
                <article class="col-main">
                    <div class="page-header">
                        <h2><?php echo $danhmuc_name; ?></h2>
                    </div>
                    <div class="category-image"><img title="Sofas " alt="Sofas " src="images/women_banner.png"> </div>
                    <div class="toolbar">
                        <div class="sorter">
                            <div class="view-mode"> <a href="index.php?quanly=grid&danhmuc=<?php echo $category_id ?>" title="Grid" class="button button-grid">&nbsp;</a>&nbsp; <span title="List" class="button button-active button-list">&nbsp;</span>&nbsp; </div>
                        </div>
                        <div id="sort-by">
                            <label class="left">Sort By: </label>
                            <ul>
                                <li><a href="#">Position<span class="right-arrow"></span></a>
                                    <ul>
                                        <li><a href="#">Name</a></li>
                                        <li><a href="#">Price</a></li>
                                        <li><a href="#">Position</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="category-products">
                        <ol class="products-list" id="products-list">
                            <?php
                            while ($row_chitiet_danhmuc = mysqli_fetch_array($chitiet_danhmuc)) {
                            ?>
                                <form action="<?php if (isset($_SESSION['name'])) { echo 'index.php?cart';} else { echo 'process.php';} ?>" method="post" class="item first">
                                    <div class="product-image"> <a href="index.php?quanly=chitiet&id=<?php echo $row_chitiet_danhmuc['sanpham_id'] ?>" title="Sample Product"> <img class="small-image" src="images/<?php echo $row_chitiet_danhmuc['sanpham_image'] ?>" alt="Sample Product"> </a> </div>
                                    <div class="product-shop">
                                        <h2 class="product-name"><a href="index.php?quanly=chitiet&id=<?php echo $row_chitiet_danhmuc['sanpham_id'] ?>" title="Sample Product"><?php echo $row_chitiet_danhmuc['sanpham_name'] ?></a></h2>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div style="width:100%" class="rating"></div>
                                            </div>
                                            <p class="rating-links"> <a href="#/review/product/list/id/167/category/35/">1 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                                        </div>
                                        <div class="desc std">
                                            <p><?php echo $row_chitiet_danhmuc['sanpham_chitiet'] ?></p>
                                            <p>Sed sed interdum diam. Donec sit ametenim tempor, dapibus nunc eu,
                                                tincidunt mi. Vivamus dictum nec... <a class="link-learn" title="" href="#">Learn More</a> </p>
                                        </div>
                                        <div class="price-box">
                                            <p class="old-price"> <span class="price-label"></span> <span id="old-price-212" class="price"><?php echo $row_chitiet_danhmuc['sanpham_gia'] ?> VND</span> </p>
                                            <p class="special-price"> <span class="price-label"></span> <span id="product-price-212" class="price"><?php echo $row_chitiet_danhmuc['sanpham_giakhuyenmai'] ?> VND</span> </p>
                                        </div>
                                        <div class="actions">
                                            <fieldset style="display: none;">
                                                <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet_danhmuc['sanpham_name']; ?>">
                                                <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet_danhmuc['sanpham_id']; ?>">
                                                <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet_danhmuc['sanpham_giakhuyenmai']; ?>">
                                                <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet_danhmuc['sanpham_image']; ?>">
                                                <input type="hidden" name="soluong" value="1">
                                            </fieldset>
                                            <button class="button btn-cart ajx-cart" title="Add to Cart" type="submit" name="themgiohang"><span>Add to Cart</span></button>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </ol>
                    </div>
                </article>
                <!--	///*///======    End article  ========= //*/// -->
            </div>
            <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <aside class="col-left sidebar">
                    <div class="side-nav-categories">
                        <div class="block-title"> Categories </div>
                        <!--block-title-->
                        <!-- BEGIN BOX-CATEGORY -->
                        <div class="box-content box-category">
                            <ul>
                                <li><a class="active" href="#">Women</a></li>
                                <?php
                                $category = mysqli_query($con, "SELECT * FROM tbl_category");

                                while ($row = mysqli_fetch_array($category)) {
                                ?>
                                    <li> <a href="index.php?quanly=grid&danhmuc=<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="last"><a href="#">Fashion</a></li>
                            </ul>
                        </div>
                        <!--box-content box-category-->
                    </div>
                    <div class="block block-banner"><a href="#"><img alt="block-banner" src="images/RHS-banner-img.jpg"></a></div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Main Container End -->