<?php get_header(); ?>


    <?php get_sidebar();  ?>

    <div class="content-area">

        <?php   $name = get_post_meta( $post->ID, 'myname', true );
        $age = get_post_meta( $post->ID , 'myage', true);
        $sity = get_post_meta( $post->ID, 'sity', true );
        $prof = get_post_meta( $post->ID , 'profession', true);
        $img = get_the_post_thumbnail( $post->ID , array(138,138),'' );
        $scills = split(';',strtoupper (get_post_meta( $post->ID , 'scills', true)));
        $havePosts = have_posts();
        ?>

    <section class="content-part info">
            <h1 class="content-header">Основная информация</h1>
            <div class="content-content content_about">
                <div class="info-photo">
                    <div class="box-photo">
                        <?php echo $img ?>
                    </div>
                </div>
                <div class="info-text">
                    <ul class="main-info">

                        <li class="main-info-item">Меня зовут:<span class="item-right"> <?php echo $name ?></span></li>
                        <li class="main-info-item">Мой возраст:<span class="item-right"> <?php echo $age ?></span></li>
                        <li class="main-info-item">Мой город:<span class="item-right"> <?php echo $sity ?></span></li>
                        <li class="main-info-item">Моя специализация:<span class="item-right"> <?php echo $prof ?></span></li>
                        <li class="main-info-item">Ключевые навыки:
                            <ul class="skills-list">
                                <?php  foreach($scills as $key => $value) {
                                    echo ('<li class="skills">'.$value.' </li>');
                                }  ?>

                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </section>

        <section class="content-part content-portfolio">
            <h1 class="content-header">Опыт работы</h1>
            <div class="content-content content-notmain">
                <ul class="content-items ">

                    <?php
                    $args = array(
                        'cat' => 10,
                        'orderby' => 'ID',
                        'order'   => 'DESC',
                    );
                    $post_counter = 0;
                    $wp_query = new WP_Query( $args );
                    $post_count = $wp_query->post_count;
                    while ($wp_query->have_posts()) { $wp_query->the_post();

                        $dates = get_post_meta( $post->ID , 'dates', true);
                        $job = get_post_meta( $post->ID , 'job', true);
                        $class = get_post_meta( $post->ID , 'class', true);

                        $post_counter++;
                        if ( $post_counter == $post_count ) {
                            $class .= ' last';
                        }

                        ?>

                    <li class="content-item">
                        <ul class="content-strins  <?php echo $class  ?>">
                            <li class="content-string ">
                                <?php echo $job  ?>
                            </li>
                            <li class="content-string">
                                <?php echo $dates ?>
                            </li>
                        </ul>
                    </li>

                    <?php }  ?>

                </ul>

            </div>
        </section>

        <section class="content-part ">
            <h1 class="content-header">Образование</h1>
            <div class="content-content content-notmain">
                <ul class="content-items study-items">

                    <?php
                    $args = array(
                        'cat' => 11,
                        'orderby' => 'ID',
                        'order'   => 'DESC',
                    );
                    $post_counter = 0;
                    $wp_query = new WP_Query( $args );
                    $post_count = $wp_query->post_count;
                    while ($wp_query->have_posts()) { $wp_query->the_post();

                        $dates = get_post_meta( $post->ID , 'dates', true);
                        $school = get_post_meta( $post->ID , 'school', true);
                        $class = get_post_meta( $post->ID , 'class', true);

                        $post_counter++;
                        if ( $post_counter == $post_count ) {
                            $class .= ' last';
                        }

                    ?>

                    <li class="content-item ">
                        <ul class="content-strins <?php echo $class  ?>">
                            <li class="content-string">
                                <?php echo $school ?>
                            </li>
                            <li class="content-string">
                                <?php echo $dates ?>
                            </li>
                        </ul>
                    </li>

                    <?php }  ?>


                </ul>
            </div>
        </section>



<?php get_footer()  ?>