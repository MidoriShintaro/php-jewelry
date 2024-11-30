<div id="mobile-menu">
    <div class="mm-search">
        <form name="search">
            <div class="input-group">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="icon-search"></i></button>
                </div>
                <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
            </div>
        </form>
    </div>
    <ul>
        <li> </li>
        <li>
            <div class="home"><a href="index.php"><i class="icon-home"></i>Home</a> </div>
        </li>
        <li><a href="#">Pages</a>
            <ul>
                <li> <a href="index.php?cart">Shopping Cart</a></li>
                <li><a href="index.php?checkout">Checkout</a></li>
                <li> <a href="index.php?dashboard">Dashboard</a></li>
                <li> <a href="index.php?about">About us</a></li>
                <li> <a href="?blog">Blog</a></li>
                <li><a href="process.php">Login</a></li>
                <li><a href="index.php?faq">FAQ</a></li>
                <li><a href="index.php?contact">Contact us</a></li>
            </ul>
        </li>
        <?php
        $category = mysqli_query($con, "SELECT * FROM tbl_category");

        while ($row = mysqli_fetch_array($category)) {
        ?>
            <li class="mega-menu"><a href="index.php?quanly=grid&danhmuc=<?php echo $row['category_id'] ?>" class="level-top"><?php echo $row['category_name'] ?></a></li>
            </li>
        <?php
        }
        ?>
    </ul>
</div>