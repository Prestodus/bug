<section class="content">
    
    <div class="text">
    
        <?php block("slogan") ?>
        <h2><?php show(CFG_SLOGAN) ?></h2>
        <?php endblock("slogan") ?>
        <?php textblock("headertext") ?>
    
    </div>
    
    <?php block("logo") ?>
    <div class="logo">
    
        <img src="<?php show(CFG_PATH) ?>templates/<?php show(TPL_FOLDER) ?>/images/logo.png" />
    
    </div>
    <?php endblock("logo") ?>

</section>