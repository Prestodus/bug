<section class="content">

    <?php show("content") ?>

</section>

<?php block("sidebar") ?>
<section class="sidebar">

	<header>Sidebar</header>
    <nav>
                
        <ul>
                    
            <?php menuitem("login") ?>
            <?php menuitem("lorem ipsum", "pages/lorem") ?>
            <li><a href="#">Sidebar item 1</a></li>
            <li><a href="#">Sidebar item 2</a></li>
            <li><a href="#">Sidebar item 3</a></li>
                    
        </ul>
                
    </nav>

</section>
<?php endblock("sidebar") ?>

<div class="clear"></div>

<?php block("prefooter_blocks") ?>

<section id="prefooter">

<?php block("prefooter_block1") ?>
<div class="block">

    <header>Block 1</header>
    Have you seen my prefooter blocks of awesomeness?

</div>
<?php endblock("prefooter_block1") ?>

<?php block("prefooter_block2") ?>
<div class="block">

    <header>Block 2</header>
    You can have up to three of these!

</div>
<?php endblock("prefooter_block2") ?>

<?php block("prefooter_block3") ?>
<div class="block">

    <header>Block 3</header>
    They can have any text you want.

</div>
<?php endblock("prefooter_block3") ?>

<div class="clear"></div>

</section>

<?php endblock("prefooter_blocks") ?>