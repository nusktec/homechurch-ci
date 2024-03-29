<?php
/**
 * Created by PhpStorm.
 * User: revelation
 * Date: 10/18/19
 * Time: 5:09 PM
 */
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Facebook -->
    <meta property="og:url" content="<?php echo base_url() ?>">
    <meta property="og:title" content="<?php echo config_item('meta')['title'] ?>">
    <meta property="og:description" content="<?php echo config_item('meta')['desc'] ?>">

    <meta property="og:image" content="<?php echo base_url() ?>assets/img/social-mg.png">
    <meta property="og:image:secure_url" content="<?php echo base_url() ?>assets/img/social-mg.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="auto">
    <meta property="og:image:height" content="auto">

    <!-- Meta -->
    <meta name="description" content="Presents Statistical Sheet v1.0">
    <meta name="author" content="RSC BYTE LTD (http://rscbyte.com)">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
          href="<?php echo base_url(); ?>assets/img/favi.png?cache=<?php echo rand(111, 999); ?>">

    <title><?php echo config_item('meta')['app'] . " | " . @$title ?></title>
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- vendor css -->
    <link href="<?php echo base_url(); ?>lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/quill/quill.core.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/select2/css/select2.min.css" rel="stylesheet">


    <link href="<?php echo base_url(); ?>lib/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>lib/jquery/jquery.min.js"></script>
    <!--Main CSS Files here-->
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashforge.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashforge.mail.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashforge.auth.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashforge.chat.css">

    <!--Top progress bar-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nprogress.css">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="turbolinks-visit-control" content="replace">
</head>
