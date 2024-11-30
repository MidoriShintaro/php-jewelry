<section id="lastest_blog" class="latest-blog container wow bounceInUp animated">
    <div class="slider-items-products">
        <div class="new_title center">
            <h2>Latest Blog</h2>
        </div>
        <div id="latest-blog-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                <?php
                include "./db/connect.php";

                $sql_select_blog_list = mysqli_query($con, "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC LIMIT 5");
                while ($row = mysqli_fetch_array($sql_select_blog_list)) {
                ?>
                    <div class="item">
                        <div class="blog_inner">
                            <div class="blog-img"> <img src="images/<?php echo $row['baiviet_image']; ?>" alt="Blog image">
                                <div class="mask"> <a class="info" href="index.php?blog&blog_id=<?php echo $row['baiviet_id']; ?>">Read More</a> </div>
                            </div>
                            <h3><a href="index.php?blog&blog_id=<?php echo $row['baiviet_id']; ?>" style="display: -webkit-box;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp: 2;
                            line-height: 1;"><?php echo $row['tenbaiviet']; ?></a> </h3>
                            <div class="post-date"><i class="icon-calendar"></i> <?php echo $row['upload_time']; ?></div>
                            <p><?php echo $row['tomtat']; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>