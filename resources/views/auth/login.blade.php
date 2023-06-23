<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('login/css/style.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"  />
    <style></style>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->

          <!-- Icon -->
          <div class="fadeIn first">
            <img src="{{asset('assets/backend/images/gink.png')}}" style="padding:20px" id="icon" alt="User Icon" />
          </div>

          <!-- Login Form -->
          <form id="formStore" class="custom-form mt-4 pt-2 login" method="POST" action="{{ route('backend.login') }}">
            @csrf
            @error('email')
                <span class="invalid-feedback"  style="display:block;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
            @error('password')
                <span class="invalid-feedback" style="display:block;">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>

          <!-- Remind Passowrd -->
          {{-- <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div> --}}

        </div>
      </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>

    $(document).ready(function () {
            $("#formStore").submit(function (e) {
                e.preventDefault();
                let form = $(this);
                let btnSubmit = form.find("[type='submit']");
                let btnSubmitHtml = btnSubmit.html();
                let url = form.attr("action");
                let data = new FormData(this);
                $.ajax({
                beforeSend: function () {
                    btnSubmit.addClass("disabled").val("Loading ...").prop("disabled", "disabled");
                },
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",
                url: url,
                data: data,
                success: function (response) {

                    let errorCreate = $('#errorCreate');
                    errorCreate.css('display', 'none');
                    errorCreate.find('.alert-text').html('');
                    if (response.status === "success") {
                        toastr.success(response.message, 'Success !');
                        window.location.href = response.redirect;
                    } else {
                        toastr.error('Gagal Untuk Login!');
                    }
                    btnSubmit.removeClass("disabled").val('Login').removeAttr("disabled");
                },
                error: function (response) {
                    btnSubmit.removeClass("disabled").val('Login').removeAttr("disabled");
                       toastr.error('Gagal Untuk Login Periksa Email Dan Password!');
                    }
                });
            });

        });
</script>
</html>
