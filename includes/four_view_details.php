<div class="row px-1">
    <div class="col-md-10">
        <!-- Products -->
        <div class="row mt-3 m-auto">
            <?php
            // calling function
            view_details();
            get_unique_categories();
            get_unique_brands();
            ?>

            <!-- row end -->
        </div>
        <!-- col end -->
    </div>
    <div class="col-md-2 bg-secondary p-0">
        <!-- sideNav -->
        <!-- brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light">
                    <h4>Delivery Brands</h4>
                </a>
            </li>
            <?php
            getbrands();
            ?>

        </ul>
        <!-- categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light">
                    <h4>Categories</h4>
                </a>
            </li>
            <?php
            getcategories();
            ?>
        </ul>
    </div>
</div>