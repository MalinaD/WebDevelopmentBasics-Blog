<div class="comments-container">
    <br/><br/>
    

    <ul class="list-group">
        <?php foreach ($this->comments as $comment): ?>
        <li  class="list-group-item">                             
            <?php echo $comment['comment']; ?>
        </li>
        <?php endforeach; ?>
    </ul>
                
    <a href="/posts/addComment" class="btn btn-default btn-sm active">Add comment</a> 
</div>