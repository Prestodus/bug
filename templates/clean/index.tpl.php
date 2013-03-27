<!doctype html>
<html>

<head>

    <meta charset="UTF-8" />
    <title><?php show(CFG_TITLE) ?></title>
    <link rel="stylesheet" href="<?php show(CFG_PATH) ?>/templates/<?php show(TPL_FOLDER) ?>/style.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
    <script type="text/javascript" src="<?php show(CFG_PATH) ?>/templates/<?php show(TPL_FOLDER) ?>/javascript/jquery.functions.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php show(CFG_PATH) ?>/templates/<?php show(TPL_FOLDER) ?>/javascript/html5shiv.js"></script>
    <![endif]-->
    <!--[if IE 7]>    <html class="ie7"> <![endif]-->
    <!--[if IE 8]>    <html class="ie8"> <![endif]-->
    <!--[if IE 9]>    <html class="ie9"> <![endif]-->
    <!--[if !IE]>     <html class="">    <![endif]-->

</head>
<body>
    
    <section id="container">
    
        <section id="page_preheader"><?php show("preheader") ?></section>
        
        <section id="page_header"><?php show("header") ?></section>
        
        <section id="page_postheader"></section>
        
        <section id="page_center"><?php show("center") ?></section>
        
        <section id="page_postcenter"></section>
        
        <section id="page_footer"><?php show("footer") ?></section>
    
    </section>

</body>

</html>