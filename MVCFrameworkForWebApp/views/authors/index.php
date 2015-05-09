<div id="authors-container">
    <h1>
    <?= htmlspecialchars($this->title) ?>
</h1>
Hello, I am the Author Index view.

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach($this->authors as $author) : ?> 
        <tr>
            <td> <?= htmlspecialchars($author['id'])?> </td>
            <td> <?= htmlspecialchars($author['name'])?> </td>
            <td><a href="/authors/delete/<?= $author['id'] ?>" >[Delete]</a></td>
        </tr>
    <?php endforeach; ?>
    
</table>

<a href="/authors/create">[Create]</a>
</div>
