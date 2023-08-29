<script>
var active="userchangepassword"

$("#"+active).css("background-color","blue")
$("#"+active+"_a").css("color","white")

</script>

<div class="container">
  <br><br>
  <div class="row">
    <div class="col-lg-2"></div>
  <div class="col-12 col-lg-6">
<div class="mb-6">
  <label class="form-label" for=""><strong>Current Password</strong></label>
  <input class="form-control" type="text" name="phonenumber" placeholder="Type Old Password" id="oldpassword">
  <div id="oldpassworderrors" style="color:red"></div>
</div>
</div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-12 col-lg-6">
<div class="mb-6">
  <label class="form-label" for=""><strong>Enter New Password</strong></label>
  <input class="form-control" type="text" name="email" placeholder="Minimum length of 10 characters, at least 1 uppercase letter, and 1 special character" id="newpassword">
  <div id="newpassworderrors" style="color:red"></div>
</div>
</div>
</div>
<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
  <button type="button" class="btn btn-primary" id="submit">Change Password</button>
  </div>
</div>
</div>

<script>
$("#submit").click(function(){
var newpassword=$('#newpassword').val()
var oldpassword=$('#oldpassword').val()
if(oldpassword=="")
{
$("#oldpassworderrors").text("Please enter old password")
return
}
else {
  $("#oldpassworderrors").text("")
}
if(isPasswordComplex(newpassword))
{
$("#newpassworderrors").text("")

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
  }
});
$.ajax({
   type:'post',
   url:'userchangepassword2',
   data: {oldpassword:oldpassword,newpassword:newpassword},
   success:function(data) {
   if(data=="")
   {
     $('#newpassword').val("")
     $('#oldpassword').val("")
     Swal.fire("Password changed successfully","","success")
   }
   else {
     Swal.fire("Old password is wrong","","error")
   }
   }
});
}
else {
  $("#newpassworderrors").text("Minimum length of 10 characters, at least 1 uppercase letter, and 1 special character")
}
})

function isPasswordComplex(password) {
  // Minimum length of 10 characters, at least 1 uppercase letter, and 1 special character
  var passwordRegex = /^(?=.*[A-Z])(?=.*[\W_]).{10,}$/;
  return passwordRegex.test(password);
}
</script>
