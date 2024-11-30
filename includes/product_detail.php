<?php
include "./db/connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$chitiet_sanpham = mysqli_query($con, "SELECT * FROM  tbl_sanpham WHERE sanpham_id='$id'");
?>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <?php
            while ($row = mysqli_fetch_assoc($chitiet_sanpham)) {
            ?>
                <div class="row">
                    <div class="product-view">
                        <div class="product-essential">
                            <form action="<?php if (isset($_SESSION['name'])) {
                                                echo 'index.php?cart';
                                            } else {
                                                echo 'process.php';
                                            } ?>" method="post" id="product_addtocart_form">
                                <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden" />
                                <div class="product-img-box col-sm-4 col-xs-12 bounceInRight animated">
                                    <div class="new-label new-top-left">New</div>
                                    <div class="product-image">
                                        <div class="large-image">
                                            <a href="images/<?php echo $row['sanpham_image'] ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                                                <img alt="Thumbnail" src="images/<?php echo $row['sanpham_image'] ?>" />
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end: more-images -->
                                </div>
                                <div class="product-shop col-sm-5 col-xs-12 bounceInUp animated">
                                    <div class="product-name">
                                        <h1><?php echo $row['sanpham_name'] ?>t</h1>
                                    </div>
                                    <div class="short-description">
                                        <!--<h2>Quick Overview</h2>-->
                                        <p>
                                            <?php echo $row['sanpham_chitiet'] ?>
                                        </p>
                                    </div>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width: 100%" class="rating"></div>
                                        </div>
                                        <p class="rating-links">
                                            <a href="#">1 Review(s)</a>
                                            <span class="separator">|</span>
                                            <a href="#">Add Your Review</a>
                                        </p>
                                    </div>
                                    <p class="availability in-stock pull-right">
                                        <span>In Stock</span>
                                    </p>
                                    <div class="price-block">
                                        <div class="price-box">
                                            <p class="old-price">
                                                <span class="price-label">Regular Price:</span>
                                                <span class="price"><?php echo $row['sanpham_gia'] ?> VND</span>
                                            </p>
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span id="product-price-48" class="price">
                                                    <?php echo $row['sanpham_giakhuyenmai'] ?> VND
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-to-box">
                                        <div class="add-to-cart">
                                            <label for="qty">Qty:</label>
                                            <div class="pull-left">
                                                <div class="custom pull-left">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button">
                                                        <i class="icon-plus">&nbsp;</i>
                                                    </button>
                                                    <input type="text" class="input-text qty" title="Qty" value="1" maxlength="<?php echo $row['sanpham_soluong'] ?>" id="qty" name="soluong" />
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value--;return false;" class="reduced items-count" type="button">
                                                        <i class="icon-minus">&nbsp;</i>
                                                    </button>
                                                </div>
                                            </div>
                                            <fieldset style="display: none;">
                                                <input type="hidden" name="tensanpham" value="<?php echo $row['sanpham_name']; ?>">
                                                <input type="hidden" name="sanpham_id" value="<?php echo $row['sanpham_id']; ?>">
                                                <input type="hidden" name="giasanpham" value="<?php echo $row['sanpham_giakhuyenmai']; ?>">
                                                <input type="hidden" name="hinhanh" value="<?php echo $row['sanpham_image']; ?>">
                                            </fieldset>
                                            <button class="button btn-cart" title="Add to Cart" type="submit" name="themgiohang">
                                                <span><i class="icon-basket"></i> Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <aside class="col-lg-3 col-sm-3 col-xs-12 bounceInLeft animated">
                                    <div class="product-sibebar-banner">
                                        <div class="text-banner">
                                            <a title="Text Banner" href="#"><img src="images/RHS-banner-img.jpg" alt="banner" /></a>
                                        </div>
                                    </div>
                                </aside>
                            </form>
                        </div>
                        <div class="product-collateral col-sm-12 col-xs-12 bounceInUp animated">
                            <div class="add_info">
                                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                    <li class="active">
                                        <a href="#product_tabs_description" data-toggle="tab">
                                            Product Description
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#product_tabs_tags" data-toggle="tab">Tags</a>
                                    </li>
                                    <li>
                                        <a href="#reviews_tabs" data-toggle="tab">Reviews</a>
                                    </li>
                                </ul>
                                <div id="productTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="product_tabs_description">
                                        <div class="std">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Nam fringilla augue nec est tristique auctor.
                                                Donec non est at libero vulputate rutrum. Morbi
                                                ornare lectus quis justo gravida semper. Nulla
                                                tellus mi, vulputate adipiscing cursus eu, suscipit
                                                id nulla. Donec a neque libero. Pellentesque
                                                aliquet, sem eget laoreet ultrices, ipsum metus
                                                feugiat sem, quis fermentum turpis eros eget velit.
                                                Donec ac tempus ante. Fusce ultricies massa massa.
                                                Fusce aliquam, purus eget sagittis vulputate, sapien
                                                libero hendrerit est, sed commodo augue nisi non
                                                neque. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Sed tempor, lorem et placerat
                                                vestibulum, metus nisi posuere nisl, in accumsan
                                                elit odio quis mi. Cras neque metus, consequat et
                                                blandit et, luctus a nunc. Etiam gravida vehicula
                                                tellus, in imperdiet ligula euismod eget.
                                                Pellentesque habitant morbi tristique senectus et
                                                netus et malesuada fames ac turpis egestas. Nam erat
                                                mi, rutrum at sollicitudin rhoncus, ultricies
                                                posuere erat. Duis convallis, arcu nec aliquam
                                                consequat, purus felis vehicula felis, a dapibus
                                                enim lorem nec augue.
                                            </p>
                                            <p>
                                                Nunc facilisis sagittis ullamcorper. Proin lectus
                                                ipsum, gravida et mattis vulputate, tristique ut
                                                lectus. Sed et lorem nunc. Vestibulum ante ipsum
                                                primis in faucibus orci luctus et ultrices posuere
                                                cubilia Curae; Aenean eleifend laoreet congue.
                                                Vivamus adipiscing nisl ut dolor dignissim semper.
                                                Nulla luctus malesuada tincidunt. Class aptent
                                                taciti sociosqu ad litora torquent per conubia
                                                nostra, per inceptos himenaeos. Integer enim purus,
                                                posuere at ultricies eu, placerat a felis.
                                                Suspendisse aliquet urna pretium eros convallis
                                                interdum. Quisque in arcu id dui vulputate mollis
                                                eget non arcu. Aenean et nulla purus. Mauris vel
                                                tellus non nunc mattis lobortis.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="product_tabs_tags">
                                        <div class="box-collateral box-tags">
                                            <div class="tags">
                                                <div id="addTagForm">
                                                    <div class="form-add-tags">
                                                        <label for="productTagName">Add Tags:</label>
                                                        <div class="input-box">
                                                            <input class="input-text" name="productTagName" id="productTagName" type="text" />
                                                            <button class="button">
                                                                <span>Add Tags</span>
                                                            </button>
                                                        </div>
                                                        <!--input-box-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--tags-->
                                            <p class="note">
                                                Use spaces to separate tags. Use single quotes (')
                                                for phrases.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="reviews_tabs">
                                        <div class="box-collateral box-reviews" id="customer-reviews">
                                            <div class="box-reviews1">
                                                <div class="form-add">
                                                    <form id="review-form" method="post" action="#">
                                                        <h3>Write Your Own Review</h3>
                                                        <fieldset>
                                                            <h4>
                                                                How do you rate this product?
                                                                <em class="required">*</em>
                                                            </h4>
                                                            <span id="input-message-box"></span>
                                                            <table id="product-review-table" class="data-table">
                                                                <thead>
                                                                    <tr class="first last">
                                                                        <th>&nbsp;</th>
                                                                        <th><span class="nobr">1 *</span></th>
                                                                        <th><span class="nobr">2 *</span></th>
                                                                        <th><span class="nobr">3 *</span></th>
                                                                        <th><span class="nobr">4 *</span></th>
                                                                        <th><span class="nobr">5 *</span></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="first odd">
                                                                        <th>Price</th>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]" />
                                                                        </td>
                                                                        <td class="value last">
                                                                            <input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <th>Value</th>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]" />
                                                                        </td>
                                                                        <td class="value last">
                                                                            <input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="last odd">
                                                                        <th>Quality</th>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]" />
                                                                        </td>
                                                                        <td class="value">
                                                                            <input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]" />
                                                                        </td>
                                                                        <td class="value last">
                                                                            <input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <input type="hidden" value="" class="validate-rating" name="validate_rating" />
                                                            <div class="review1">
                                                                <ul class="form-list">
                                                                    <li>
                                                                        <label class="required" for="nickname_field">Nickname<em>*</em></label>
                                                                        <div class="input-box">
                                                                            <input type="text" class="input-text" id="nickname_field" name="nickname" />
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <label class="required" for="summary_field">Summary<em>*</em></label>
                                                                        <div class="input-box">
                                                                            <input type="text" class="input-text" id="summary_field" name="title" />
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="review2">
                                                                <ul>
                                                                    <li>
                                                                        <label class="required label-wide" for="review_field">Review<em>*</em></label>
                                                                        <div class="input-box">
                                                                            <textarea rows="3" cols="5" id="review_field" name="detail"></textarea>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="buttons-set">
                                                                    <button class="button submit" title="Submit Review" type="submit">
                                                                        <span>Submit Review</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="box-reviews2">
                                                <h3>Customer Reviews</h3>
                                                <div class="box visible">
                                                    <ul>
                                                        <li>
                                                            <table class="ratings-table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Value</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 100%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Quality</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 100%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Price</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 100%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="review">
                                                                <h6><a href="#">Excellent</a></h6>
                                                                <small>Review by <span>Leslie Prichard </span>on
                                                                    1/3/2014
                                                                </small>
                                                                <div class="review-txt">
                                                                    I have purchased shirts from Minimalism a
                                                                    few times and am never disappointed. The
                                                                    quality is excellent and the shipping is
                                                                    amazing. It seems like it's at your front
                                                                    door the minute you get off your pc. I
                                                                    have received my purchases within two days
                                                                    - amazing.
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="even">
                                                            <table class="ratings-table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Value</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 100%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Quality</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 100%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Price</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 80%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="review">
                                                                <h6>
                                                                    <a href="#/catalog/product/view/id/60/">Amazing</a>
                                                                </h6>
                                                                <small>Review by <span>Sandra Parker</span>on
                                                                    1/3/2014
                                                                </small>
                                                                <div class="review-txt">
                                                                    Minimalism is the online !
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <table class="ratings-table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Value</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 100%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Quality</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 100%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Price</th>
                                                                        <td>
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width: 80%"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="review">
                                                                <h6>
                                                                    <a href="#/catalog/product/view/id/59/">Nicely</a>
                                                                </h6>
                                                                <small>Review by <span>Anthony Lewis</span>on
                                                                    1/3/2014
                                                                </small>
                                                                <div class="review-txt">
                                                                    Unbeatable service and selection. This
                                                                    store has the best business model I have
                                                                    seen on the net. They are true to their
                                                                    word, and go the extra mile for their
                                                                    customers. I felt like a purchasing
                                                                    partner more than a customer. You have a
                                                                    lifetime client in me.
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="actions">
                                                    <a class="button view-all" id="revies-button" href="#"><span><span>View all</span></span></a>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>