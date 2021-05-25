<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark" class="jumbotron text-center" style="height: 500px;  background-position: center;background-repeat: no-repeat; background-size: cover;background-image: url('<?php echo base_url('uploads/' . $news_item['image']) ?>');">

</div>

</div>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">

      <div class="blog-post">
        <h2 class="blog-post-title">
          <?php
          echo $news_item['title']; ?>
        </h2>
        <p class="font-italic"> <?php echo $news_item['datepost']; ?> by <?php echo $user["firstname"] ?> </p>
        <p>
          <?php
          echo $news_item['text'];
          ?>
        </p>
      </div>
    
    </div>
    <aside class="col-md-4 blog-sidebar">
    <div class="p-3">
      <h4 class="font-italic">Archives</h4>
      <?php foreach ($news_all as $news) : ?>
         <ol class="list-unstyled mb-0">
          <li><a href="<?php echo site_url('news/' . $news['id_new']) ?>">
          <?php echo $news['datepost']; ?></a></li>
          </ol>

        <?php endforeach; ?>
  </div>
  </aside>
  </div>
</main>