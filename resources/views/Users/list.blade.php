<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
</head>
<body>
    <h1>User List:</h1>
    <a href="{{route('user.registerview')}}">Create User</a>
    <div>
        @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <th>
                    <img src="http://localhost:8000/uploads/{{$user->image}}" style="width:100%; max-width:200px;">
                </th>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{route('user.edit', ['user' => $user])}}">
                        Edit
                    </a>
                </td>
                <td>
                    <form method="post" action="{{route('user.destroy', ['user' => $user])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
