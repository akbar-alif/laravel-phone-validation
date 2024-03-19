<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Number Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <!-- Display success message if it exists -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Add Phone Numbers</h2>

    <form action="{{ route('phone-number.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Phone Title</label>
            <input type="text" class="form-control" id="title" name="title">

            <!-- Display validation errors if any -->
            @error('title')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="number" name="number">

            <!-- Display validation errors if any -->
            @error('number')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <br/>
    <!-- Display existing phone numbers -->
    @if($phoneNumbers->isNotEmpty())
        <h2>Phone Numbers</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Number</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($phoneNumbers as $phoneNumber)
                <tr>
                    <td>{{ $phoneNumber->id }}</td>
                    <td>{{ $phoneNumber->title }}</td>
                    <td>{{ $phoneNumber->number }}</td>
                    <td>
                        <!-- Delete button with form for each phone number -->
                        <form action="{{ route('phone-number.destroy', $phoneNumber->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No existing phone numbers found.</p>
    @endif
</div>

</body>
</html>
