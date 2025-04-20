<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('/images/register_bg.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            margin-top: 80px;
            padding: 50px 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            color: #fff;
            width: 100%;
            max-width: 550px;
        }

        h3 {
            font-weight: 600;
            color: #000;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.4);
        }

        label {
            font-weight: 500;
            color: #000;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.85);
            color: #000;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.7);
        }

        .btn-success {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            background: linear-gradient(to right, #20c997, #0d9488); /* Teal-green gradient */
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(to right, #0d9488, #0f766e);
        }

        .alert {
            border-radius: 8px;
        }

        p {
            font-size: 14px;
            color: #000;
        }

        p a {
            color: #ffc107;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            <div class="register-container">
                <h3 class="text-center mb-4">Register</h3>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>

                <p class="text-center mt-3">
                    Already have an account? <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
