<section class="content">
    
    <div class="sitename">
    
        <?php block("sitename") ?>
        <a href="./"><?php show(CFG_NAME) ?></a>
        <?php endblock("sitename") ?>
    
    </div>
    
    <div class="topmenu">
    
        <ul>
    
            <?php menuitem("home") ?>
            <?php menuitem("How it's made", "pages/website") ?>
            <?php menuitem("contact") ?>
        
        </ul>
    
    </div>

</section>