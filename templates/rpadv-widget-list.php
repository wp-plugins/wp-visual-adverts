<?php if (RPAdv()->getAdverts()) : ?>
        <div class="visual-adverts add"<?php echo ($params == 'isAjax') ? ' style="display: none;"' : ''; ?>>
            <?php
                foreach(RPAdv()->getAdverts() as $advert):
                    echo RPAdv()->getTemplate('rpadv-widget-item', $advert);
                endforeach;
            ?>
        </div>
<?php endif;
