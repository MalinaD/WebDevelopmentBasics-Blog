<div id="login-container">
   <h1>Login</h1>

<form action="/account/login" method="POST">
     <i class="glyphicon glyphicon-user"></i> <label for="username">Username:</label>
    <input id="username" type="text" name="username" />
    <br/>
    <i class="glyphicon glyphicon-lock"></i><label for="password">Password:</label>
    <input id="password" type="password" name="password" />
    <br/><br/>
    <input type="submit" value="Login" class="btn btn-primary btn-lg active"/>
    
    <a href="/account/register" class="btn btn-default btn-lg active" >Go register</a><br/><br/>
        
</form>
</div>


