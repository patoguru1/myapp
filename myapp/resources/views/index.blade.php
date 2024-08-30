<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">

    @auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <form action="/create-post" method="POST">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" ><br><br>
    
        <label for="body">Post:</label><br>
        <textarea id="body" name="body" rows="5" ></textarea><br><br>
    
        <button type="submit">Submit Post</button>
    </form>
    @else

    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf 
        <div class="form-group">
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" >
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" >
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" >
        </div>
        <div class="form-group">
            <button type="submit">Register</button>
        </div>
    </form>

    

    <h2>login</h2>
    <form action="/login" method="POST">
        @csrf 
        <div class="form-group">
            <label for="loginname">Username:</label>
            <input type="text" id="loginname" name="loginname" >
        </div>
       
        <div class="form-group">
            <label for="loginpassword">Password:</label>
            <input type="loginpassword" id="loginpassword" name="loginpassword" >
        </div>
        <div class="form-group">
            <button type="submit">login</button>
        </div>
    </form>
</div>
        
    @endauth
    <div>
         <h2> all posts </h2>
         @foreach($posts as $post)
        <h3> {{$post['title']}} </h3>
         <p>
         {{$post['body']}}
         </p>
        <p> <a href="/edit-post/{{$post->id}}">Edit</a></p>
<form action="/delete-post/{{$post->id}}" method ="POST">
@csrf
@method('DELETE')
<button>Delete</button>
</form>
@endforeach


    </div>
          


</body>
</html>
