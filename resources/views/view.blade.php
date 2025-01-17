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
        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
            <h1>Details</h1>
            <div>
                <button id="download" type="button" class="btn btn-success">Download</button>
                <button id="back" type="button" class="btn btn-primary">Back</button>
            </div>
        </div>         
        <table class="table table-bordered">
          <thead>
            <tr align="center">
              <th>Username</th>
              <th>Phone</th>
              <th>Gmail</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="t_body">
            {{-- @if($data->isEmpty())
                <p>No data available.</p>
            @else
                @foreach($data as $item)
                    <tr align="center">
                        <td>{{ $item->uname }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->gmail }}</td>
                        <td>{{ $item->address }}</td>
                        <td class="d-flex justify-content-center align-items-center gap-3">
                            <button id="edit" type="button" class="btn btn-secondary">Edit</button>
                            <button id="del" type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @endif --}}
          </tbody>
        </table>
      </div>

</body>
<script>
    $(document).ready(function() {

        fetchdata();

        function fetchdata() {
            $.ajax({
                url: 'showdata',
                type: 'GET',
                success: function(res){
                    let data = '';

                    res.forEach(ele => {
                        data += `
                            <tr align="center">
                                <td>${ele.uname}</td>
                                <td>${ele.phone_number}</td>
                                <td>${ele.gmail}</td>
                                <td>${ele.address}</td>
                                <td class="d-flex justify-content-center align-items-center gap-3">
                                    <button id="edit" type="button" class="btn btn-secondary">Edit</button>
                                    <button id="del" type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        `
                    });
                    $('#t_body').html(data);
                }
            });
        }

        $('#back').click(function(){
            window.location.href = "{{ route('welcome') }}";
        })

        $('#download').click(function() {
            window.location.href = "{{ route('data.download') }}";
        })
    })
</script>
</html>