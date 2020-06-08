<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>

    
  </head>
  <body style = " margin-left: 30%;">
    <div class="row">
        <div name="left" class="col-md-4"></div>
        <div name="middle" class="form-group col-md-8" style = " margin-left: 10%; margin-right: 10%">
            <form> 
                @csrf
                Ciphered Text: <input id = "submit" type="text">
            </form>
        </div>
        <div name="middle" style = " margin-left: 10%; margin-right: 10%">
            <form method="POST" action="/decode">
                @csrf
                <p>Caesar Cipher Solver</p>
                
                <br/>
                {{-- display:{{$is_caesar?'inline':'hidden'}};" --}}
                <div style="margin-left: 10%;margin-top:10%; >
                    <label for="shift_number">Shift number(1-26)</label>
                    <input type="number" id="shift_number" name="shift_number" min="1" max="26">
                </div>
                <br/>
                <select class="browser-default custom-select">
                    <option value="1" selected>Encode</option>
                    <option value="2">Decode</option>
                </select>
    
                <br />
                
                {{-- <input type="image" src="https://img.icons8.com/cute-clipart/64/000000/synchronize.png" style = " margin-left: 33%;"/>                     --}}
    
                <br/>
            </form>
        </div>
        <div name="bottom" class="form-group col-md-4" style = " margin-left: 10%; margin-right: 10%">
            <p>Decoded text:  <span id="txtDecoded"></span></p>
        </div>
    </div>
    <script>
        function showDecoded(str) {
            if (str.length == 0) { 
                document.getElementById("txtDecoded").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtDecoded").innerText = this.responseText;
                    }

                };
                xmlhttp.open("GET", "/decode?q=" + str, true);
                xmlhttp.send();
            }
        }
        var submit = document.getElementById( "submit");

        submit.addEventListener("keyup", (event) => {
            console.log(event.keyCode);
            if(event.keyCode === 8){

                event.preventDefault();
                console.log(submit.value);
                showDecoded(submit.value);
            }
        })

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>