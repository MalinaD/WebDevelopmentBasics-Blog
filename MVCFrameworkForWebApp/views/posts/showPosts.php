<div>
    <br/><br/>
    <ul class="list-group">
        <?php foreach ($this->posts as $post) : ?>
            <div id="postsContainer">
                <li  class="list-group-item">
                    <strong><?php echo $post[0]; ?></strong>
                    <span class="datePost badge"><strong><?php echo date("Y-m-d H:i", strtotime($post[2])); ?></strong></span>
                    <br/><br/>
                    <?php echo substr($post[1], 0, 150); echo "..."; ?>
                                                          
                </li>
            </div>
        <?php endforeach; ?>
    </ul><br/><br/>
</div>