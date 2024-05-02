<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Books list</h1>
    <ul>
        @foreach($books as $book)
        <li>
            <strong>{{$book->name}}</strong><br>
            Author : {{$book->author}} <br>
            publish_date : {{$book->publish_date}} <br><br>
        </li>
        @endforeach
    </ul>
    <form action="/submit-book" method="post">
        @csrf
        Book Name : <br>
        <input type="text" name="name"><br>
        Author Name : <br>
        <input type="text" name="author"><br>
        Publish date : <br>
        <input type="text" name="publish_date"><br>
        <input type="submit"><br>
    </form>
    @if(session()->has('message'))
    <div>{{ session()->get('message') }}</div>
    @endif
</body> 
</html>