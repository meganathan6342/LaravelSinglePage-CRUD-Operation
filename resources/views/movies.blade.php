<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" name="csrf-token" content="{{ csrf_token() }}">
    <title>Basic</title>
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}" />
</head>

<body>
    <div id="mydiv">
        <div id="div1">
            <div id="warnings">
                @if(session()->has('success'))
                <span style="color: green;" class="warning">
                    {{ session()->get('success') }}
                </span>
                @elseif(session()->has('error'))
                <span style="color: rgb(255, 123, 0);" class="warning">
                    {{ session()->get('error') }}
                </span>
                @endif
                @if ($errors->any())
                <ul class="warnings">
                    @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <p style="color: red; height: 30px;" class="warning"></p>
            </div>
            @if(isset($movie))
            <form action="{{ route('editing.movie', $movie[0]->id)}}" method="post" id="form2">
                @csrf
                @method('PUT')
                <table>
                    <tbody>
                        <tr>
                            <td><label>ID : </label></td>
                            <td><input type="number" name="id" class="inp" value="<?php echo $movie[0]->id; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label>Movie Name : </label></td>
                            <td><input type="text" name="name" id="inp1" class="inp" value="<?php echo $movie[0]->name; ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Actor Name : </label></td>
                            <td><input type="text" name="actor" class="inp" value="<?php echo $movie[0]->actor; ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Director Name : </label></td>
                            <td><input type="text" name="director" class="inp" value="<?php echo $movie[0]->director; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right;"><input type="submit" value="Update" class="btns"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            @else
            <form action="/submit-movie" method="POST">
                @csrf
                <table>
                    <tbody>
                        <tr>
                            <td><label>ID : </label></td>
                            <td><input type="number" name="id" class="inp"></td>
                        </tr>
                        <tr>
                            <td><label>Movie Name : </label></td>
                            <td><input type="text" name="name" id="inp1" class="inp"></td>
                        </tr>
                        <tr>
                            <td><label>Actor Name : </label></td>
                            <td><input type="text" name="actor" class="inp"></td>
                        </tr>
                        <tr>
                            <td><label>Director Name : </label></td>
                            <td><input type="text" name="director" class="inp"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right;"><input type="submit" value="Submit" class="btns"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            @endif
        </div>
        <div id="div2">
            <button id="btn1" class="btns">delete</button>
            <button id="btn2" class="btns">edit</button><br><br>
            <table id="mytable">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll" onchange="toggleCheckboxes(this)"></th>
                        <th onclick="shuffle(2)">Movie Name</th>
                        <th onclick="shuffle(2)">Actor</th>
                        <th onclick="shuffle(2)">Director</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movies as $movie)
                    <tr>
                        <td><input type="checkbox" value="{{$movie->id}}" class="cb"></td>
                        <td>{{$movie->name}}</td>
                        <td>{{$movie->actor}}</td>
                        <td>{{$movie->director}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        let form2 = document.getElementById("form2");
        if (!form2) {
            let del = document.getElementById("btn1");
            del.addEventListener("click", () => {
                var cval = [];
                let cb = document.querySelectorAll('input[class="cb"]:checked');
                for (i = 0; i < cb.length; i++) {
                    cval.push(Number(cb[i].value));
                }
                if (cb.length > 0) {
                    // $.ajax({
                    //     url: "{{ route('delete.movies') }}",
                    //     type: 'DELETE',
                    //     data: {cval},
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //         },
                    //         success: function(response) {
                    //         // Handle success
                    //         },
                    //         error: function(xhr, status, error) {
                    // // Handle error
                    // }
                    // });

                    var jsondata = JSON.stringify(cval);
                    var encodedata = encodeURIComponent(jsondata);
                    window.location.href = "{{ route('delete.movies') }}?data=" + encodedata;
                    document.querySelector("p").textContent = "";
                } else {
                    document.querySelector("p").textContent = "please select a movie";
                }
            }, false);
        }

        let edit = document.getElementById("btn2");
        edit.addEventListener("click", () => {
            var cval1;
            let cb = document.querySelectorAll('input[class="cb"]:checked');
            if (cb.length == 1) {
                cval1 = cb[0].value;
                document.querySelector("p").textContent = "";
                var jsondata = JSON.stringify(cval1);
                var encodedata = encodeURIComponent(jsondata);
                window.location.href = "{{ route('edit.movie') }}?data=" + encodedata;
            } else if (cb.length == 0) {
                document.querySelector("p").textContent = "please select a movie";
            } else {
                document.querySelector("p").textContent = "please select one movie at a time";
            }
        }, false);

        function toggleCheckboxes(main) {
            var checkboxes = document.querySelectorAll('input[class="cb"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = main.checked;
            });
        }
    </script>
    <script src="{{ asset('js/movies.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>