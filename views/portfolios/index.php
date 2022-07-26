<?php views('/partials/header.php'); ?>

<h2>Portfolios - <?php echo env('APP_TITLE'); ?></h2>
<?php foreach($portfolios as $portfolio): ?>
    <li><?php echo $portfolio['title']; ?></li>
<?php endforeach;?>

<?php views('/partials/footer.php'); ?>