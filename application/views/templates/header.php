<!DOCTYPE html>
<!-- saved from url=(0048)https://getbootstrap.com/docs/4.0/examples/blog/ -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="<?php echo base_url("assets/blog.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/album.css") ?>">

  <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Blog Template for Bootstrap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

  <!-- Bootstrap core CSS -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>

<body>

  <div class="container">
    <?php if (isset($_SESSION['email'])) : ?>
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="<?php echo site_url("News/create") ?>">create news</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="<?php echo site_url("News/index") ?>">SAMI</a>
          </div>


          <div class=" col-4 d-flex justify-content-end align-items-center dropdown">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

              <a class="dropdown-item" href="<?php echo site_url("News/MYnews") ?>">MY news</a>
              <?php if ($_SESSION['admin'] == 1) : ?>
                <a class="dropdown-item" href="<?php echo site_url("Dashboard/Home") ?>">dashboard</a>
              <?php endif; ?>
              <a class="dropdown-item" href="<?php echo site_url("User/loge_out") ?>">loge out</a>
            </div>
          </div>
        </div>
      <?php else : ?>
        <header class="blog-header py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
              <a class="text-muted" href="<?php echo site_url("User/singn_up") ?>">Subscribe</a>
            </div>
            <div class="col-4 text-center">
              <a class="blog-header-logo text-dark" href="<?php echo site_url("News/index") ?>">SAMI</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
              <a class="btn btn-sm btn-outline-secondary" href="<?php echo site_url("User/singn_in") ?>">Sign in</a>
            </div>
          </div>
        </header>
      <?php endif; ?>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <?php foreach ($Categore as $news_item) : ?>
            <a class="p-2 text-muted" href="<?php echo base_url("News/view_categore/" . $news_item["id_cat"]) ?>"><?php echo $news_item["name"] ?></a>
          <?php endforeach; ?>
        </nav>
      </div>