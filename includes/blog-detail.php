<?php
include "./db/connect.php";

if (isset($_GET['blog_id'])) {
    $id = $_GET['blog_id'];
    $sql_select_blog = mysqli_query($con, "SELECT * FROM tbl_baiviet WHERE baiviet_id='$id'");
}
?>
<section class="main-container col2-right-layout bounceInUp animated">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9">
                <div class="page-title">
                    <h2>Blog</h2>
                </div>
                <?php
                while ($row_select_blog = mysqli_fetch_assoc($sql_select_blog)) {
                ?>
                    <div class="blog-wrapper" id="main">
                        <div class="site-content" id="primary">
                            <div role="main" id="content">
                                <article class="blog_entry clearfix">
                                    <header class="blog_entry-header clearfix">
                                        <div class="blog_entry-header-inner">
                                            <h2 class="blog_entry-title"><?php echo $row_select_blog['tenbaiviet']; ?></h2>
                                        </div>
                                        <!--blog_entry-header-inner-->
                                    </header>
                                    <!--blog_entry-header clearfix-->
                                    <div class="entry-content">
                                        <div class="featured-thumb" style="margin-bottom: 2rem">
                                            <img width="780" height="520" alt="<?php echo $row_select_blog['baiviet_image']; ?>" src="images/<?php echo $row_select_blog['baiviet_image']; ?>" style="object-fit: contain;">
                                        </div>
                                        <div class="entry-content">
                                            <?php echo $row_select_blog['noidung']; ?>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <aside class="col-right sidebar col-sm-3">
                <div role="complementary" class="widget_wrapper13" id="secondary">
                    <div class="popular-posts widget widget__sidebar" id="recent-posts-4">
                        <h3 class="widget-title">Most Newest Post</h3>
                        <div class="widget-content">
                            <ul class="posts-list unstyled clearfix">
                                <?php
                                     $sql_select_blog_list = mysqli_query($con, "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC LIMIT 4");

                                     while ($row_select_blog_list = mysqli_fetch_array($sql_select_blog_list)) {
                                ?>
                                <li>
                                    <figure class="featured-thumb"> <a href="index.php?blog&blog_id=<?php echo $row_select_blog_list['baiviet_id']; ?>"> <img width="80" height="53" alt="blog image" src="images/<?php echo $row_select_blog_list['baiviet_image']; ?>"> </a> </figure>
                                    <!--featured-thumb-->
                                    <h4><a title="Pellentesque posuere" href="index.php?blog&blog_id=<?php echo $row_select_blog_list['baiviet_id']; ?>"><?php echo $row_select_blog_list['tenbaiviet']; ?></a></h4>
                                    <p class="post-meta"><i class="icon-calendar"></i>
                                        <time datetime="<?php echo $row_select_blog_list['upload_time']; ?>" class="entry-date"><?php echo $row_select_blog_list['upload_time']; ?></time>
                                        .
                                    </p>
                                </li>
                                <?php
                                     }
                                ?>
                            </ul>
                        </div>
                        <!--widget-content-->
                    </div>
                    <!-- Banner Ad Block -->
                    <div class="ad-spots widget widget__sidebar">
                        <h3 class="widget-title">Ad Spots</h3>
                        <div class="widget-content"><a target="_self" href="#" title=""><img alt="offer banner" src="images/offer_banner1.jpg"></a></div>
                    </div>
                    <!-- Banner Text Block -->
                    <div class="text-widget widget widget__sidebar">
                        <h3 class="widget-title">Text Widget</h3>
                        <div class="widget-content">Mauris at blandit erat. Nam vel tortor non quam scelerisque cursus. Praesent nunc vitae magna pellentesque auctor. Quisque id lectus.<br>
                            <br>
                            Massa, eget eleifend tellus. Proin nec ante leo ssim nunc sit amet velit malesuada pharetra. Nulla neque sapien, sollicitudin non ornare quis, malesuada.
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>