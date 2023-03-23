<!doctype html>
<html lang="en">

<head>
    <title>Load Data Front Side</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="fa.png" type="image/x-icon">

    {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="container-fluid my-5">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center text-primary">Posts</h4>
                <a href="{{route('posts')}}" class="btn btn-primary">Load Data Server Side</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="postTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($datas as $key=>$row)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                <td><a href="javascript:void(0)" data-id="{{$row->id}}" class="edit btn btn-primary btn-sm">View</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="float-right">

                        {{ $datas->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
    $(function () {
      var table = $('#postTable').DataTable({
        paging: false,
      });

    });
  </script>
</body>

</html>
