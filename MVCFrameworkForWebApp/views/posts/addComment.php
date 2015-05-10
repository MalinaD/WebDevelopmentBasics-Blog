<div class="comments-container container">
    <div class="formContainer">
        <?php if($this->isLoggedIn): ?>
            <form action="/posts/addComment" method="POST">
                <h1>Add comment</h1>
                <textarea placeholder="Your comment here" name="comment"
                       value="<?php echo $this->getFieldValue('comment') ?>"></textarea>
                <br />
                <?php echo $this->getValidationError('comment'); ?>
                <input type="submit" value="Add" class="button"/>
            </form>
        <?php endif; ?>

        <?php if(!$this->isLoggedIn): ?>
            <form action="/comments/add" method="POST">
                <h1>Add comment</h1>
                <input type="text" id="visitorName" placeholder="Your name here.. "/>

                <input type="email" id="visitorEmail" placeholder="Your email here.. " />
                <textarea placeholder="Your comment here" name="comment"
                          value="<?php echo $this->getFieldValue('comment') ?>"></textarea>
                <br />
                <?php echo $this->getValidationError('comment'); ?>
                <input type="submit" value="Add" class="button"/>
            </form>
        <?php endif; ?>
    </div>
</div>