<div class="pagination">
    <div class="js-product-list-top ">
        <div class="d-flex justify-content-around row">
            <div class="showing col col-xs-12">
                <span>SHOWING 12 OF <?= $countData ?> ITEM(S)</span>
            </div>
            <div class="page-list col col-xs-12">
                <ul>
                    <?php
                    for ($i = 0; $i < $pages; $i++) {
                    ?>
                        <!-- <li>
                            <a rel="prev" href="#" class="previous disabled js-search-link">
                                Previous
                            </a>
                        </li>

                        <li>
                            <a rel="next" href="#" class="next disabled js-search-link">
                                Next
                            </a>
                        </li> -->

                        <li class="current">
                            <a rel="nofollow" href="serviceProvider.php?page=<?= $i ?>" class=" js-search-link">
                                <?= $i + 1 ?>
                            </a>
                        </li>
                    <?php
                        $i - 1;
                    }
                    ?>


                    <!-- <li>
                        <a rel="nofollow" href="#" class="disabled js-search-link">
                            2
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" href="#" class="disabled js-search-link">
                            3
                        </a>
                    </li> -->


                </ul>
            </div>
        </div>
    </div>
</div>