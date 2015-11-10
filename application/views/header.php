<?php	defined('BASEPATH')	OR	exit('No direct script access allowed');	?>
<!DOCTYPE HTML>
<html>
				<head>
								<title>Cheapskate - <?=$pageTitle;?></title>
								<meta charset="utf-8" />
								<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
        <? foreach ($css as $c) {
            $external = (stripos($c, '//') !== false); ?>
        <link href="<?= ($external ? '' : base_url() . 'assets/css/') . $c . ($external ? '' : '.css'); ?>" type="text/css" rel="stylesheet"/>
        <? } ?>
								<link rel="stylesheet" href="<?=base_url();?>assets/css/main.css" type="text/css"/>
								
        <script src="<?=base_url();?>assets/js/vendor/jquery-1.9.1.min.js" type="text/javascript"></script>
				</head>
				<body>