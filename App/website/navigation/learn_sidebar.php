<div class="sidebar-3 sidebar-collection col-lg-3 col-md-4 col-sm-4">

    <!-- category menu -->
    <div class="sidebar-block">
        <div class="title-block">Subjects</div>
        <div class="block-content">
            <?php
            $n = 10;
            foreach ($cropedData as $learnDt) {
                $n++;
            ?>
                <div class="cateTitle hasSubCategory open level1">
                    <span class="arrow collapsed collapse-icons" data-toggle="collapse" data-target="#<?= $n ?>" aria-expanded="false" role="status">
                        <i class="zmdi zmdi-minus"></i>
                        <i class="zmdi zmdi-plus"></i>
                    </span>
                    <a class="cateItem" href="#"><?= $learnDt['type'] ?></a>
                    <div class="subCategory collapse" id="<?= $n ?>" aria-expanded="false" role="status">

                        <?php
                        foreach ($learnDt['crops'] as $sub) {
                        ?>
                            <div class="cateTitle">
                                <a href="learn.php?crop_id=<?= $sub['id'] ?>" class="cateItem">
                                    <?= $sub['name'] ?>
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