<?php if ( $pagination['page_number'] != $pagination['number_of_pages']  ) : ?>
    <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?php echo $pagination['page_number'] + 1; ?>">вперед</a>
    </div>
    <?endif;?>
    