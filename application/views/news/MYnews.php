<main role="main">
<section class="jumbotron text-center"  style="height: 500px;  background-position: center;background-repeat: no-repeat; background-size: cover;background-image: url('<?php echo base_url('assets/images/pexels1.jpg') ?>');">

</section>

<div class="album py-5 bg-light">
  <div class="container">
  <div class="row">
  <?php foreach ($news as $news_item) : ?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" 
          src="<?php echo base_url('uploads/' . $news_item['image']) ?>">
          <div class="card-body">
            <p class="card-text"><?php echo $news_item['title']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary" > <a href="<?php echo site_url('news/' . $news_item['id_new']) ?>" >View</a></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" > <a href="<?php echo site_url('News/editnews/' . $news_item['id_new']) ?>" >edit</a></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" > <a href="<?php echo site_url('News/deletnews/' . $news_item['id_new']) ?>" >delet</a></button>
              </div>
              <small class="text-muted"><?php echo $news_item['datepost']; ?></small>
            </div>
          </div>
        </div>

      </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

</main>
