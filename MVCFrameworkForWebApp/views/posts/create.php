
<div class="container">
    <div class="formContainer">
        <form action="/posts/create" method="POST" class="forms">
            <h1>New Post</h1>
            <input type="text" placeholder="Title" /><br/><br/>
            <textarea placeholder="Content.." name="content" value="<?php echo $this->getFieldValue('content') ?>">
            </textarea>
            
            <?php echo $this->getValidationError('content'); ?>
            <br/>
            <input type="submit" value="Add"/>
        </form>
    </div>
</div>