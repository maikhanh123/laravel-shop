


    <nav class="classy-navbar" id="essenceNav">
        <!-- Logo -->
        <a class="nav-brand" href="/"><img src="../img/core-img/logo.png" alt=""></a>
        <!-- Navbar Toggler -->
        <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
        </div>
        <!-- Menu -->
        <div class="classy-menu">
            <!-- close btn -->
            <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>
            <!-- Nav Start -->
            <div class="classynav">
                <ul>
                    <li>
                        <a href="/home">Shop</a>
                    </li>
                    <li>
                        <a href="/products">Admin</a>
                    </li>
                    <li>
                        <a href="#">Login</a>
                    </li>
                    <li>
                        <a href="#">Register</a>
                    </li>
                </ul>
            </div>
            <!-- Nav End -->
        </div>
    </nav>


    <!-- Header Meta Data -->
    <div class="header-meta d-flex clearfix justify-content-end">
        <!-- Search Area -->
        <div class="search-area">
            <form action="#" method="post">
                <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <!-- Favourite Area -->
        <div class="favourite-area">
            <a href="#"><img src="../img/core-img/heart.svg" alt=""></a>
        </div>
        <!-- User Login Info -->
        <div class="user-login-info">
            <a href="#"><img src="../img/core-img/user.svg" alt=""></a>
        </div>
        <!-- Cart Area -->
        <div class="cart-area">
            <a href="/cart" id="essenceCartBtn"><img src="../img/core-img/bag.svg" alt=""> <span>{{Cart::count()}}</span></a>
        </div>
    </div>