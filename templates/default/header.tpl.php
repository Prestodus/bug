<?php block("logo") ?>
<div id="logo">

    <figure><img src="<?php show(CFG_PATH) ?>/templates/<?php show(TPL_FOLDER) ?>/images/logo.png" /></figure>
    
</div>
<?php endblock("logo") ?>

<?php block("sitename") ?>
<h1><?php show(CFG_NAME) ?></h1>
<?php endblock("sitename") ?>

<?php block("slogan") ?>
<h4><?php show(CFG_SLOGAN) ?></h4>
<?php endblock("slogan") ?>

<?php block("rightbox") ?>
<div id="rightbox" class="styledbox">

    <h3>Rightbox</h3>
    <p>I am a right-positioned box.<br />
    That's right, I'm right!<br />
    You can hide me, but that would make me a sad box ;-(.
    <?php if(loggedin()) echo "<br /><a href=\"".CFG_PATH."?p=admin/login&action=logout\">Log out</a>"; ?>
    </p>

</div>
<?php endblock("rightbox") ?>