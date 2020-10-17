<?php
include './config.php';
if (isset($_POST['action'])) {
    $choice = $_POST['action'];

     // Category Filter With Ajax 

    if ($choice == "category") {
        $cat_id = $_POST['id'];
        $showRecordPerPage = 10;
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $currentPage = $_GET['filter'];
        } else {
            $currentPage = 1;
        }
        $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
        $query = "SELECT * FROM products WHERE category_id='$cat_id' LIMIT $startFrom, $showRecordPerPage";
        $result = mysqli_query($conn, $query);
        $totalProduct = mysqli_num_rows($result);
        $lastPage = ceil($totalProduct / $showRecordPerPage);
        $firstPage = 1;
        $nextPage = $currentPage + 1;
        $previousPage = $currentPage - 1;
        if (mysqli_num_rows($result) > 0) {
            $output = '<div class="aa-product-catg-body">
                                <ul class="aa-product-catg">';
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_name = $row['name'];
                $product_image = $row['image'];
                $product_price = $row['price'];
                $product_desc = $row['short_desc'];
                $output .= '<!-- start single product item -->
                                <li>
                                <figure>
                                <a class="aa-product-img" href="#"><img src="./admin/productImages/' . $product_image . '" alt="<?php echo $product_image ?>" width="225px" height="225px"></a>
                                <a class="aa-add-card-btn" href="cart.php?id=' . $product_id . '"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                <figcaption>
                                <h4 class="aa-product-title"><a href="#">' . $product_name . ' </a></h4>
                                <span class="aa-product-price">$ ' . $product_price . '</span><span class="aa-product-price"><del>$65.50</del></span>
                                <p class="aa-product-descrip">' . $product_desc . '</p>
                                </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                </div>
                                <span class="aa-badge aa-sale" href="#">SALE!</span>

                                <!-- product badge -->

                                </li>';

            }

            echo $output;
        } else {
            echo "<h2>Product Not Found In This Category</h2>";
        } 

        // Tag Filter With Ajax 

    } else if ($choice == "tag") {
        $tag_id = $_POST['id'];
        $query = "SELECT * FROM products_tags";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $output = "";
            $output = '<div class="aa-product-catg-body">
            <ul class="aa-product-catg">';
            while ($row = mysqli_fetch_assoc($result)) {

                $tags = json_decode($row['tag_id']);
                $pro_id = $row['product_id'];
                foreach ($tags as $tag) {
                    if ($tag == $tag_id) {
                        $query1 = "select *from products where product_id='$pro_id'";
                        $result1 = mysqli_query($conn, $query1);
                        while ($data = mysqli_fetch_assoc($result1)) {
                            $product_id = $data['product_id'];
                            $product_name = $data['name'];
                            $product_image = $data['image'];
                            $product_price = $data['price'];
                            $product_desc = $data['short_desc'];
                            $output .= '<!-- start single product item -->
                                <li>
                                <figure>
                                <a class="aa-product-img" href="#"><img src="./admin/productImages/' . $product_image . '" alt="<?php echo $product_image ?>" width="225px" height="225px"></a>
                                <a class="aa-add-card-btn" href="cart.php?id=' . $product_id . '"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                <figcaption>
                                <h4 class="aa-product-title"><a href="#">' . $product_name . ' </a></h4>
                                <span class="aa-product-price">$ ' . $product_price . '</span><span class="aa-product-price"><del>$65.50</del></span>
                                <p class="aa-product-descrip">' . $product_desc . '</p>
                                </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                </div>
                                <span class="aa-badge aa-sale" href="#">SALE!</span>

                                <!-- product badge -->

                                </li>';

                        }

                    }
                }
            }
            echo $output;

        } else {
            echo "<h2>Product Not Found With This Tag</h2>";
        }

        // Price  Filter With Minimum and Maximum Range Ajax 

    } else if ($choice == "price") {
        $min = ceil($_POST['minimum_price']);
        $max = ceil($_POST['maximum_price']);
        $query = "SELECT * FROM products WHERE price BETWEEN '" . $min . "' AND '" . $max . "'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $output = '<div class="aa-product-catg-body">
            <ul class="aa-product-catg">';
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_name = $row['name'];
                $product_image = $row['image'];
                $product_price = $row['price'];
                $product_desc = $row['short_desc'];
                $output .= '<!-- start single product item -->
                    <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="./admin/productImages/' . $product_image . '" alt="<?php echo $product_image ?>" width="225px" height="225px"></a>
                    <a class="aa-add-card-btn" href="cart.php?id=' . $product_id . '"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                    <h4 class="aa-product-title"><a href="#">' . $product_name . ' </a></h4>
                    <span class="aa-product-price">$ ' . $product_price . '</span><span class="aa-product-price"><del>$65.50</del></span>
                    <p class="aa-product-descrip">' . $product_desc . '</p>
                    </figcaption>
                    </figure>
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <span class="aa-badge aa-sale" href="#">SALE!</span>

                    <!-- product badge -->

                    </li>';

            }

            echo $output;

        } else {
            echo $min, $max;
            echo "<h2>Product Not Found With This Price Range</h2>";
        }

        // Color Filter With Ajax 

    } else if ($choice == "color") {
        $color = $_POST['color_code'];
        $query = "SELECT * FROM colors WHERE color='$color' ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $output = '<div class="aa-product-catg-body">
            <ul class="aa-product-catg">';
            while ($col = mysqli_fetch_assoc($result)) {
                $pro_id = $col['product_id'];
                $query1 = "SELECT *FROM products where product_id='$pro_id'";
                $result1 = mysqli_query($conn, $query1);
                while ($row = mysqli_fetch_assoc($result1)) {
                    $product_id = $row['product_id'];
                    $product_name = $row['name'];
                    $product_image = $row['image'];
                    $product_price = $row['price'];
                    $product_desc = $row['short_desc'];
                    $output .= '<!-- start single product item -->
                        <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="./admin/productImages/' . $product_image . '" alt="<?php echo $product_image ?>" width="225px" height="225px"></a>
                        <a class="aa-add-card-btn" href="cart.php?id=' . $product_id . '"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">' . $product_name . ' </a></h4>
                        <span class="aa-product-price">$ ' . $product_price . '</span><span class="aa-product-price"><del>$65.50</del></span>
                        <p class="aa-product-descrip">' . $product_desc . '</p>
                        </figcaption>
                        </figure>
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <span class="aa-badge aa-sale" href="#">SALE!</span>

                        <!-- product badge -->

                        </li>';

                }

            }
            echo $output;

        } else {
            echo "<h2>Product Not Found With This Color</h2>";
        }

    } else {

    }
}
