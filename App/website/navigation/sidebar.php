<div class="sidebar-3 sidebar-collection col-lg-3 col-md-4 col-sm-4">

    <!-- category menu -->
    <div class="sidebar-block">
        <div class="title-block">Regions</div>
        <div class="block-content">
            <?php
            foreach ($regionData as $regionDt) {
                $uni = uniqid();
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
                                <a href="index.php?dist_id=<?= $distri['id'] ?>" class="cateItem">
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


</div>