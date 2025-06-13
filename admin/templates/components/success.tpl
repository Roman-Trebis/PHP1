<?php
    if ( !empty($_SESSION['success'])):

        foreach ($_SESSION['success'] as $item ):

            if ( count($item) == 1):
            ?>
                <div class="notifications mb-20">
                    <div class="notifications__title notifications__title--success"><?php echo $item['title'];?></div>
                </div>
            <?php
            elseif ( count($item) == 2):
            ?>
                <div class="notifications mb-20 notifications__title--with-message">
					<div class="notifications__title notifications__title--success"><?php echo $item['title']; ?></div>
					<div class="notifications__message">
						<?php echo $item['desc']; ?>
					</div>
				</div>
            <?php
            endif;
        endforeach;

        $_SESSION['success'] = array();
    endif;
?>
