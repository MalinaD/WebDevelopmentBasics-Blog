<section>
    <article>
        <form method="post" action="/posts/delete/<?php $this->post['id'] ?>">
            <div class="main">
                <div>
                    <label>Post title: </label>
                    <input type="text" name="title" class="inputs" value="<?= htmlspecialchars($this->post['title']) ?>" readonly />
                    
                </div>
                
                <div>
                    <label>Post content: </label>
                    <textarea type="text" name="content" class="inputs" value="<?= htmlspecialchars($this->post['description']) ?>"></textarea>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn-default">Delete Post</button>
                </div>
            </div>
            
            <div class="col-xs-12 col-md-12 col-lg-12">
                <form class="form-buttons" action="/posts">
                    <button type="submit" class="btn-default">Cancel</button>
                </form>
            </div>
        </form>  
    </article>
</section>
