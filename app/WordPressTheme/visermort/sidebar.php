<aside class="sidebar">
<!--    <ul class="nav">-->
<!--        <li class="nav-item ">-->
<!--            <a href="index.html" class="menu-item-link about-link"> Обо мне</a>-->
<!--        </li>-->
<!--        <li class="nav-item ">-->
<!--            <a href="portfolio.html" class="menu-item-link portfolio-link">Мои работы</a>-->
<!--        </li>-->
<!--        <li class="nav-item ">-->
<!--            <a href="contact.html" class="menu-item-link contact-link">Обратная связь</a>-->
<!--        </li>-->
<!--    </ul>-->
    <?php
    wp_nav_menu ( array (
        "container_class" => "nav",
        "theme_location" => "primary",
        "after" => ''
        ));
    ?>

    <?php   $phone = get_post_meta( '16','phone', true );
            $skype = get_post_meta( 16 , 'skype' , true );
            $mail = get_post_meta( 16, 'mail', true );
    ?>

    <div class="contacts-block">
        <h1 class="block-header">Контакты</h1>
        <ul class="contacts">
            <li class="contacts-item" >
                <a href="mailto:oxygenn@list.ru" class="contact-item-link email"><?php echo $mail ?></a>
            </li>
            <li class="contacts-item ">
                <a href="tel:+79114135031" class="contact-item-link phone"><?php echo $phone ?></a>
            </li>
            <li class="contacts-item ">
                <a href="skype:visermort" class="contact-item-link skype"><?php echo $skype ?></a>
            </li>
        </ul>
    </div>
</aside>