<!--Main javascripts-->
<script src="<?php echo base_url(); ?>lib/quill/quill.min.js"></script>

<script src="<?php echo base_url(); ?>lib/components-jqueryui/jquery-ui.min.js"></script> <!--//component ui-->
<script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--Others-->

<script src="<?php echo base_url(); ?>lib/feather-icons/feather.min.js"></script>
<script src="<?php echo base_url(); ?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>lib/prismjs/prism.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashforge.aside.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashforge.mail.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashforge.chat.js"></script>
<script src="<?php echo base_url(); ?>lib/select2/js/select2.min.js"></script>

<!-- append theme customizer -->
<script src="<?php echo base_url(); ?>lib/js-cookie/js.cookie.js"></script>
<!-- start default js -->

<script src="<?php echo base_url(); ?>assets/js/dashforge.settings.js"></script>
<script src="<?php echo base_url(); ?>lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>lib/typeahead.js/typeahead.bundle.min.js"></script>


<!--Third-party lib-->
<script src="<?php echo base_url(); ?>lib/xyz/nprogress.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--top progress bar-->
<script src="<?php echo base_url(); ?>lib/xyz/vue.min.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--vue library-->
<script src="<?php echo base_url(); ?>lib/xyz/axios.min.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--axios library-->
<script src="<?php echo base_url(); ?>lib/xyz/functions.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--basic functions-->
<script src="<?php echo base_url(); ?>lib/xyz/apihandlers.js?cache<?php echo rand(11111, 99999) ?>"></script> <!--api handlers-->
<script src="<?php echo base_url(); ?>assets/js/dashforge.js"></script>
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
<script>
      $(function(){
        'use strict'

        // With TypeAhead
        var citynames = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: {
            url: '../assets/data/citynames.json',
            filter: function(list) {
              return $.map(list, function(cityname) {
                return { name: cityname }; });
              }
            }
        });

        citynames.initialize();

        $('#input2').tagsinput({
          typeaheadjs: {
            name: 'citynames',
            displayKey: 'name',
            valueKey: 'name',
            source: citynames.ttAdapter()
          }
        });

        // Objects as Tags
        var cities = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: '../assets/data/cities.json'
        });

        cities.initialize();

        var elt = $('#input3');
        elt.tagsinput({
          itemValue: 'value',
          itemText: 'text',
          typeaheadjs: {
            name: 'cities',
            displayKey: 'text',
            source: cities.ttAdapter()
          }
        });

        elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
        elt.tagsinput('add', { "value": 4 , "text": "Washington"  , "continent": "America"   });
        elt.tagsinput('add', { "value": 7 , "text": "Sydney"      , "continent": "Australia" });
        elt.tagsinput('add', { "value": 10, "text": "Beijing"     , "continent": "Asia"      });
        elt.tagsinput('add', { "value": 13, "text": "Cairo"       , "continent": "Africa"    });

      });
    </script>

