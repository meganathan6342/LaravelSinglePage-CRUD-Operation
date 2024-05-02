<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <form action="/validate-form" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name" id="inp1"><br>
        <input type="number" name="age" placeholder="Age"><br>
        <input type="submit" value="Next">
    </form>
@if(session()->has('success'))
    <span>
        {{ session()->get('success') }}
    </span>
@endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <p style="color: red;"></p>
        <script src = "{{ asset('js/validation.js') }}"></script>
</body>
</html>