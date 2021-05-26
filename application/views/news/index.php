<main role="main">

  <section class="text-center">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <a href="<?php echo site_url('News/index') ?>">
            <img class="d-block w-100" src="<?php echo base_url('assets/images/pexels3.jpg') ?>" style="height: 500px;  background-position: center;background-repeat: no-repeat;" alt="First slide">
          </a>
        </div>
        <?php if (!empty($newsNAV)) : ?>
        <?php foreach ($newsNAV as $newsN) : ?>

          <div class="carousel-item ">
            <a href="<?php echo site_url('news/' . $newsN['id_new']) ?>">
              <img class="d-block w-100" src="<?php echo base_url('uploads/' . $newsN['image']) ?>" style="height: 500px;  background-position: center;background-repeat: no-repeat;" alt="First slide">
            </a>
           <h1> <?php echo $newsN['title']; ?></h1>
          </div>

        <?php endforeach; ?>
     
        <?php else : ?>

          <?php foreach ($newsNAVdefult as $newsN) : ?>

            <div class="carousel-item ">
              <a href="<?php echo site_url('news/' . $newsN['id_new']) ?>">
                <img class="d-block w-100" src="<?php echo base_url('uploads/' . $newsN['image']) ?>" style="height: 500px;  background-position: center;background-repeat: no-repeat;" alt="First slide">

              </a>
              <h1> <?php echo $newsN['title']; ?></h1>
            </div>

          <?php endforeach; ?>


        <?php endif; ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php foreach ($news as $news_item) : ?>
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="<?php echo base_url('uploads/' . $news_item['image']) ?>">
              <div class="card-body">
                <p class="card-text"><?php echo $news_item['title']; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"> <a style="color: black;" href="<?php echo site_url('news/' . $news_item['id_new']) ?>">View</a></button>
                    <?php if (isset($_SESSION['email'])) : ?>
                      <button type="button" class="btn btn-sm btn-outline-secondary">
                      <?php if (!empty($newsNAV)) : ?>
                        <?php foreach ($newsNAV as $newss) : ?>
                          <?php $bool=false; ?>
                          <?php if ($news_item['id_new'] == $newss['id_new']) : ?>
                            <a style="color: black;" href="<?php echo site_url('News/REMOVEFAV/' . $news_item['id_new']) ?>">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill yellow" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                              </svg>
                            </a>
                            <?php $bool=true; ?>
                            <?php break; ?>
                          <?php endif; ?>

                        <?php endforeach; ?>

                        <?php if ($bool==false) : ?>
                            <a style="color: black;" onclick="myFunction(this)" href="<?php echo site_url('News/ADDFAV/' . $news_item['id_new']) ?>">

                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                              </svg>
                            </a>
                          <?php endif; ?>
                          <?php endif; ?>
                        <?php if (empty($newsNAV)) : ?>
                          <a style="color: black;" onclick="myFunction(this)" href="<?php echo site_url('News/ADDFAV/' . $news_item['id_new']) ?>">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                              <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                            </svg>
                          </a>
                        <?php endif; ?>
                      </button>
                    <?php endif; ?>
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

  <nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" id="Previousid" href="<?php echo base_url('News/index/0') ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php for ($i = 0; $i <= $news_count / 5; $i++) : ?>
        <li class="page-item" id="paginationid">
          <a class="page-link" id="pageid" href="<?php echo base_url('News/index/' . $i * 5); ?>"><?php echo $i; ?></a>
        </li>
      <?php endfor; ?>

      <li class="page-item">
        <a class="page-link" id="Nextid" href="<?php echo base_url('News/index/' . (int)($news_count / 5) * 5); ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  <div>

  </div>
</main>