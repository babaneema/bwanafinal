<div class="sidebar-3 sidebar-collection col-lg-3 col-md-4 col-sm-4">

    <!-- category menu -->
    <div class="sidebar-block">
        <div class="title-block">Regions</div>
        <div class="block-content">
            <?php
            foreach ($regionData as $regionDt) {
            ?>
                <div class="cateTitle hasSubCategory open level1">
                    <span class="arrow collapsed collapse-icons" data-toggle="collapse" data-target="#<?= $regionDt['id'] ?>" aria-expanded="false" role="status">
                        <i class="zmdi zmdi-minus"></i>
                        <i class="zmdi zmdi-plus"></i>
                    </span>
                    <a class="cateItem" href="#"><?= $regionDt['region_name'] ?></a>
                    <div class="subCategory collapse" id="<?= $regionDt['id'] ?>" aria-expanded="false" role="status">

                        <?php
                        foreach ($regionDt['districts'] as $distri) {
                        ?>
                            <div class="cateTitle">
                                <a href="serviceProvider.php?dist_id=<?= $distri['id'] ?>" class="cateItem">
                                    <?= $distri['district_name'] ?>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- best seller -->
    <div class="sidebar-block">
        <div class="title-block">
            Best seller
        </div>
        <!-- <div class="product-content tab-content">
            <div class="row">
                <div class="item col-md-12">
                    <div class="product-miniature item-one first-item d-flex">
                        <div class="thumbnail-container border">
                            <a href="product-detail.html">
                                <img class="img-fluid image-cover" src="img/product/1.jpg" alt="img">
                                <img class="img-fluid image-secondary" src="img/product/22.jpg" alt="img">
                            </a>
                        </div>
                        <div class="product-description">
                            <div class="product-groups">
                                <div class="product-title">
                                    <a href="product-detail.html">Nulla et justo augue</a>
                                </div>
                                <div class="rating">
                                    <div class="star-content">
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                    </div>
                                </div>
                                <div class="product-group-price">
                                    <div class="product-price-and-shipping">
                                        <span class="price">£28.08</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item col-md-12">
                    <div class="product-miniature item-one first-item d-flex">
                        <div class="thumbnail-container border">
                            <a href="product-detail.html">
                                <img class="img-fluid image-cover" src="img/product/2.jpg" alt="img">
                                <img class="img-fluid image-secondary" src="img/product/11.jpg" alt="img">
                            </a>
                        </div>
                        <div class="product-description">
                            <div class="product-groups">
                                <div class="product-title">
                                    <a href="product-detail.html">Nulla et justo augue</a>
                                </div>
                                <div class="rating">
                                    <div class="star-content">
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                    </div>
                                </div>
                                <div class="product-group-price">
                                    <div class="product-price-and-shipping">
                                        <span class="price">£31.08</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item col-md-12">
                    <div class="product-miniature item-one first-item d-flex">
                        <div class="thumbnail-container border">
                            <a href="product-detail.html">
                                <img class="img-fluid image-cover" src="img/product/3.jpg" alt="img">
                                <img class="img-fluid image-secondary" src="img/product/14.jpg" alt="img">
                            </a>
                        </div>
                        <div class="product-description">
                            <div class="product-groups">
                                <div class="product-title">
                                    <a href="product-detail.html">Nulla et justo augue</a>
                                </div>
                                <div class="rating">
                                    <div class="star-content">
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                    </div>
                                </div>
                                <div class="product-group-price">
                                    <div class="product-price-and-shipping">
                                        <span class="price">£20.08</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</div>