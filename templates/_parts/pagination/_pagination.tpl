<div class="section-pagination">
    <?php
        include ROOT . "templates/_parts/pagination/_button-prev.tpl";

        if ($pagination['number_of_pages'] > 6){
            include ROOT . "templates/_parts/pagination/_pages-more-then-6.tpl";
        } else {
            include ROOT . "templates/_parts/pagination/_page-loop.tpl";
        }

        include ROOT . "templates/_parts/pagination/_button-next.tpl";
    ?>
</div>
