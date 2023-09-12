<?php
require_once '../../config/app.php';

?>

<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon Nov 02 2020 09:08:50 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5ea837e8c81001b668dffd4a" data-wf-site="5ea837e8c8100167b2dffd49">
<head>
    <meta charset="utf-8">
    <title><?= APP_NAME; ?> Contact Us</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="../../public/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="../../public/css/webflow.css" rel="stylesheet" type="text/css">
    <link href="../../public/css/split-opl.webflow.css?ver=1.1" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Inter:regular,600","Lora:regular"]  }});</script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="../../public/images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="../../public/images/webclip.jpg" rel="apple-touch-icon">
    <style type="text/css">
        body {
            background-color: white !important;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="body">
<div class="columns w-row" style="color: #0B1C2E !important;">
    <div class="leftcontent w-col w-col-6 w-col-stack">
        <div data-w-id="b84f5156-c6e2-fb1d-6606-98a08030a472" style="opacity:0" class="image">
            <!--        <img src="public/images/bg.avif" alt="" style="height: 100%">-->
        </div>
    </div>
    <div class="rightcontent">

        <div data-w-id="3fd5aeb3-22da-ed60-7286-0d11f16597d3" style="opacity:0" class="content">

            <div class="my-20">
                <a href="../../">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
            </div>

            <div style="margin-bottom: 100px">
                <img src="../../public/images/logo.png" alt="" style="width: 500px">
            </div>
            <h1 class="text-block-2"><strong class="bold-text" style="color: red">Contact <?= APP_NAME; ?></strong></h1>
            <div class="links w-row">
                <div class="w-full">
                    <form action="">
                        <div>
                            <label for="name">
                                <input class="block w-full px-6 py-4 rounded-md bg-gray-100" type="text" name="name" id="name" placeholder="Your Name">
                            </label>
                        </div>
                        <div>
                            <label for="email_address">
                                <input class="block w-full px-6 py-4 rounded-md bg-gray-100" type="text" name="email_address" id="email_address" placeholder="E-mail Address">
                            </label>
                        </div>
                        <div>
                            <label for="confirmation_code">
                                <input class="block w-full px-6 py-4 rounded-md bg-gray-100" type="text" name="confirmation_code" id="confirmation_code" placeholder="Ticket Number">
                            </label>
                        </div>
                        <div>
                            <label for="confirmation_code">
                                <textarea class="block w-full px-6 py-4 rounded-md bg-gray-100" name="message" id="message" cols="20" rows="5" placeholder="Message"></textarea>
                            </label>
                        </div>
                        <div class="mt-4">
                            <button class="text-center bg-red-600 rounded-md py-4 text-white font-semibold w-full uppercase">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="credit">©<?= date('Y'); ?> <?php echo APP_NAME; ?>
            </div>
        </div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5ea837e8c8100167b2dffd49" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="../../public/js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>