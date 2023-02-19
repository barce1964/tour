<?php
    include ROOT . '/php/views/layouts/header.php';
?>

<script>
    menu_items = document.getElementsByClassName("nav-item");
    for (var i = 0; i < menu_items.length; i++) {
        if (i == 2) {
            menu_items[i].classList.add('active');
        } else {
            menu_items[i].classList.remove('active');
        }
    }
    $('body').css('overflow', '');
</script>

<?php
    include ROOT . '/php/views/layouts/footer.php';
?>
