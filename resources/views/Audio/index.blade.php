<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        .container {
            padding: 2rem 0rem;
        }

        h4 {
            margin: 2rem 0rem 1rem;
        }

        .table-image {

            td,
            th {
                vertical-align: middle;
            }
        }
    </style>
    <title>Index</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>

        </div>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <a href="{{ route('create') }}" class="btn btn-primary">Add</a>

                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">language</th>
                        <th scope="col">File_path</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($audioFiles as $value)
                        <tr>
                            <th scope="row">{{ $value->title }}</th>
                            <td>{{ $value->language }}</td>
                            <td>{{ $value->filepath }}</td>
                            <td>
                                <a href="{{route('show',$value->id)}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <a href="{{ route('edit', $value->id) }}" class="btn btn-success"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('delete', $value->id) }}" class="btn btn-danger"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
