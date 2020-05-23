<?php
defined('BASEPATH') or exit('No direct script access allowed');


?>

<div class="row m-5">
    <div class="col-3 mr-4 mb-3 text-center">
        <?php if ($this->session->userdata('current_user')) : ?>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="shadow mt-3 btn btn-outline-dark" href="<?php echo base_url('news/addnews') ?>">Add news</a>
                <a class="shadow mt-3 btn btn-outline-dark" href="<?php echo base_url('news/addfromfile') ?>">Add from file </a>
            </div>
            </br>
        <?php endif; ?>

        <?php
        echo form_open();

        $categories = [];
        array_push($categories, 'Any');
        foreach ($this->category_model->get_list() as $value) {
            array_push($categories, $value->name);
        }

        echo '<div class="row mt-3">';
        echo '<b class="col">' . form_label('Text:', 'text', ['class' => 'mr-2 align-middle']) . '</b>';
        echo form_input('text', set_value('text', ''), ['id' => 'text', 'class' => 'form-control col ', 'placeholder' => 'Text']);
        echo '</br>';
        echo '</div>';

        echo '<div class="row mt-3">';
        echo '<b>' . form_label('Category:', 'category_id', ['class' => 'mr-2']) . '</b>';
        echo form_dropdown('category_id', $categories, 'category_id', ['class' => 'form-control col']);
        echo '</br>';
        echo '</div>';

        echo form_submit('submit', 'Search', ['name' => 'search', 'class' => 'shadow mt-2 btn btn-outline-dark']);

        echo form_close();
        ?>
    </div>

    <div class="col">
        <?php if ($this->session->userdata('news')) : ?>
            <div class="card-columns pb-5">
                <?php foreach ($this->session->userdata('news') as $value) : ?>
                    <div class="card shadow text-center border-dark pointer" style="width: 18rem;">
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
                                        <?php
                                        $cat = $this->category_model->select_by_id($value->category_id);

                                        if ($cat === null) {
                                            echo 'Other';
                                        } else {
                                            echo $cat->name;
                                        }
                                        ?>
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
                                    <h5 class="modal-title" id="modal-<?php echo $value->id ?>Label">
                                        <a class="col p-0 m-0 text-dark text-left" href="<?php echo base_url('user/showprofile/' . $value->user_email); ?>">
                                            <u><?php
                                                $user = $this->user_model->select_by_id($value->user_email);
                                                echo $user->first_name . ' ' . $user->second_name;
                                                ?>
                                            </u></a></h5>
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
                                    <div class="row p-0 m-0 w-100">
                                        <div class="col p-0 m-0 btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapse-comment-<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse-comment-<?php echo $value->id ?>">
                                                Show comments
                                            </button>
                                            <?php if ($this->session->userdata('current_user')) : ?>
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapse-<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse-<?php echo $value->id ?>">
                                                    Add comment
                                                </button>
                                            <?php endif; ?>
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Download as
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?php echo base_url('news/saveToJson/' . $value->id . "/true"); ?>">Json with Base64</a>
                                                <a class="dropdown-item" href="<?php echo base_url('news/saveToJson/' . $value->id . "/false"); ?>">Json with Names</a>
                                            </div>
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <div class="collapse w-100 m-0 p-0 mt-3" id="collapse-comment-<?php echo $value->id ?>">
                                        <div class="row w-100  m-0 p-0">
                                            <?php
                                            $comments = $this->comment_model->select_by_post_id($value->id);
                                            if (count($comments) === 0) : ?>
                                                <div>No comment found!</div>
                                            <?php else : ?>
                                                <?php foreach ($comments as $value2) : ?>
                                                    <div class="card shadow">
                                                        <div class="card-body">
                                                            <?php echo $value2->text ?>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col"><?php echo $value2->user_email ?></div>
                                                                <div class="col"><?php echo $value2->add_date ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ($this->session->userdata('current_user')) : ?>
                                        <div class="collapse w-100 m-0 p-0 mt-3" id="collapse-<?php echo $value->id ?>">
                                            <?php
                                            echo form_open(base_url('comment/addcomment/' . $value->id));

                                            echo form_label('Comment:', 'comment');
                                            echo form_textarea('comment', '', ['id' => 'comment', 'required' => 'required']);
                                            echo form_error('comment');
                                            echo '</br>';

                                            echo form_submit('submit', 'Add');

                                            echo form_close();
                                            ?>
                                        </div>
                                    <?php endif; ?>
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