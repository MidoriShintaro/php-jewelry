<?php
include "./db/connect.php";
if (isset($_GET['danhmuc'])) {
  $category_id = $_GET['danhmuc'];
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
          <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>» </span></li>
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
            <h2><?php echo $danhmuc_name ?></h2>
          </div>
          <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col1 owl-carousel owl-theme">
                  <!-- Item -->
                  <div class="item"> <a href="#x"><img alt="" src="images/women_banner.png"></a>
                    <div class="cat-img-title cat-bg cat-box">
                      <h2 class="cat-heading"><strong>New Fashion 2022</strong><br></h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</p>
                    </div>
                  </div>
                  <!-- End Item -->
                  <!-- Item -->
                  <div class="item"><a href="#x"><img alt="" src="images/women_banner1.png"></a></div>
                  <!-- End Item -->
                </div>
              </div>
            </div>
          </div>
          <div class="toolbar">
            <div class="sorter">
              <div class="view-mode"> <span title="Grid" class="button button-active button-grid">&nbsp;</span><a href="index.php?quanly=list&danhmuc=<?php echo $category_id ?>" title="List" class="button-list">&nbsp;</a> </div>
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
            <ul class="products-grid">
              <?php
              while ($row_chitiet_danhmuc = mysqli_fetch_array($chitiet_danhmuc)) {
              ?>
                <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                  <form action="<?php if (isset($_SESSION['name'])) { echo 'index.php?cart';} else { echo 'process.php';} ?>" method="post" class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"> <a href="index.php?quanly=chitiet&id=<?php echo $row_chitiet_danhmuc['sanpham_id'] ?>" title="Sample Product" class="product-image"> <img src="images/<?php echo $row_chitiet_danhmuc['sanpham_image'] ?>" alt="Sample Product"> </a>
                        <div class="sale-label sale-top-left">Sale</div>
                        <div class="item-box-hover">
                          <div class="box-inner">
                            <div class="actions">
                              <fieldset style="display: none;">
                                <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet_danhmuc['sanpham_name']; ?>">
                                <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet_danhmuc['sanpham_id']; ?>">
                                <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet_danhmuc['sanpham_giakhuyenmai']; ?>">
                                <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet_danhmuc['sanpham_image']; ?>">
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
                        <div class="item-title"><a href="index.php?quanly=chitiet&id=<?php echo $row_chitiet_danhmuc['sanpham_id'] ?>" title="Sample Product"><?php echo $row_chitiet_danhmuc['sanpham_name'] ?></a></div>
                        <div class="item-content">
                          <div class="rating">
                            <div class="ratings">
                              <div class="rating-box">
                                <div class="rating" style="width:100%"></div>
                              </div>
                            </div>
                          </div>
                          <div class="item-price">
                            <div class="price-box">
                              <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"><?php echo $row_chitiet_danhmuc['sanpham_gia'] ?> VND</span> </p>
                              <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"><?php echo $row_chitiet_danhmuc['sanpham_giakhuyenmai'] ?> VND</span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </li>
              <?php
              }
              ?>
            </ul>
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