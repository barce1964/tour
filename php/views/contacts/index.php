<?php
    include ROOT . '/php/views/layouts/header.php';
?>

<script type="text/javascript">
    let menu_items = document.getElementsByClassName("nav-item");
    for (var i = 0; i < menu_items.length; i++) {
        if (i == 3) {
            menu_items[i].classList.add('active');
        } else {
            menu_items[i].classList.remove('active');
        }
    }
    $('body').css('overflow', 'hidden');
</script>

<?php
    // include(ROOT . '/php/captcha/classes/CaptchaField.php');
    // $captcha_field = new CaptchaField();
    // $captcha_code = $captcha_field->generate_code();
?>

<div class="contacts ftco-animate">
    <div class="cont ph">
        <span>Тел.: </span><a href="tel:+77771210112" class="phone">+7 777 1210112</a>
    </div>
    <div class="cont em">
        <span>E-mail: </span><a href="info@artour.com" class="email">info@artour.com</a>
    </div>
    <div class="cont whatsapp">
        <span>Whatsapp: </span><span>+7 777 1210112</span>
    </div>
</div>

<div id="container">
    <div class="panel" id="contact-one">
        <?php if ($result): ?>
            <script>
                $('#contact-one').css('position', 'relative');
            </script>
            <div class="panel ftco-animate" id="contact-two">
        
            </div>
        <?php else: ?>
            <div class="cont-form-fon">
                <form class="feed-form ftco-animate" id="f_mess" action="/contacts" method="post">
                    <table>
                        <tr><td class="f-first-cell" align="right"><label class="labels" for="f_name">Имя:</label></td><td><input name="name" required placeholder="Ваше имя" type="text" class="f-text" id="f_name" value="<?php echo $userName; ?>"></td><td><p id="blink1"><?php echo $errors[0];?></p></td></tr>
                        <tr><td class="f-first-cell" align="right"><label class="labels" for="f_phone">Телефон:</label></td><td><input name="phone" required placeholder="Ваш телефон" type="tel" class="f-text" id="f_phone" value="<?php echo $userPhone; ?>"></td><td><p id="blink1"><?php echo $errors[1];?></p></td></tr>
                        <tr><td class="f-first-cell" align="right"><label class="labels" for="f_email">e-mail:</label></td><td><input name="email" required placeholder="Ваш e-mail" type="email" class="f-text" id="f_email" value="<?php echo $userEmail; ?>"></td><td><p id="blink1"><?php echo $errors[2];?></p></td></tr>
                        <tr><td class="f-first-cell" align="right"><label class="labels" for="f_subject">Тема:</label></td><td><input name="subject" required placeholder="Тема" type="text" class="f-text" id="f_subject" value="<?php echo $userSubject; ?>"></td><td><p id="blink1"><?php echo $errors[3];?></p></td></tr>
                        <tr><td class="f-first-cell" align="right"><label class="labels" for="f_mes">Сообщение:</label></td><td><textarea name="mes" placeholder="Ваше сообщение" id="f_mes" rows="3" class="f-text"><?php echo $userText; ?></textarea></td><td><p id="blink1"><?php echo $errors[4];?></p></td></tr>
                        <tr><td class="f-first-cell"><input type="checkbox" class="cell-align-right captcha1" id="f_captcha1" name="notrob"></td><td><label class="labels captcha1" for="f_captcha1" id="cap1">Я не робот</label></label></td><td></td></tr>
                        <tr class="f-first-cell-cap">
                            <td>
                                <div class="captcha__image-reload">
                                    <img class="captcha__image captcha2" src="<?php echo CAPTCHA; ?>" id='captcha-image'>
                                </div>
                            </td>
                            <td>
                                <button type="button" id="refresh_btn" class="captcha__refresh cap-button captcha2"></button>
                                <input type="text" name="captcha" class="captcha-text captcha2" id="capt" placeholder="Текст с каритинки" value="<?php echo $userCaptcha; ?>">
                                <input type="hidden" id="datePage" name="submit" value="true">
                            </td>
                            <td><p id="blink1"><?php echo $errors[5];?></p></td>
                        </tr>
                        <tr><td colspan="2"><div><button id="btn_submit" class="button button_submit f-center-cell" type="submit" name="submit" value="true">Отправить</button></div></td></tr>
                    </table>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <script type="text/javascript">
        const refreshCaptcha = (target) => {
            const captchaImage = document.querySelector('.captcha__image');
            captchaImage.src = "<?php echo CAPTCHA; ?>?r=" + new Date().getUTCMilliseconds();
        }
        const captchaBtn = document.querySelector('.captcha__refresh');
        captchaBtn.addEventListener('click', (e) => refreshCaptcha(e.target));
        <?php if (!$cap1): ?>
            let btn_sb = document.querySelector('#btn_submit');
            btn_sb.setAttribute('disabled', true);
            
            $('.captcha1').css('display', 'none');
            $('.captcha2').css('display', 'none');
        <?php else: ?>
            let not_rob = document.querySelector('#f_captcha1');
            not_rob.setAttribute('checked', true);
            const captchaImage = document.querySelector('.captcha__image');
            captchaImage.src = "<?php echo CAPTCHA; ?>?r=" + new Date().getUTCMilliseconds();
        <?php endif; ?>

        let cap = document.querySelector('#capt');
        function smb_en() {
            if ($('#capt').val().length != 0) {
                btn_sb.removeAttribute('disabled');
            } else {
                btn_sb.setAttribute('disabled', true);
            }
        }
        cap.oninput = smb_en;

        function txt_ctrl() {
            if (($('#f_name').val().length != 0) && ($('#f_phone').val().length != 0) && ($('#f_email').val().length != 0) && ($('#f_subject').val().length != 0) && ($('#f_mes').val().length != 0)) {
                    $('.captcha1').css('display', 'inline');
                } else {
                    $('.captcha1').css('display', 'none');
                }
        }

        let f_txt = $('.f-text');
        for (let i = 0; i < f_txt.length; i++) {
            f_txt[i].oninput = txt_ctrl;
        }

        $('#f_captcha1').click(function() {
            if(this.checked == true) {
                $('.captcha2').css('display', 'inline');
            } else {
                $('.captcha2').css('display', 'none');
            }
        })
    </script>
    
</div>

<?php
    include ROOT . '/php/views/layouts/footer.php';
?>
