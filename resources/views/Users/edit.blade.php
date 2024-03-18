<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
</head>

<body>
    <h1>Edit an User</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>Error: {{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{ route('user.update', ['user' => $user]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ $user->name }}">
        </div>
        <div>
            <label>E-mail</label>
            <input type="text" name="email" placeholder="E-mail" value="{{ $user->email }}">
        </div>
        <div>
            <label>Image</label>
            <input type="file" name="image" placeholder="Image" value="{{ $user->image }}">
            <input disabled type="text" value="{{ $user->image }}">
        </div>
        <div style="margin-top: 10px;margin-bottom: 10px;">
            <input type="submit" value="Update the user">
        </div>
    </form>
</body>

</html>
