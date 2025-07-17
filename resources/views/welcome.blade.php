<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Booking - Login</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font (Instrument Sans) -->
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Instrument Sans', sans-serif;
    }
  </style>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-xs px-6 flex flex-col items-center space-y-6">

    <!-- Branding -->
    <div class="text-center">
      <h1 class="text-5xl font-bold text-blue-400">Booking</h1>
      <p class="text-lg text-blue-600 mt-2">Book events, appointments, and more — fast and easy.</p>
    </div>

    <!-- Buttons -->
    <div class="w-full flex flex-col gap-4">

      <a href="/login"
        class="block text-center bg-blue-300 text-blue-900 font-semibold py-3 rounded-md hover:bg-blue-400 transition">
        Log In
      </a>

      <a href="/register"
        class="block text-center bg-blue-200 text-blue-900 font-semibold py-3 rounded-md hover:bg-blue-300 transition">
        Create New Account
      </a>

    </div>

  </div>

</body>
</html>
