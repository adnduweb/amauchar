    <!-- CSRF Token -->
    <?= csrf_meta() ?>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8" />
    <title><?= (isset($meta_title)) ? ucfirst($meta_title) : service('settings')->get('App.descApp'); ?> | <?= service('settings')->get('App.nameApp'); ?></title>
    <base href="<?php echo base_url(); ?>" />
    <meta name="description" content="<?= (isset($meta_description)) ? ucfirst($meta_description) : service('settings')->get('App.core', 'descApp'); ?>">
    <meta http-equiv="X-UA-Compatible" content="requiresActiveX=true" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="canonical" href="<?= site_url(); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="robots" content="noindex, nofollow" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-57x57.png');?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-60x60.png');?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-72x72.png');?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-76x76.png');?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-114x114.png');?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-120x120.png');?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-144x144.png');?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-152x152.png');?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/apple-icon-180x180.png');?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/android-icon-192x192.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/favicon-96x96.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/favicon-16x16.png');?>">
    <link rel="manifest" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/manifest.json');?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/ms-icon-144x144.png');?>">
    <meta name="theme-color" content="#ffffff">