<!DOCTYPE html>
<html lang="cs">
<title>Codespace</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/timeline.min.css">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/codespace_icon.ico"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/lib/codemirror.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/theme/dracula.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/lib/codemirror.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/mode/clike/clike.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/timeline.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<body class="bg-dark">

<!-- Sidebar (hidden by default) -->
<nav class="container w3-sidebar w3-card w3-top w3-xlarge w3-animate-left bg-white" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-12 col-sm-12 text-center">Close Menu</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="<?php echo base_url(); ?>/assets/img/code_icon.ico/"></div>
            <div class="col-9 col-sm-9">Code posts timeline</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="<?php echo base_url(); ?>/assets/img/user_icon.ico/"></div>
            <div class="col-9 col-sm-9">Browse users</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="<?php echo base_url(); ?>/assets/img/user_icon.ico/"></div>
            <div class="col-9 col-sm-9">Browse users</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="<?php echo base_url(); ?>/assets/img/category_icon.ico/"></div>
            <div class="col-9 col-sm-9">Submit category</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="<?php echo base_url(); ?>/assets/img/post_icon.ico/"></div>
            <div class="col-9 col-sm-9">Post code</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="<?php echo base_url(); ?>/about_icon.ico/"></div>
            <div class="col-9 col-sm-9">About</div>
        </div>
    </a>
</nav>

<div class="bg-white container top_menu">
    <div class="w3-xlarge row">
        <div class="col-2 col-sm-2 w3-button w3-padding-16 menu_button" onclick="w3_open()">☰</div>
        <div class="col-8 col-sm-8 w3-center"><img class="logo" src="<?php echo base_url(); ?>/assets/img/codespace_logo.png" alt="codespace logo"></div>
        <div class="col-2 col-sm-2 w3-button w3-padding-16 menu_button" >  </div>
    </div>
    <div class="row bs-popover-right bg-white">
        <div class="col-2 col-sm-2 w3-button w3-padding-16 menu_button" onclick="w3_open()">☰</div>
        <div class="col-8 col-sm-8 w3-center"><img class="logo" src="<?php echo base_url(); ?>/assets/img/codespace_logo.png" alt="codespace logo"></div>
        <div class="col-2 col-sm-2 w3-button w3-padding-16 menu_button" >  </div>
    </div>
</div>

