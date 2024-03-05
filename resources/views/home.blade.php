<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth 
    <p>Congrats {{auth()->user()->name}} you are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>


    <div style="border:3px solid black;">
        <h2>Create a new Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="post title">
            <textarea name="body" placeholder="body-content"></textarea>
            <button>Create Post</button>
        </form>
    </div>

    <div style="border:3px solid black;">
        <h2>All posts<h2>
            @foreach($posts as $post)
            <div style="background-color:gray;padding:10px;margin:10px">
                <h3>{{$post['title']}}</h3>
                {{$post['body']}}

                {{-- edit  --}}
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>

                {{-- delete --}}
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>

            </div>
            @endforeach()
    </div>

    @else 
    
    <div style="border:3px solid black;">
        <h2>Register</h2>
        <form action="{{route('register')}}" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password" > 
            <button>Register</button>
        </form>
    </div>

    <div style="border:3px solid black;">
            <h2>Login</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password" > 
                <button>Log in</button>
            </form>
    </div>

    @endauth 

</body>
</html>