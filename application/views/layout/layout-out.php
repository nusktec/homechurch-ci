<!--Main javascripts-->
<script src="<?php echo base_url(); ?>lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>lib/components-jqueryui/jquery-ui.min.js"></script> <!--//component ui-->
<!--Others-->
<script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>lib/feather-icons/feather.min.js"></script>
<script src="<?php echo base_url(); ?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashforge.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashforge.aside.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashforge.chat.js"></script>
<!-- append theme customizer -->
<script src="<?php echo base_url(); ?>lib/js-cookie/js.cookie.js"></script>
<!-- start default js -->

<!--Third-party lib-->
<script src="<?php echo base_url(); ?>lib/xyz/nprogress.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--top progress bar-->
<script src="<?php echo base_url(); ?>lib/xyz/vue.min.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--vue library-->
<script src="<?php echo base_url(); ?>lib/xyz/axios.min.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--axios library-->
<script src="<?php echo base_url(); ?>lib/xyz/functions.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--basic functions-->
<script src="<?php echo base_url(); ?>lib/xyz/apihandlers.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--api handlers-->
<?php
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * layout-out.php
 * 3:34 PM | 2019 | 10
 **/
//allow turbo links
if (allow_turbolinks) { ?>
    <script src="<?php echo base_url(); ?>lib/xyz/turbolinks.js"></script> <!--turbolinks-->
    <script>
        Turbolinks.start();
    </script>
<?php } ?>

<?php
foreach ($script as $key => $values) {
    ?>
    <script src="<?php echo base_url() ?>/lib/xyz/cmd/<?php echo @$values; ?>.js?<? echo rand(1111, 9999); ?>"></script>
    <?php
}
?>
