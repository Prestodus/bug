<!doctype html>
<html>

<head>

    <meta charset="UTF-8" />
    <title><?php show(CFG_TITLE) ?></title>
    <link rel="stylesheet" href="<?php show(CFG_PATH) ?>/style.css" />
    <link rel="stylesheet" href="<?php show(CFG_PATH) ?>/templates/<?php show(TPL_FOLDER) ?>/style.css" />

</head>
<body>
    
    <section id="page_container">
    
        <header id="page_header" class="styledbox" style="position: relative;"><?php show("header") ?></header>
        
        <?php block("menu") ?>
        
        <nav id="page_menu"><?php show("mainmenu") ?></nav>
        <div class="clear"></div>
        
        <?php endblock("menu") ?>
        
        <section id="page_center" class="styledbox">
            
            <section id="center_content">
            
                <!--<article>
                
                    <header class="article_header"><h2>Article 1</h2></header>
                    This is the content of article 1
                    <footer class="article_footer"><small>Created by Ruben Coolen</small></footer>
                
                </article>--!>
                
                <?php show("content") ?>
            
            </section>
        
            <?php block("sidebar") ?>
            
            <!-- This sidebar can be placed on the left, but you'll have to change the border-left property to border-right in style.css --!>                                                
        
            <section id="center_sidebar">
            
                <header>Sidebar</header>
                <nav>
                
                    <ul>
                    
                        <li><a href="#">Sidebar item 1</a></li>
                        <li><a href="#">Sidebar item 2</a></li>
                        <li><a href="#">Sidebar item 3</a></li>
                    
                    </ul>
                
                </nav>
            
            </section>
            
            <?php endblock("sidebar") ?>
        
        </section>
        
        <div class="clear"></div>
        
        <?php block("prefooter") ?>
        
        <section id="page_prefooter" class="styledbox"><?php show("prefooter") ?></section>
        
        <?php endblock("prefooter") ?>
        
        <footer id="page_footer" class="styledbox"><?php show("footer") ?></footer>
    
    </section>

</body>

</html>