<div class="comments-container">
    <br/><br/>
    
<?php $post = $this -> post ?>
    <ul class="list-group">
        <?php foreach ($this->comments as $comment): ?>
        <li  class="list-group-item">                             
            <?php echo $comment['text']; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>