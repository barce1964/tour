<?php
    include ROOT . '/php/views/layouts/header_admin.php';
?>

<script type="text/javascript">
    $('body').css('overflow', 'hidden');
    $("#adm-nav").css('display', 'none');
</script>

<section class="bg-section">
    <div class="bg-adm">

    </div>

    <form class="feed-form-adm ftco-animate" id="f_mess" action="/login" method="post">
        <table>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="adm_name">Имя пользователя:</label></td><td><input name="name" placeholder="Ник" type="text" class="a-l-text" id="adm_name" value="<?php echo $userName; ?>"></td><td><p id="blink1"><?php echo $errors[0];?></p></td></tr>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="f_phone">Пароль:</label></td><td><input name="passwd" type="password" class="a-l-text" id="f_pwd"></td><td><p id="blink1"><?php echo $errors[1];?></p></td></tr>
            <tr class="f-first-cell-cap">
                <td>
                    <div class="captcha__image-reload">
                        <img class="captcha__image captcha2" src="<?php echo CAPTCHA; ?>" id='captcha-image'>
                    </div>
                </td>
                <td>
                    <button type="button" id="refresh_btn_adm" class="captcha__refresh cap-button captcha2"></button>
                    <input type="text" name="captcha" class="captcha-text captcha2" id="adm_capt" placeholder="Текст с каритинки" value="<?php echo $userCaptcha; ?>">
                    <input type="hidden" id="adm_datePage" name="submit" value="true">
                </td>
                <td><p id="blink1"><?php echo $errors[5];?></p></td>
            </tr>
            <tr><td colspan="2"><div><button id="btn_adm_submit" class="button button_submit f-center-cell" type="submit" name="submit" value="true">Войти</button></div></td></tr>
        </table>
    </form>
</section>

<!-- </section> -->

<?php
    include ROOT . '/php/views/layouts/footer_admin.php';
?>
