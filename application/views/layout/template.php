<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php include __DIR__ . '/../layout/layout-head.php'; ?>
<body class="app-chat">

<!--Side Bar Menu-->
<?php
//check roles
if (@(int)$user['utype'] === 1) {
    include __DIR__ . '/../layout/layout-right.php';
} else {
    include __DIR__ . '/../layout/layout-right-super.php';
}
?>
<!--NavBar-->
<div class="content ht-100v pd-0">
    <?php include __DIR__ . '/../layout/layout-nav.php'; ?>
    <? //place content here
    echo $contents;
    ?>
</div>
<!--footer-->
<?php //include __DIR__ . '/../layout/layout-footer.php'; ?>

<?php include __DIR__ . '/../layout/layout-out.php'; ?>
</html>