<h1>Home</h1>

<div class="row">
    <div class="col-3">
        <?php if ($this->session->userdata('current_user')): ?>
            <a class="btn btn-primary" href="<?php echo base_url('news/addnews') ?>">Add news</a>
        <?php endif; ?>
    </div>
    <div class="col">
        <?php if ($this->news_model->get_list()): ?>
            <div class="card-columns">
                <?php foreach ($this->news_model->get_list() as $value): ?>
                    <div class="card text-center border-primary" style="width: 18rem;">
                        <?php
                        $imagesNames = $this->news_images_model->select_by_postID($value->id);
                        ?>
                        <?php if ($imagesNames): ?>
                            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php foreach ($imagesNames as $image): ?>
                                        <div class="carousel-item active" data-interval="2500">
                                            <img src="<?php echo base_url('uploads/images/news/' . $image->picture) ?>" class="d-block w-100" alt="...">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        <?php endif; ?>

                        <div class="card-body">
                            <p class="card-text"><?php echo $value->text ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <div class="row">
                                    <div class="col">
                                        <?php echo $this->category_model->select_by_id($value->category_id)->name ?>
                                    </div>
                                    <div class="col">
                                        <?php echo $value->add_date ?>
                                    </div>
                                </div>
                            </small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No news found! :(</p>
        <?php endif ?>
    </div>
</div>

</body>

