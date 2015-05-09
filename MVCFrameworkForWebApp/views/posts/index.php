<div class="container" id="posts">
<h1> Posts </h1>

<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Posting date</th>
    </tr>
    
   <?php foreach($this->posts as $post): ?>
        <tr>
            <td><?php echo $post[0] ?></td>
            <td><?php echo $post[1] ?></td>
            <td><?php echo date("Y-m-d H:i:s", strtotime($post[2])); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

    <?php foreach($this->posts as $post): ?>
        <form id="post" action="/posts/index" method="GET">
            <h2 class="title"><?php echo $post[0] ?></h2>
            <p class="description"><?php echo $post[1] ?></p>
            <span class="datePost"><?php echo date("Y-m-d H:i:s", strtotime($post[2])); ?></span>
        </form>
    <?php endforeach; ?>

<a href="/posts/index/<?= $this->page - 1 ?>/<?= $this->pageSize?>" class="paging btn btn-primary btn-sm" >Previous</a>
<a href="/posts/index/<?= $this->page + 1 ?>/<?= $this->pageSize?>" class="paging btn btn-default btn-sm">Next</a>

</div>