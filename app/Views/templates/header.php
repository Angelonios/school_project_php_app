<!DOCTYPE html>
<html lang="cs">
<title>Codespace</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="shortcut icon" type="image/png" href="/codespace_icon.ico"/>
<body class="bg-dark">

<!-- Sidebar (hidden by default) -->
<nav class="container w3-sidebar w3-card w3-top w3-xlarge w3-animate-left bg-white" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3 menu_icon_container"><img class="close_menu_icon" src="/close_icon.ico/"></div>
            <div class="col-9 col-sm-9">Close Menu</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="/code_icon.ico/"></div>
            <div class="col-9 col-sm-9">Browse codes</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="/user_icon.ico/"></div>
            <div class="col-9 col-sm-9">Browse users</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="/category_icon.ico/"></div>
            <div class="col-9 col-sm-9">Submit category</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="/post_icon.ico/"></div>
            <div class="col-9 col-sm-9">Post code</div>
        </div>
    </a>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="/about_icon.ico/"></div>
            <div class="col-9 col-sm-9">About</div>
        </div>
    </a>
</nav>

<div class="container" style="text-align: center">
    <div class="bg-white w3-xlarge row top-menu">
        <div class="col-2 w3-button w3-padding-16" onclick="w3_open()">☰</div>
        <div class="col-6 w3-center"><img class="logo" src="/assets/img/codespace_logo.png" alt="codespace logo"></div>
        <div class="col-4">
            <form class="form-inline my-2 my-lg-3">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

