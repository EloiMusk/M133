<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/controller/productFunc.php';
?>
<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>0699966996</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="/index.php">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">Bricks</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4 navbar">
                <!-- Cart -->
                <div class="dropdown-slide">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-android-cart"></i>Cart</a>
                    <div class="dropdown-menu cart-dropdown">
                        <?php

                        $_SESSION['total'] = 0;
                        if (isset($_SESSION['cart'])) {
                            $cart = $_SESSION['cart'];
                            foreach ($cart as $key => $item) {
                                $product = getProduct($key);

                                ?>
                                Cart Item
                                <div class="media" id="'<?php echo 'cart-item-' . $product['id'] ?>">
                                    <a class="pull-left" href="/product-single.php?id=<?php echo $product['id'] ?>">
                                        <img class="media-object"
                                             src="/images/productImage/<?php echo $product['image'] ?>"
                                             alt="image"/>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#!"><?php echo $product['name'] ?></a></h4>
                                        <div class="cart-price">
                                            <span><?php echo $item['quantity'] ?> x</span>
                                            <span><?php echo number_format($product['price'], 2, '.', '\''); ?></span>
                                        </div>
                                        <h4>
                                            $<?php echo number_format($item['quantity'] * $product['price'], 2, '.', '\'');;
                                            $_SESSION['total'] += $item['quantity'] * $product['price'] ?>
                                        </h4>
                                    </div>
                                    <a onclick="removeFromCart( <?php echo $product['id']; ?>)" class="remove"><i
                                                class="tf-ion-close"></i></a>
                                </div>
                                <!--                     / Cart Item -->
                            <?php }
                        } ?>

                        <div class="cart-summary">
                            <span>Total</span>
                            <span class="total-price">$<?php echo number_format($_SESSION['total'], 2, '.', '\''); ?></span>
                        </div>
                        <ul class="text-center cart-buttons">
                            <li><a href="cart.php" class="btn btn-small">View Cart</a></li>
                            <li><a href="checkout.php" class="btn btn-small btn-solid-border">Checkout</a></li>
                        </ul>
                    </div>

                </div><!-- / Cart -->

                <!-- Search -->
                <div class="dropdown-slide search">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-ios-search-strong"></i> Search</a>
                    <ul class="dropdown-menu search-dropdown">
                        <li>
                            <form action="post"><input type="search" class="form-control" placeholder="Search...">
                            </form>
                        </li>
                    </ul>
                </div><!-- / Search -->
                <!--        logout button -->
                <?php
                if (isset($_SESSION['user']['id'])) {
                    echo '<div class="dropdown-slide">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-ios-person"></i> ' . $_SESSION['user']['username'] . ' </a>
                    <ul class="dropdown-menu user-dropdown">
                        <li><a href="/adress-management.php">Adress</a></li>
                        <li><a href="/index.php?logout=1">Logout</a></li>
                    </ul>
                </div>';
                } else {
                    echo '<a href="/login.php" class="btn btn-small btn-solid-border">Login</a>';
                }
                ?>
                <!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section>
<!-- End Top Header Bar -->

<section class="menu">
    <nav class="navbar navigation navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <h2 class="menu-title">Main Menu</h2>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- / .navbar-header -->
            <div id="navbar" class="navbar-collapse  text-center ">
                <ul class="navbar-nav mb-2 mb-lg-0 p-lg-3">
                    <!-- Home -->
                    <li class="dropdown nav-item">
                        <a href="index.php">Home</a>
                    </li><!-- / Home -->

                    <!-- Shop -->
                    <li class="dropdown nav-item">
                        <a href="shop.php">Shop</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
                        echo '<li class="dropdown nav-item">
                        <a href="manage-products.php">Manage Products</a>
                    </li>';
                    }
                    ?>
                </ul><!-- / .nav .navbar-nav -->

            </div>
        </div>
    </nav>
    <!-- Navbar Links -->
    <!--/.navbar-collapse -->
    <!-- / .container -->
</section>

<!-- Main Menu Section -->

