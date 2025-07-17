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
<body class="bg-gradient-to-br from-blue-100 to-blue-200 min-h-screen flex flex-col justify-center items-center px-4">

  <!-- Title & Tagline -->
  <div class="text-center mb-12">
    <h1 class="text-5xl font-bold text-blue-600 drop-shadow-sm">Booking</h1>
    <p class="text-2xl text-blue-700 mt-2">Book events, appointments, and more — fast and easy.</p>
  </div>

  <!-- Card -->
  <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-8 border border-blue-100">

    <!-- Status message placeholder -->
    <!-- Replace or handle dynamically as needed -->
    <!-- <div class="mb-4 text-green-600 text-sm font-medium">Status message here</div> -->

    <!-- Form -->
    <form method="POST" action="/login" class="space-y-6">

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-blue-700">Email</label>
        <input
          type="email"
          name="email"
          id="email"
          required
          placeholder="you@example.com"
          class="mt-1 block w-full border border-blue-300 rounded-md p-3 bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-blue-400 text-blue-900"
        />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-blue-700">Password</label>
        <input
          type="password"
          name="password"
          id="password"
          required
          placeholder="********"
          class="mt-1 block w-full border border-blue-300 rounded-md p-3 bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-blue-400 text-blue-900"
        />
      </div>

      <!-- Remember Me -->
      <div class="flex items-center">
        <input
          id="remember_me"
          name="remember"
          type="checkbox"
          class="h-4 w-4 text-blue-600 border-blue-300 rounded focus:ring-blue-500"
        />
        <label for="remember_me" class="ml-2 block text-sm text-blue-600">Remember me</label>
      </div>

      <!-- Actions -->
      <div class="flex items-center justify-between">
        <a href="/password/reset" class="text-sm text-blue-600 hover:text-blue-800 underline transition">
          Forgot your password?
        </a>
        <button
          type="submit"
          class="ml-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-5 rounded-md shadow-sm transition"
        >
          Log in
        </button>
      </div>

    </form>

    <!-- Divider -->
    <hr class="my-6 border-blue-200" />

    <!-- Register CTA -->
    <div class="text-center">
      <a
        href="/register"
        class="inline-block bg-blue-300 hover:bg-blue-400 text-blue-900 font-semibold py-3 px-6 rounded-md transition"
      >
        Create New Account
      </a>
    </div>

  </div>
</body>
</html>
