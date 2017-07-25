<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<hr><hr><hr><hr>
<script>

    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addHamada',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val()
            },
            success: function(data) {
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                } else {
                    $('.error').remove();
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },
        });
        $('#name').val('');
    });
</script>
<div class="form-group row add">
    <div class="col-md-8">
        <input type="text" class="form-control" id="name" name="name"
               placeholder="Enter some name" required>
        <p class="error text-center alert alert-danger hidden"></p>
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary" type="submit" id="add">
            <span class="glyphicon glyphicon-plus"></span> ADD
        </button>
    </div>
</div>
<hr>
<hr>
<div class="table-responsive text-center">
<table class="table table-borderless" id="table">
    <thead>
    <tr>
        <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">Actions</th>
    </tr>
    </thead>
    @foreach($data as $item)
        <tr class="item{{$item->ID}}">
            <td>{{$item->ID}}</td>
            <td>{{$item->Firstname}}</td>
            <td><button class="edit-modal btn btn-info" data-id="{{$item->ID}}"
                        data-name="{{$item->Firstname}}">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
                <button class="delete-modal btn btn-danger" data-id="{{$item->ID}}"
                        data-name="{{$item->Firstname}}">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button></td>
        </tr>
    @endforeach
</table>
</div>

</body>
</html>

