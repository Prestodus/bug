<section class="content">
    
    <div class="sitename">
    
        <?php block("sitename") ?>
        <a href="./"><?php show(CFG_NAME) ?></a>
        <?php endblock("sitename") ?>
    
    </div>
    
    <div class="topmenu">
    
        <ul>
    
            <?php menuitem("home") ?>
            <?php menuitem("login") ?>
            <?php menuitem("contact") ?>
            <?php menuitem("lorem ipsum", "pages/lorem") ?>
        
        </ul>
    
    </div>

</section>