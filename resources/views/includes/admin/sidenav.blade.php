<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-3" href="/admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt mr-2"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Product
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/admin/product/create"><i
                                class="fas fa-plus-circle me-2"></i>Create</a>
                        <a class="nav-link" href="/admin/product/dog"><i class="fas fa-bone me-2"></i>Dog Food</a>
                        <a class="nav-link" href="/admin/product/cat"><i class="fas fa-paw me-2"></i>Cat Food</a>
                    </nav>
                </div>
                <a class="nav-link" href="/admin/order">
                    <div class="sb-nav-link-icon"><i class="fas fa-funnel-dollar"></i></div>
                    Order
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>