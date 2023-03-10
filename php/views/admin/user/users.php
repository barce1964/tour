<?php
    include ROOT . '/php/views/layouts/header_admin.php';
?>

<script>
    $('body').css('overflow', 'auto');
</script>

<div class="panel-head ftco-animate">
    <div class="panel-btn">
        <form action="users/create" method="POST">
            <button id="btn-create">Создать</button>
        </form>
        <button id="btn-delete">Удалить</button>
    </div>
</div>

<section class="usr ftco-animate">
    <table class="usr-tbl">
        <tr>
            <th></th>
            <th class="usr-cell usr-th">Имя и Фамилия</th>
            <th class="usr-cell usr-th">Логин</th>
            <th class="usr-cell usr-th">Телефон</th>
            <th class="usr-cell usr-th">Почта</th>
            <th class="usr-cell usr-th">Страна</th>
            <th class="usr-cell usr-th">Город</th>
        </tr>
        <?php foreach ($listUsr as $user): ?>
            <tr>
                <td><input type="checkbox"></td>
                <td class="usr-cell"><?php echo $user['first_name_adm'] . ' ' . $user['last_name_adm'] ?></td>
                <td class="usr-cell"><?php echo $user['login_adm'] ?></td>
                <td class="usr-cell"><?php echo $user['phone_num_adm'] ?></td>
                <td class="usr-cell"><?php echo $user['email_adm'] ?></td>
                <td class="usr-cell"><?php echo $user['name_country'] ?></td>
                <td class="usr-cell"><?php echo $user['name_city'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php
    include ROOT . '/php/views/layouts/footer_admin.php';
?>
