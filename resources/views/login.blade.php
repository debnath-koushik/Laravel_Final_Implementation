<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login Page</title>
</head>
<body>
    <div class="container mt-3">
        <h3>Login Page</h3>
        <p id="msg" style="color: red"></p>
          
        <form id="myForm">
          <div class="mb-3 mt-3">
            <label for="uname" class="form-label">Username:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <button id="sub" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>      
</body>
<script>
    $(document).ready(function() {
        $('#myForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: '/loginvarify',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    data: $('#myForm').serialize()
                },
                success: function(res) {
                    if (res.success) {
                        window.location.href = res.redirect;
                    } else {
                        $('#msg').text(res.message);
                    }
                }
            });
        });

    });
</script>
</html>