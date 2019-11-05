<div class="content-body pd-0" id="app">
    <!--Populate your body data here-->
    <div class="pd-20 pd-lg-25 pd-xl-30">
        <h6 id="channelTitle" class="mg-b-5">#<? echo @$desc; ?></h6>
        <div class="row row-xs">
            <!--Row started-->
                <h1>messages class</h1>
                <div v-for="(item, key) in msg" v-bind:key="key">
                <br/>
                <h1>{{item.mbody}}</h1>
                </div>
            <!--Row ends-->
        </div>

    </div><!-- row -->
</div>
<script>
    var messages_raw = <?php echo json_encode($messages_raw); ?>;
</script>