<h1>Home</h1>

<?php
$temp = $this->news_model->select_by_text_and_category('', 1);
print_r($temp);
?>

<div class="row">
    <div class="col-3">
        <?php if ($this->session->userdata('current_user')) : ?>
            <a class="btn btn-primary" href="<?php echo base_url('news/addnews') ?>">Add news</a>
            </br>
        <?php endif; ?>
        
    </div>
    <div class="col">
        <?php if ($this->news_model->get_list()) : ?>
            <div class="card-columns">
                <?php foreach ($this->news_model->get_list() as $value) : ?>
                    <div class="card text-center border-primary pointer" style="width: 18rem;">
                        <?php
                        $imagesNames = $this->news_images_model->select_by_postID($value->id);
                        ?>
                        <?php if ($imagesNames) : ?>
                            <div id="<?php echo $value->id ?>" class="carousel slide" data-ride="carousel" data-toggle="modal" data-target="#modal-<?php echo $value->id ?>">
                                <div class="carousel-inner">
                                    <?php
                                    for ($i = 0; $i < count($imagesNames); $i++) : ?>
                                        <div class="carousel-item 
                                        <?php
                                        if ($i === 0) {
                                            echo 'active';
                                        }
                                        ?>" data-interval="2500">
                                            <img src="<?php echo base_url('uploads/images/news/' . $imagesNames[$i]->picture) ?>" class="d-block w-100 news_image" alt="...">
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="card-body pointer" data-toggle="modal" data-target="#modal-<?php echo $value->id ?>">
                            <p class="card-text"><?php echo $value->text ?></p>
                        </div>
                        <div class="card-footer pointer" data-toggle="modal" data-target="#modal-<?php echo $value->id ?>">
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

                    <!-- Modal -->
                    <div class="modal fade" id="modal-<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo $value->id ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-<?php echo $value->id ?>Label"><?php echo $value->user_email ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo $value->text ?>

                                    <?php if ($imagesNames) : ?>
                                        <div id="<?php echo $value->id ?>" class="carousel slide" data-ride="carousel" data-toggle="modal" data-target="#modal-<?php echo $value->id ?>">
                                            <div class="carousel-inner">
                                                <?php
                                                for ($i = 0; $i < count($imagesNames); $i++) : ?>
                                                    <div class="carousel-item 
                                        <?php
                                                    if ($i === 0) {
                                                        echo 'active';
                                                    }
                                        ?>" data-interval="2500">
                                                        <img src="<?php echo base_url('uploads/images/news/' . $imagesNames[$i]->picture) ?>" class="d-block w-100" alt="...">
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No news found! :(</p>
        <?php endif ?>
    </div>
</div>

</body>