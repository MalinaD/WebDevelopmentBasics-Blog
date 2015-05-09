<h1>Create new Author form</h1>

<form method="post" action="/authors/create">
    Name: <input type="text" name="author_name" value="<?php echo $this->getFieldValue('author_name'); ?>" />
    <?php echo $this->getValidationError('author_name'); ?>
    <br/>
    <input type="submit" value="Create new author"/>
</form>
