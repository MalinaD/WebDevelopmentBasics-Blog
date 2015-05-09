<!DOCTYPE html>
<html lang="en">
    
    <head>
        <link rel="stylesheet" href="/content/styles/style.css" />
        <link rel="stylesheet" href="/content/styles/dist/css/bootstrap.min.css" />
        <title>
            <?php if (isset($this->title)) {
                echo htmlspecialchars($this->title);
            }
            ?>
        </title>
    </head>
    
    <body>
        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <a class="navbar-brand" href="/">My IT blog</a>
                  </div>
                  <div>

            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/authors">Authors</a></li>
                <?php if($this->isLoggedIn) : ?>
                    <li><a href="/posts">Posts</a></li>
                <?php  endif; ?>
                
            </ul>
            <?php if($this->isLoggedIn): ?>
                <div class="logged-in-info nav navbar-nav navbar-right">
                    <span class="glyphicon glyphicon-user"> Hello, <?php echo $_SESSION['username']; ?> </span> 
                    <form action="/account/logout"><input type="submit" value="Logout" class="btn btn-primary btn-sm"/></form>
                </div>
            <?php endif ?>
            </div>
            </div>
          </nav>
        </header>

        <?php echo $this->isLoggedIn ?>
        
        <?php include_once('messages.php'); ?>
        
       <!-- <?php echo "You are visitor num=>". $counter[0]; ?> --> 
    </body>
    
</html>

