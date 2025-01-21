<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center my-4">Student Management System</h1>

    <a href="{{ route('student.create') }}" class="btn btn-success mb-3">Add New Student</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Student List</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Standard</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Father's Name</th>
                <th>Father's Mobile</th>
                <th>Email</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->standard }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $student->father_mobile }}</td>
                    <td>{{ $student->email }}</td>
                    <td><a href="{{route('student.edit',$student->id)}}" class="btn btn-primary bt-sm">Edit</a></td>
                    <td><form action="{{route('student.delete',$student->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>

                    </form></td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
