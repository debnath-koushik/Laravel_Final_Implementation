<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Its impotant for csrf token handler --}} 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Welcome Page</title>
</head>
<body>
    <div class="d-flex justify-content-end align-items-center m-3">
        <button id="logout" type="button" class="btn btn-danger">Logout</button>
    </div>
    <h1 class="m-3">Hiii!!! Welcome to our Website</h1>
    <div class="d-flex justify-content-start align-items-center m-3 gap-3">
        <button id="view" type="button" class="btn btn-primary">View</button>
        <div style="border-left: 2px solid gray; height: 40px;"></div>
        <button id="insert" type="button" class="btn btn-primary">Insert</button>
    </div>
</body>
<script>
    $(document).ready(function() {
        console.log($('meta[name="csrf-token"]').attr('content'));
        $('#logout').on('click', function(e){
            e.preventDefault();

            $.ajax({
                url: 'logout',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function(res) {
                    if (res.success) {
                        window.location.href = res.redirect;
                    }
                }
            });
        });
    })
</script>
</html>