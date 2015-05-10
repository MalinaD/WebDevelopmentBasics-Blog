<div class="comments-container">
    <br/><br/>
    <?php $post = $this -> post ?>

    <ul class="list-group">
        <?php foreach ($this->comments as $comment): ?>
        <li  class="list-group-item">                             
            <?php echo $comment['comment']; ?>
            <span class="badge"><?php echo $comment['username']; ?></span>
            <span class="badge"><?php echo $comment['date']; ?></span>
               
            <?php if ($this->isLoggedIn) : ?>
              <br <form action="/posts/deleteComment" style="float: right;">
                               <a href="/posts/deleteComment/<?= $post['id'] ?>" class="btn btn-default btn-sm active">Delete</a>
                           </form>
             <?php endif; ?>
        </li>

        <?php endforeach; ?>
    </ul>
                
    <a href="/posts/addComment" class="btn btn-default btn-sm active">Add comment</a> 

</div>