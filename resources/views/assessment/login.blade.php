<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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

      <section class="bg-white overflow-hidden"><div class="flex flex-wrap w-full">
        <div class="w-full">
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
                    <h2 class="mb-4 text-5xl font-bold font-heading tracking-px-n leading-tight">Clinican Login</h2>
                    <p class="mb-9 text-gray-600 font-medium leading-relaxed">Portal</p>
                  </div>

                  <div class="md:max-w-sm">
                    <p style="color:red" class="mb-9 text-gray-600 font-medium leading-relaxed">{{$loginfailed}}</p>
                  </div>

                  <form class="md:max-w-lg" action="clientsubmit" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <label class="block mb-5">
                      <input class="px-4 py-3.5 w-full text-gray-500 font-medium placeholder-gray-500 bg-white outline-none border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" id="email" type="text" name="email" placeholder="Enter Email"></label>

                    <label class="block mb-5">
                      <input class="px-4 py-3.5 w-full text-gray-500 font-medium placeholder-gray-500 bg-white outline-none border border-gray-300 rounded-lg focus:ring focus:ring-indigo-300" id="signInInput3-2" type="password" name="password" placeholder="Enter Password"></label>
                      <div class="g-recaptcha" data-sitekey="6LcAWJwmAAAAAHpO98k8Pen2JdH6idlJb0MrObM0"></div>
                      <div class="flex flex-wrap justify-between -m-2 mb-4">

                        <div class="w-auto p-2"><button type="button" id="btnSend" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">Resend Password?</button></div>
                      </div>
                    <button class="mb-6 py-4 px-9 w-full text-white font-semibold border border-indigo-700 rounded-xl focus:ring focus:ring-indigo-300 bg-indigo-600 hover:bg-indigo-700 transition ease-in-out duration-200" type="submit">Sign In</button>


                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
      </section>
    </div>
</body>
 <script src="https://www.google.com/recaptcha/api.js"></script>
<script>
$("#btnSend").click(function(){
  email=$("#email").val()
  if(email=="")
  {
    Swal.fire("Please enter the email","","info")
    return
  }
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'sendPassword',
     data: {email:email},
     success:function(data) {
     if(data=="")
     {
       Swal.fire("Password has been sent to your Email","","success")
     }

     }
  });
})


</script>
</html>
