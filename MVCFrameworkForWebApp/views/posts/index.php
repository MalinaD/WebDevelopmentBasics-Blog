<div id="posts-container">
 <div class="col-xs-12 col-md-12 col-lg-12">
    <form action="/posts/create">
        <button type="submit" class="submit-button btn btn-default btn-sm active newPost">Create new post</button>
    </form>
</div>
    
<h1> Posts </h1>


    <?php foreach($this->posts as $post): ?>
        <form class="singlePost" action="/posts/index" method="GET">
            <h2 class="title"><?php echo $post[0] ?></h2>
            <p class="description col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"><?php echo substr($post[1], 0, 200); echo "..."; ?></p>
            <span class="datePost glyphicon glyphicon-time"><?php echo date("Y-m-d H:i", strtotime($post[2])); ?></span>
            
            <br/><br/>
            <a href="/posts/singlePost/<?= $post[3] ?>" class="submit-button btn btn-default btn-sm active">Read more</a>
            <a href="/posts/showComments/<?php $post[3] ?>" class="btn btn-default btn-sm active">Show comments</a>     
            <div class="col-xs-12 col-md-6 col-lg-6">
                <form class="form-buttons" action="/posts/delete">
                    <a href="/posts/delete/<?=$post[3] ?>" class="btn btn-primary btn-sm active">Delete Post</a>
                </form>
            </div>
        </form><br/><br/>
    <?php endforeach; ?>


<a href="/posts/index/<?= $this->page - 1 ?>/<?= $this->pageSize?>" class="paging btn btn-primary btn-sm" >Previous</a>
<a href="/posts/index/<?= $this->page + 1 ?>/<?= $this->pageSize?>" class="paging btn btn-default btn-sm">Next</a>

</div>