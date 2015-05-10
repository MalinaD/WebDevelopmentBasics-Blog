<?php $post = $this -> post ?>


<form class="singlePost" action="/posts/index" method="GET">
            <h2 class="title"><?php echo $this->post['title'] ?></h2>
            <p class="description col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php echo $this->post['description'] ?>
            </p>
            
            <span class="datePost glyphicon glyphicon-time">
                <?php echo date("Y-m-d H:i", strtotime($this->post['date'])); ?>
            </span>
            
            <br/><br/>

            <a href="/posts/showComments/<?= $post['id'] ?>" class="btn btn-default btn-sm active">Show comments</a>   
            <a href="/posts/addComment" class="btn btn-default btn-sm active">Add comment</a> 
            
            <div class="col-xs-12 col-md-6 col-lg-6">
                <form class="form-buttons" action="/posts/delete">
                    <a href="/posts/delete/<?=$post['id'] ?>" class="btn btn-primary btn-sm active">Delete Post</a>
                </form>
            </div>
        </form><br/><br/>

