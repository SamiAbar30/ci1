
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('News/create');?>
<div class="mb-3">
  <label for="formFile" class="form-label">image</label>
  <input class="form-control" type="file" id="formFile" name="userfile">
</div>
<div class="mb-3">
<label for="title">title :</label>
<input type="text" class="form-control" name="title">
</div>
<br>
<div class="mb-3">
<label for="text">article:</label>
<textarea class="form-control" name="text" rows="10"></textarea>
</div>
<br>
<?php foreach ($Categore as $news_item) : ?>
    <div class="form-check">
  <input class="form-check-input" name="check[]"  type="checkbox" value="<?php echo $news_item["id_cat"] ?>" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  <?php echo $news_item["name"] ?>
  </label>
</div>
 <?php endforeach; ?>
<input type="submit" name="submit" value="create news item">
</form>