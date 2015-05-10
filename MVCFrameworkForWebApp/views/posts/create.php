<div class="container">
    <div class="formContainer">
        <form action="/posts/create" method="POST" class="forms">
            <h1>New Post</h1>
            <input type="text" placeholder="Title" name="title" /><br/><br/>
            <textarea placeholder="Content.." name="description" value="<?php echo $this->getFieldValue('description') ?>">
            </textarea>
            
            <?php echo $this->getValidationError('description'); ?>
            <br/>
            <input type="submit" class="btn btn-default btn-sm active" value="Add Post"/>
        </form>
    </div>
</div>