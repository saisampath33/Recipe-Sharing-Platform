<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('/images/login.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }

        .login-container {
            margin-top: 80px;
            padding: 50px 40px; /* Increased padding */
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            color: #fff;
            width: 100%;
            max-width: 550px; /* Increased width */
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
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.7);
        }

        .btn-primary {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            background: linear-gradient(to right, #20c997, #0d9488); /* Changed color to teal-green */
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #0d9488, #0f766e); /* Hover effect */
        }

        .register-link {
            font-size: 14px;
            color: #000;
        }

        .register-link a {
            color: #ffc107;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 8px;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">
                <div class="login-container">
                    <h3 class="text-center mb-4">Login</h3>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <p class="text-center mt-3 register-link">
                        Don't have an account? <a href="<?php echo e(route('register')); ?>">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\Users\Nishant Kumar\OneDrive\Desktop\LaravelPro\recipe_maker\resources\views/auth/login.blade.php ENDPATH**/ ?>