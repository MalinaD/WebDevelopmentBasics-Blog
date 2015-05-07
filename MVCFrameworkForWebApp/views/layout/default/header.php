<!DOCTYPE html>
<html>
    
    <head>
        <link rel="stylesheet" href="/content/styles/style.css">
        <title>
            <?php if (isset($this->title)) {
                echo htmlspecialchars($this->title);
            }
            ?>
        </title>
    </head>
    
    <body>
        <header>
            <img src="/content/images/site-logo.jpg" />
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/authors">Authors</a></li>
                <li><a href="/books">Books</a></li>
                
            </ul>
            
            <div id="logged-in-info">
                <span>Hello, username</span>
                <form action="/account/logout"><input type="submit" value="Logout" /></form>
            </div>
        </header>

        <?php include('messages.php'); ?>
    </body>
    
</html>

