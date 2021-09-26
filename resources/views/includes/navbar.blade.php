<nav class="row navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a href="/" class="navbar-brand">
            <h3 class="logo pt-2"><i class="fa fa-paw mr-2"></i>Petsqu</h3>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
        @php
        $order = App\Models\Transaction::where('user_id',Auth::user()->id)->where('status','IN_CART')->first();
        if(!empty($order)){
        $orderDetail = App\Models\TransactionDetail::where('transaction_id',$order->id)->count();
        }
        @endphp
        @endauth

        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-lg-2">
                <li class="nav-item mx-md-2">
                    <a href="/" class="nav-link {{ (request()->is('/'))? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="/product" class="nav-link  {{ (request()->is('product'))? 'active' : '' }}">Product</a>
                </li>
                <li class="nav-item mx-md-2">
                    <div class="dropdown dropdown-user">
                        <a class="btn dropdown-toggle nav-link {{ (request()->is('*/category*'))? 'active' : '' }}"
                            href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/product/category/dog">Dog</a>
                            <a class="dropdown-item" href="/product/category/cat">Cat</a>
                        </div>
                    </div>
                </li>
                @auth
                <li class="nav-item mx-md-2">
                    <a href="/user/cart" class="nav-link {{ (request()->is('*/cart*'))? 'active' : '' }}">
                        <i class="fa fa-shopping-cart cart"><span
                                class="badge badge-danger">{{ (!empty($orderDetail))? $orderDetail : 0 }}</span></i>
                    </a>
                </li>
                <li class="nav-item mx-md-2">
                    <div class="dropdown dropdown-user">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/user/history">History Pesanan</a>
                            <form action="/auth/sign-out" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
                @endauth

                <li class="nav-item mx-md-2">
                    <form method="post" action="/search">
                        @csrf
                        <input class="form-control" type="search" placeholder="Search" name="search">
                    </form>
                </li>
            </ul>

            @guest
            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none">
                <a href="/auth/sign-in" class="btn btn-my my-2 my-sm-0">Login</a>
            </form>
            <!-- Mobile Button -->

            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                <a href="/auth/sign-in" class="btn btn-my btn-navbar-right my-2 my-sm-0 px-4">Login</a>
            </form>
            <!-- Desktop Button -->
            @endguest

        </div>
    </div>
</nav>