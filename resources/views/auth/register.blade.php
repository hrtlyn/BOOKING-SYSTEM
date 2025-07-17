<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Booking - Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Instrument Sans', sans-serif;
    }
  </style>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col justify-center items-center px-4">

  <div class="text-center mb-12">
    <h1 class="text-5xl font-bold text-blue-500 mb-4">Booking</h1>
    <p class="text-2xl text-blue-700">Book events, appointments, and more — fast and easy.</p>
  </div>

  <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">

    <!-- Status message here if needed -->

    <form action="/register" method="POST" class="space-y-6">

      <div>
        <label for="name" class="block text-sm font-medium text-blue-600 mb-1">Name</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Your full name"
          required
          class="w-full border border-blue-200 rounded-md p-2 shadow-sm placeholder-blue-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-blue-900"
        />
        <!-- Error example -->
        <!-- <p class="text-red-500 text-xs mt-1">Name is required.</p> -->
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-blue-600 mb-1">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="you@example.com"
          required
          class="w-full border border-blue-200 rounded-md p-2 shadow-sm placeholder-blue-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-blue-900"
        />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-blue-600 mb-1">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          required
          class="w-full border border-blue-200 rounded-md p-2 shadow-sm placeholder-blue-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-blue-900"
        />
      </div>

      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-blue-600 mb-1">Confirm Password</label>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          required
          class="w-full border border-blue-200 rounded-md p-2 shadow-sm placeholder-blue-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-blue-900"
        />
      </div>

      <div class="flex items-center justify-between">
        <a href="/login" class="text-sm text-blue-600 hover:text-blue-800 underline">Already registered?</a>
        <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white font-semibold py-2 px-5 rounded-md transition">
          Register
        </button>
      </div>

    </form>

  </div>
</body>
</html>
