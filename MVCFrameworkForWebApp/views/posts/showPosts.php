<div>
    <ul>
        <?php foreach ($this->posts as $post) : ?>
            <div id="postsContainer">
                <li>
                    <?php echo $post[0]; ?>
                    <span class="datePost"><?php echo date("Y-m-d H:i:s", strtotime($post[2])); ?></span>
                    <br/>
                    <?php echo $post[1]; ?>
                    
                </li>
            </div>
        <?php endforeach; ?>
    </ul>
</div>