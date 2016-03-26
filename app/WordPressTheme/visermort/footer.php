<div class="contacts-block-bootom">
    <ul class="contacts-block-bootom__list">
        <li class="contacts-item bottom" >
            <a href="mailto:oxygenn@list.ru" class="contact-item-link bottom email">oxygenn@list.ru</a>
        </li>
        <li class="contacts-item bottom ">
            <a href="tel:+79114135031" class="contact-item-link  bottom phone">+79114135031</a>
        </li>
        <li class="contacts-item bottom ">
            <a href="skype:visermort" class="contact-item-link  bottom skype">visermort</a>
        </li>
    </ul>
</div>
<ul class="socials-bottom ">
    <li class="social-item">
        <a href="https://www.facebook.com/ViserMort?ref=bookmarks" class="social-item-link sprite facebook">
            facebook
        </a>
    </li>
    <li class="social-item">
        <a href="http://vk.com/id1519895" class="social-item-link sprite vk">
            vkontakte
        </a>
    </li>
    <li class="social-item">
        <a href="https://twitter.com/ViserMort" class="social-item-link sprite twitter">
            twitter
        </a>
    </li>
    <li class="social-item">
        <a href="https://github.com/visermort" class="social-item-link sprite github">
            github
        </a>
    </li>
</ul>


</div>
</div>

<div class="empty">
</div>
</div>
<footer class="footer">
    <div class="footer-content">
        <div class="login login-area sprite <?php if (is_user_logged_in ()) echo(' logged ') ?>">
            <?php wp_loginout(get_home_url())  ?>
        </div>
<!--         <div class="login login-area sprite"> <a href="#" class="login-area login-text ">вход</a>-->
<!--        </div>-->

        <div class="footer-text">   &copy; 2016. Это мой сайт. Пожалуйста, не копируйте и не воруйте его.
        </div>
     </div>
</footer>
<div class="popup ">
    <div class="popup__inner">
        <p class="popup__text">Сообщение успешно отправлено</p>
    </div>
</div>



<!--	<script src="js/vendor.js"></script>-->
<!--	<script src="js/main.js"></script>-->
<?php wp_footer() ?>
</body>
</html>