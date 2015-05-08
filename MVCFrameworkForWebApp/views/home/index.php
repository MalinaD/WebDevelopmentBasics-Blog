<h1>Welcome to home!</h1>

<a href="/account/login">Login</a>
<a href="/account/register">Register</a>

<button id="show-posts">Show posts</button>
<div id="posts"></div>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script>
    $('#show-posts').on('click', function(ev){
        $.ajax({
            url:'/posts/showPosts',
            method: 'GET'
        }).success(function(data){
            $('#posts').html(data);
        });
    })();
</script>
