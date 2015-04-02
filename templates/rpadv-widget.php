<?php if (RPAdv()->getAdverts()) : ?>
    <div class="main-visual-adverts" >
        <?php echo RPAdv()->getTemplate('rpadv-widget-list', $params); ?>
    </div>
<?php endif;
