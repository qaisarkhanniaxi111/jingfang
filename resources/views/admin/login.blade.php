<!DOCTYPE html>
<html lang="en">
<head>
    <title>(Admin Account) JingFang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.cdnfonts.com/css/general-sans?styles=135312,135310,135313,135303" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/tailwind.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="shuffle-for-tailwind.png">
    <script src="js/main.js"></script>


</head>
<body class="antialiased bg-body text-body font-body">
    <div class="">

      <section class="bg-white overflow-hidden"><div class="flex flex-wrap -m-8">
        <div class="w-full md:w-1/2 p-8">
          <div class="container px-4 mx-auto">
            <div class="flex flex-wrap">
              <div class="w-full">
                <div class="md:max-w-lg mx-auto pt-16 md:pb-24">
                  <div class="flex flex-wrap items-center justify-between -m-2 mb-24">
                    <div class="w-auto p-2">
                      <a class="inline-block" href="#">
                        <img src="images/cars.jpeg" alt="" width="140px" height="100px" class="ty"></a>
                    </div>
                  </div>
                  <div class="md:max-w-sm">
                    <h2 class="mb-4 text-5xl font-bold font-heading tracking-px-n leading-tight">Admin Login</h2>
                    <p class="mb-9 text-gray-600 font-medium leading-relaxed">Manage Backend using Admin Account</p>
                  </div>

                  <div class="md:max-w-sm">
                    <p style="color:red" class="mb-9 text-gray-600 font-medium leading-relaxed">{{$loginfailed}}</p>
                  </div>

                  <form class="md:max-w-lg" action="loginsubmit" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    @error('username')
                    <p style="color:red" class="mb-9 text-gray-600 font-medium leading-relaxed">{{$message}}</p>
                    @enderror
                    <label class="block mb-5">
                      <input class="px-4 py-3.5 w-full text-gray-500 font-medium placeholder-gray-500 bg-white outline-none border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" id="signInInput3-1" type="text" name="username" placeholder="Username"></label>
                      @error('password')
                      <p style="color:red" class="mb-9 text-gray-600 font-medium leading-relaxed">{{$message}}</p>
                      @enderror
                    <label class="block mb-5">
                      <input class="px-4 py-3.5 w-full text-gray-500 font-medium placeholder-gray-500 bg-white outline-none border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" id="signInInput3-2" type="password" name="password" placeholder="********"></label>

                        <div class="w-auto p-2">
                         <div class="g-recaptcha" data-sitekey="6LeGza4mAAAAAFGddamsqno9fmeAK9Mc8nvA27ec"></div>
                        </div>
                    <div class="flex flex-wrap justify-between -m-2 mb-4">
                      <div class="w-auto p-2">
                        <div class="flex items-center">
                          <input class="w-4 h-4" id="default-checkbox" type="checkbox" value=""><label class="ml-2 text-sm text-gray-900 font-medium" for="default-checkbox">Remember Me</label>
                        </div>
                      </div>
                      <div class="w-auto p-2"><a class="text-sm text-indigo-600 hover:text-indigo-700 font-medium" href="#">Forgot Password?</a></div>
                    </div>
                    <button class="mb-6 py-4 px-9 w-full text-white font-semibold border border-indigo-700 rounded-xl focus:ring focus:ring-indigo-300 bg-indigo-600 hover:bg-indigo-700 transition ease-in-out duration-200" type="submit">Sign In</button>


                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/2 p-8">
          <div class="flex flex-col justify-center h-full bg-indigo-600">
            <div class="p-16 text-center">
              <img class="mx-auto transform hover:scale-105 transition ease-in-out duration-1000" src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?crop=entropy&amp;cs=tinysrgb&amp;fm=jpg&amp;ixid=MnwzMzIzMzB8MHwxfHNlYXJjaHwxfHxjYXJzfGVufDB8fHx8MTY2ODQ2MDIwNQ&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1920" alt=""><h2 class="mb-5 text-5xl text-white font-semibold tracking-px-n leading-tight">Pikes Peak Auto</h2>
              <p class="mb-24 text-lg text-white text-opacity-80 font-medium leading-normal md:max-w-md mx-auto"></p>
              <div class="flex flex-wrap justify-center items-center -m-1.5">
                <div class="w-auto p-1.5"><a class="inline-block w-2 h-2 bg-indigo-800 rounded-full" href="#"></a></div>
                <div class="w-auto p-1.5"><a class="inline-block w-2 h-2 bg-white rounded-full" href="#"></a></div>
                <div class="w-auto p-1.5"><a class="inline-block w-2 h-2 bg-indigo-800 rounded-full" href="#"></a></div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
    </div>
</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
$("#workers").css("background-color","blue")
$("#packages").css("background-color","white")
</script>
</html>
