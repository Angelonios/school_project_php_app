<!DOCTYPE html>
<html lang="cs">
<title>Codespace</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/codespace_icon.ico"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/timeline.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/lib/codemirror.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/theme/dracula.css">
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/lib/codemirror.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/codemirror-5.54.0/mode/clike/clike.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/timeline.min.js"></script>
<script type="text/javascript"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<body class="bg-dark">
<!-- Sidebar (hidden by default) -->
<nav class="container w3-sidebar w3-card w3-top w3-xlarge w3-animate-left bg-white" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-12 col-sm-12 text-center">Close Menu</div>
        </div>
    </a>
    <a href="<?php echo base_url(); ?>/timeline" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3">
                <img class="menu_icon" src="<?php echo base_url(); ?>/assets/img/home.png/">
            </div>
            <div class="col-9 col-sm-9">Code posts</div>
        </div>
    </a>
    <?php if (session()->get('isLoggedIn'))
    {
        echo (session()->get('type') !== 'admin') ?
        '<a href="'.base_url().'/timeline/users" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-3 col-sm-3"><img class="menu_icon" src="' . base_url() . '/assets/img/users.png/"></div>
                <div class="col-9 col-sm-9">Users: TODO</div>
            </div>
        </a>
        <a href="'.base_url().'/timeline/categories" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-3 col-sm-3"><img class="menu_icon" src="' . base_url() . '/assets/img/tag.png/"></div>
                <div class="col-9 col-sm-9">Categories: TODO</div>
            </div>
        </a>
        <a href="" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-3 col-sm-3"><img class="menu_icon" src="' . base_url() . '/assets/img/idea.png/"></div>
                <div class="col-9 col-sm-9">Submit category: TODO</div>
            </div>
        </a>
        <a href="'.base_url().'/users/profile/username" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-3 col-sm-3"><img class="menu_icon" src="' . base_url() . '/assets/img/user.png/"></div>
                <div class="col-9 col-sm-9">My profile: TODO</div>
            </div>
        </a>
        <a href="'.base_url().'/users/settings" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-3 col-sm-3"><img class="menu_icon" src="' . base_url() . '/assets/img/settings.png/"></div>
                <div class="col-9 col-sm-9">Profile settings: TODO</div>
            </div>
        </a>
        <a href="'.base_url().'/users/logout" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-3 col-sm-3"><img class="menu_icon" src="' . base_url() . '/assets/img/logout.png/"></div>
                <div class="col-9 col-sm-9">Logout</div>
            </div>
        </a>' :
        '<a href="'.base_url().'/admin/del_user" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-12 col-sm-12">Delete user</div>
            </div>
        </a>
        <a href="'.base_url().'/admin/del_post/" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-12 col-sm-12">Delete post</div>
            </div>
        </a>
        <a href="'.base_url().'/admin/del_category" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-12 col-sm-12">Delete category</div>
            </div>
        </a>
        <a href="'.base_url().'/admin/create_category" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-12 col-sm-12">Create category</div>
            </div>
        </a>';
    }
    else
    {
        echo
        '<a href="'.base_url().'/users/login" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-3 col-sm-3"><img class="menu_icon" src="' . base_url() . '/assets/img/login.png/"></div>
                <div class="col-9 col-sm-9">Login</div>
            </div>
        </a>
        <a href="'.base_url().'/users/register" onclick="w3_close()" class="nav-link menu_link">
            <div class="row menu_row">
                <div class="col-3 col-sm-3"><img class="menu_icon" src="' . base_url() . '/assets/img/add.png/"></div>
                <div class="col-9 col-sm-9">Register</div>
            </div>
        </a>';
    }
    ?>
    <a href="" onclick="w3_close()" class="nav-link menu_link">
        <div class="row menu_row">
            <div class="col-3 col-sm-3"><img class="menu_icon" src="<?php echo base_url(); ?>/assets/img/info.png/"></div>
            <div class="col-9 col-sm-9">About</div>
        </div>
    </a>
</nav>

<div class="container">
    <div class="bg-white w3-xlarge row top_menu">
        <div class="col-2 col-sm-2 w3-button w3-padding-16 menu_button" onclick="w3_open()">☰</div>
        <div class="col-8 col-sm-8 w3-center"><img class="logo"
                                                   src="<?php echo base_url(); ?>/assets/img/codespace_logo.png"
                                                   alt="codespace logo"></div>
        <div class="col-2 col-sm-2 w3-padding-16"></div>
    </div>
    <div class="w3-xlarge row sub_top_menu no-gutters">
        <div class="col-lg-4"></div>
        <div class="col-md-auto col-lg-4">
            <a href="<?php echo base_url(); ?>/timeline/code_post" class="btn btn-light w-100 mt-1 mb-1 font-weight-bold">Create post</a>
        </div>
        <div class="col-md-auto mr-lg-1 ml-lg-2">
            <select class="btn btn-dark w-100 p-1 ">
                <option value="">Date</option>
                <option value="latest">Latest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>
        <div class="col-md-auto mr-lg-1">
            <select class="btn btn-dark w-100 p-1">
                <option value="">Rating</option>
                <option value="best">Best</option>
                <option value="worst">Worst</option>
            </select>
        </div>
        <div class="col-md-auto">
            <select class="btn btn-dark w-100 p-1">
                <option value="">Category</option>
                <?php
                $category = "Advent of Code 200";
                $keyword = "AoC200";
                for($i = 0; $i < 5; $i++)
                {
                    echo '<option value="'.$keyword.$i.'">'.$category.$i.'</option>';
                }
                ?>
            </select>
        </div>
    </div>
</div>

