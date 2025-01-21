<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Add New Student</h1>

        <form id="studentForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-control" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="standard" class="form-label">Standard</label>
                <input type="text" id="standard" name="standard" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="form-control" max="{{ \Carbon\Carbon::today()->toDateString() }}" required>
            </div>

            <div class="mb-3">
                <label for="father_name" class="form-label">Father's Name</label>
                <input type="text" id="father_name" name="father_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="father_mobile" class="form-label">Father's Mobile</label>
                <input type="text" id="father_mobile" name="father_mobile" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#studentForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('student.store') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                    if (response.success) {
                        
                        window.location.href = "{{ route('student.index') }}";
                    }
                },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = '';
                        for (var field in errors) {
                            errorMessages += errors[field][0] + '\n';
                        }
                        alert(errorMessages);
                    }
                });
            });
        });
    </script>
</body>
</html>
