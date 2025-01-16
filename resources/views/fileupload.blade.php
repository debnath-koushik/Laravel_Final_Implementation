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
    <div class="container mt-3">
        <form id="fileForm" enctype="multipart/form-data">
            <div class="form-group">
              <label for="file">Upload File:</label>
              <input type="file" class="form-control" name="file">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
<script>
    $(document).ready(function() {

        $('#fileForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: 'upload',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.success) {
                        // alert('File uploaded successfully! Path: ' + res.path);
                        alert(res.message);
                    } else {
                        alert('Error: ' + res.message);
                    }
                }
            });
        });
    });
</script>
</html>