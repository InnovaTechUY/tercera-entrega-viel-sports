<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Add/Remove Multiple Input Fields Example</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ url('addset') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Número set</th>
                    <th>Puntos local</th>
                    <th>Puntos visitante</th>
                    <th>Nuevo set</th>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][nro_set]" placeholder="Ingrese nro set" class="form-control" />
                    </td>
                    <td><input type="text" name="addMoreInputFields[0][puntos_local]" placeholder="Ingrese puntos local" class="form-control" />
                    </td>
                    <td><input type="text" name="addMoreInputFields[0][puntos_visitante]" placeholder="Ingrese puntos visitante" class="form-control" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Añadir nuevo set</button></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-outline-success btn-block">Save</button>
        </form>
    </div>
</body>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove")
        
            .append(
            '<tr><td><input type="text" name="addMoreInputFields['+ i +'][nro_set]" placeholder="Ingrese número set" class="form-control" /></td><td><input type="text" name="addMoreInputFields['+ i +'][puntos_local]" placeholder="Ingrese puntos local" class="form-control" /></td><td><input type="text" name="addMoreInputFields['+ i +'][puntos_visitante]" placeholder="Ingrese puntos visitante" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            )

    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</html>