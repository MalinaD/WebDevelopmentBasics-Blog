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
            <?php if($this->isLoggedIn): ?>
                <div id="logged-in-info">
                    <span>Hello, <?php echo $_SESSION['username']; ?> </span>
                    <form action="/account/logout"><input type="submit" value="Logout" /></form>
                </div>
            <?php endif ?>
        </header>

        <?php include('messages.php'); ?>
    </body>
    
</html>

