<?php
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * misc.carousel.php
 * 1:29 PM | 2019 | 10
 **/
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner overflow-hidden" style="border-radius: 10px 0px 10px 0px">
        <div class="carousel-item active">
            <img src="<?php echo base_url() ?>assets/img/psa-slider-1.jpg" class="d-block w-100"
                 alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="tx-white">ONLINE FELLOWSHIP !</h5>
                <p>Worship anywhere anytime and any place</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url() ?>assets/img/psa-slider-2.jpg" class="d-block w-100"
                 alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="tx-white">REMAIN RAPTURABLE</h5>
                <p>Always with God...</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url() ?>assets/img/psa-slider-3.jpg" class="d-block w-100"
                 alt="...">
            <div class="carousel-caption d-none d-md-block">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="tx-white">INVITATIONS</h5>
                    <p>Invite friends made easy</p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
