<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!--<title>--><?php //the_title(); ?><!--</title>-->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        [data-cky-tag='detail-powered-by'] {
            display: none !important;
        }
    </style>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php global $blade; ?>

<?php echo $blade->run( 'layouts.header.index' ); ?>

<main>