<?php
    include ROOT . '/php/views/layouts/header_admin.php';
?>

<script>
    $('body').css('overflow', 'hidden');
</script>

<section class="bg-section">
    
    <form class="feed-form-adm ftco-animate" id="f_mess" action="create" method="post">
        <table>
            <?php
                include_once ROOT . '/php/models/Location.php';

                $countriesList = Location::getCountriesList();
            ?>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="adm_name">Имя пользователя:</label></td><td><input name="name" placeholder="Имя" type="text" class="a-l-text" id="adm_name" value="<?php echo $name; ?>"></td><td><p id="blink1"><?php echo $errors[0];?></p></td></tr>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="adm_lastname">Фамилия:</label></td><td><input name="lastname" placeholder="Фамилия" type="text" class="a-l-text" id="adm_lastname" value="<?php echo $lastname; ?>"></td><td><p id="blink1"><?php echo $errors[1];?></p></td></tr>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="adm_phone">Телефон:</label></td><td><input name="phone" placeholder="Телефон" type="tel" class="a-l-text" id="adm_phone" value="<?php echo $phone; ?>"></td><td><p id="blink1"><?php echo $errors[2];?></p></td></tr>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="adm_email">E-mail:</label></td><td><input name="email" placeholder="Электронная почта" type="email" class="a-l-text" id="adm_email" value="<?php echo $email; ?>"></td><td><p id="blink1"><?php echo $errors[3];?></p></td></tr>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="adm_nic">Ник:</label></td><td><input name="nic" placeholder="Ник" type="text" class="a-l-text" id="adm_nic" value="<?php echo $nic; ?>"></td><td><p id="blink1"><?php echo $errors[4];?></p></td></tr>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="adm_pwd">Пароль:</label></td><td><input name="pwd" placeholder="Пароль" type="password" class="a-l-text" id="adm_pwd"></td><td><p id="blink1"><?php echo $errors[5];?></p></td></tr>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="coun">Страна:</label></td>
            <td><select name="country" class="a-l-text" required="required" id="coun">
                <option value="">Выберите страну</option>
                <?php foreach ($countriesList as $coun): ?>
                    <option value="<?php echo $coun['id_country']; ?>"><?php echo $coun['name_country'];?></opyion>
                <?php endforeach; ?>
            </select></td><td><p id="blink1"><?php echo $errors[6];?></p></td></tr>
            <tr><td class="f-first-cell" align="right"><label class="labels" for="city">Город:</label></td>
            <td><select name="city" class="a-l-text" id="city" required="required">
                <option value="">Выберите город</option>
            </select></td><td><p id="blink1"><?php echo $errors[7];?></p></td></tr>
            <input type="hidden" id="adm_datePage" name="submit" value="true">
            <tr><td colspan="2"><div><button id="btn_adm_submit" class="button button_submit f-center-cell" type="submit" name="submit" value="true">Сохранить</button></div></td></tr>
        </table>
    </form>
</section>


<?php
    include ROOT . '/php/views/layouts/footer_admin.php';
?>
