<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Sign In
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="flex items-center justify-center min-h-screen bg-gradient-to-b from-white to-blue-100">
  <div class="bg-white rounded-lg shadow-lg flex w-full max-w-4xl">
   <div class="w-1/2 p-8 bg-blue-100 rounded-l-lg flex items-center justify-center">
    <img alt="Illustration of a woman interacting with a login interface and a small rocket" class="w-3/4" height="300" src="https://storage.googleapis.com/a1aa/image/Oxk6eRZ9aHBQbjNiAbylc-_Ch-y4IchbbE6Z6aGBGd8.jpg" width="300"/>
   </div>
   <div class="w-1/2 p-8 flex flex-col justify-center">
    <h2 class="text-2xl font-bold text-center text-blue-900 mb-8">
     SIGN IN
    </h2>
    <form class="space-y-6">
     <div>
      <label class="block text-sm font-medium text-gray-700" for="email">
       Email
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="email" type="email"/>
     </div>
     <div>
      <label class="block text-sm font-medium text-gray-700" for="password">
       Password
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="password" type="password"/>
     </div>
     <div class="flex items-center justify-between">
      <div class="flex items-center">
       <input class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" id="remember-me" type="checkbox"/>
       <label class="ml-2 block text-sm text-gray-900" for="remember-me">
        Remember me
       </label>
      </div>
      <div class="text-sm">
       <a class="font-medium text-blue-600 hover:text-blue-500" href="#">
        Forgot Password?
       </a>
      </div>
     </div>
     <div>
      <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-900 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" type="submit">
       SIGN IN
      </button>
     </div>
    </form>
   </div>
  </div>
 </body>
</html>
