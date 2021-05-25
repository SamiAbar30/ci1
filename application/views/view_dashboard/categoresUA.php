
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<form method="post" action="<?php echo base_url('Dashboard/'.$action.'/'.$id);?>">
<label for="name"></label>
<input type="text" name="name" id="name">
<br>
<input type="submit" name="submit" value="create news item">
</form>