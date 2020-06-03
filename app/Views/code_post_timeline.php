<main>
    <header>

    </header>
    <section class="page-section">
        <div class="timeline timeline_display">
            <div class="timeline__wrap">
                <div class="timeline__items">
                    <?php
                    $var_likes = "6 likes";
                    $var_comments = "10 comments";
                    $var_desc = "mycode";
                    $var_category = "noob";
                    for($i = 0; $i < 5; $i++)
                    {
                    echo
                    '<div class="timeline__item">
                        <div class="timeline__content container no-gutters border">
                            <!--<div class="container border">-->
                                <div class="row border">
                                    <div class="col-2 col-sm-2 border">
                                        <div class="left_post_part container border">
                                            <div class="row border">
                                                <div class="rating_number col-12 col-sm-12">'.$var_likes.'</div>
                                            </div>
                                            <div class="commnet_number row">
                                                <div class="commnet_number col-12 col-sm-12">'.$var_comments.'</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-10 col-sm-10">
                                        <div class="right_post_part container">
                                            <div class="row">
                                                <div class="post_description col-12 col-sm-12">'.$var_desc.'</div>
                                            </div>
                                            <div class="row">
                                                <div class="post_category col-12 col-sm-12">'.$var_category.'</div>
                                            </div>
                                            <div class="row">
                                                <div class="post_datetime col-6 col-sm-6">today</div>
                                                <div class="post_author col-6 col-sm-6">me</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!--</div> -->
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $('.timeline').timeline({
        verticalStartPosition: 'left',
        verticalTrigger: '5px'
    });
</script>