<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&mdash;›</span></li>
                    <li class="category13"><strong>Blog</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col2-right-layout bounceInUp animated">
    <div class="main container">
        <div class="row">
            <section class="col-main col-sm-9">
                <div class="page-title">
                    <h2>Blog</h2>
                </div>
                <div class="static-contain">
                    <ol class="products-list" id="products-list">
                        <?php
                        $sql_select_blog = mysqli_query($con, "SELECT * FROM tbl_baiviet");

                        while ($row_blog_list = mysqli_fetch_array($sql_select_blog)) {
                        ?>
                            <div class="item first">
                                <div class="product-image">
                                    <a href="index.php?blog&blog_id=<?php echo $row_blog_list['baiviet_id'] ?>">
                                        <img class="small-image" src="images/<?php echo $row_blog_list['baiviet_image'] ?>" alt="Sample Product">
                                    </a>
                                </div>
                                <div class="product-shop">
                                    <h2 class="product-name">
                                        <a href="index.php?blog&blog_id=<?php echo $row_blog_list['baiviet_id'] ?>"><?php echo $row_blog_list['tenbaiviet'] ?></a>
                                    </h2>
                                    <div class="ratings">
                                        <p><?php echo $row_blog_list['tomtat'] ?></p>
                                    </div>
                                    <div class="desc std">
                                        <p><?php echo $row_blog_list['upload_time'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </ol>
                </div>
            </section>
        </div>
    </div>
</div>