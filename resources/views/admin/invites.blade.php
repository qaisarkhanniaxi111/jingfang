<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<script>
var active="invites"

$("#"+active).css("background-color","blue")
$("#"+active+"_a").css("color","white")

</script>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Clinican</h5>
        <button type="button" id="btnclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-6">
          <input type="hidden" id="hiddenid">
    <label class="form-label" for="">First Name</label>
    <input class="form-control" id="firstname" type="text" name="field-name" placeholder="Enter First Name"></div>
    <div class="mb-6">
    <label class="form-label" for="">Last Name</label>
    <input class="form-control" id="lastname" type="text" name="field-name" placeholder="Enter Last Name"></div>
    <div class="mb-6">
    <label class="form-label" for="">Email Address</label>
    <input class="form-control" id="emailaddress" type="text" name="field-name" placeholder="Enter Email Address"></div>
    <div class="mb-6">
    <label class="form-label" for="">Status</label>
    <select class="form-select" id="status"><option>enable</option><option>disable</option></select></div>

      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="actionnew" class="btn btn-primary"><span id="whattodo">Invite</span></button>
      </div>
    </div>
  </div>
</div>

<div class="mx-auto ms-lg-80">

<section>
  <div class="py-8 px-6">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <div class="col-12 col-lg-auto mb-4 mb-lg-0">
        <div class="d-flex align-items-center">
          <h4 class="mb-0 me-2">Clinicans</h4>
          <span class="badge bg-primary rounded-pill small" id="total">{{count($invites)}} Total</span>
        </div>
      </div>
      <div class="col-12 col-lg-auto d-flex align-items-center">
        <div class="input-group me-4 pe-4 bg-white rounded border">
          <input class="form-control border-0" id="searchme" type="text" placeholder="Type to search...">
          <button class="btn p-0" type="button">
            <svg width="18" height="18" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.0921 16.9083L15.0004 13.8417C16.2005 12.3453 16.7817 10.4461 16.6244 8.53441C16.4672 6.62274 15.5835 4.84398 14.155 3.56386C12.7265 2.28375 10.8619 1.59958 8.94451 1.65205C7.02711 1.70452 5.20268 2.48963 3.84636 3.84594C2.49004 5.20226 1.70493 7.02669 1.65247 8.94409C1.6 10.8615 2.28416 12.7261 3.56428 14.1546C4.84439 15.583 6.62316 16.4668 8.53482 16.624C10.4465 16.7812 12.3457 16.2001 13.8421 15L16.9087 18.0667C16.9862 18.1448 17.0784 18.2068 17.1799 18.2491C17.2815 18.2914 17.3904 18.3132 17.5004 18.3132C17.6104 18.3132 17.7193 18.2914 17.8209 18.2491C17.9224 18.2068 18.0146 18.1448 18.0921 18.0667C18.2423 17.9113 18.3262 17.7036 18.3262 17.4875C18.3262 17.2714 18.2423 17.0637 18.0921 16.9083ZM9.16708 15C8.01335 15 6.88554 14.6579 5.92625 14.0169C4.96696 13.3759 4.21929 12.4649 3.77778 11.399C3.33627 10.3331 3.22075 9.16019 3.44583 8.02863C3.67091 6.89708 4.22648 5.85767 5.04229 5.04187C5.85809 4.22606 6.89749 3.67049 8.02905 3.44541C9.1606 3.22033 10.3335 3.33585 11.3994 3.77736C12.4653 4.21887 13.3763 4.96654 14.0173 5.92583C14.6583 6.88512 15.0004 8.01293 15.0004 9.16666C15.0004 10.7138 14.3858 12.1975 13.2919 13.2914C12.1979 14.3854 10.7142 15 9.16708 15Z" fill="#382CDD"></path>
            </svg>
          </button>
        </div>

        <button class="flex-shrink-0 btn btn-primary d-flex align-items-center" id="create" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <span class="d-inline-block me-2 text-primary-light">
            <svg viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 16px;height: 16px">
              <path d="M12.6667 1.33334H3.33333C2.19999 1.33334 1.33333 2.20001 1.33333 3.33334V12.6667C1.33333 13.8 2.19999 14.6667 3.33333 14.6667H12.6667C13.8 14.6667 14.6667 13.8 14.6667 12.6667V3.33334C14.6667 2.20001 13.8 1.33334 12.6667 1.33334ZM10.6667 8.66668H8.66666V10.6667C8.66666 11.0667 8.4 11.3333 8 11.3333C7.6 11.3333 7.33333 11.0667 7.33333 10.6667V8.66668H5.33333C4.93333 8.66668 4.66666 8.40001 4.66666 8.00001C4.66666 7.60001 4.93333 7.33334 5.33333 7.33334H7.33333V5.33334C7.33333 4.93334 7.6 4.66668 8 4.66668C8.4 4.66668 8.66666 4.93334 8.66666 5.33334V7.33334H10.6667C11.0667 7.33334 11.3333 7.60001 11.3333 8.00001C11.3333 8.40001 11.0667 8.66668 10.6667 8.66668Z" fill="currentColor"></path>
            </svg>
          </span>
          <span>Add New</span>
        </button>
      </div>
    </div>
  </div>
</section>
<section class="py-8"><div class="container">
  <div class="px-4 pb-4 mb-6 bg-white rounded shadow">
    <div class="table-responsive">
      <table class="table mb-0 table-borderless table-striped small"><thead><tr class="text-secondary"><th class="pt-4 pb-3 px-6">First Name</th><th class="pt-4 pb-3 px-6">Last Name</th><th class="pt-4 pb-3 px-6">Email Address</th><th class="pt-4 pb-3 px-6">Status</th></tr></thead><tbody id="tb">
        @foreach($invites as $g)
        <tr id="row{{$g->id}}">
        <td class="py-5 px-6" id="firstname{{$g->id}}">{{$g->firstname}}</td>
        <td class="py-5 px-6" id="lastname{{$g->id}}">{{$g->lastname}}</td>
        <td class="py-5 px-6" id="emailaddress{{$g->id}}">{{$g->email}}</td>
      <td>
        @if($g->status=="e")
        <label class="switch">
   <input type="checkbox" id="myCheckbox{{$g->id}}" checked onchange="toggleSwitch({{$g->id}})">
   <span class="slider round"></span>
 </label>
 @else
 <label class="switch">
<input type="checkbox" id="myCheckbox{{$g->id}}" onchange="toggleSwitch({{$g->id}})">
<span class="slider round"></span>
</label>
 @endif
</td>
    </tr>
        @endforeach
      </tbody></table></div>
  </div>
  </div>
</section>
<script>
$("#create").click(function(){
  $("#whattodo").text("Invite")
})

$("#actionnew").click(function(){
  firstname=$("#firstname").val()
  lastname=$("#lastname").val()
  emailaddress=$("#emailaddress").val()
  status=$("#status").val()

  if(firstname=="")
  {
    Swal.fire('Please Enter the First Name!','','error')
    return
  }
  if(emailaddress=="")
  {
    Swal.fire('Please Enter the Email Address!','','error')
    return
  }

  var action=$("#whattodo").text()

  if(action=="Invite")
  {
  add(firstname,lastname,emailaddress,status)
  }


$("#close").click(function(){
  $("#firstname").val("")
  $("#lastname").val("")
  $("#emailaddress").val("")

  $("#hiddenid").val("")
})

$("#btnclose").click(function(){
  $("#firstname").val("")
  $("#lastname").val("")
  $("#emailaddress").val("")
  $("#hiddenid").val("")
})
});

function add(firstname,lastname,emailaddress,status)
{
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'addInvite',
     data: {firstname:firstname,lastname:lastname,emailaddress:emailaddress,status:status},
     success:function(data) {

     $("#tb").append('<tr id=\"row'+data+'\">\
     <td class="py-5 px-6" id=\"firstname'+data+'\">'+firstname+'</td>\
     <td class="py-5 px-6" id=\"lastname'+data+'\">'+lastname+'</td>\
     <td class="py-5 px-6" id=\"emailaddress'+data+'\">'+emailaddress+'</td>\
     <td class="py-5 px-6" id=\"status'+data+'\"><label class="switch"><input type="checkbox" id="myCheckbox'+data+'" checked onchange="toggleSwitch('+data+')"><span class="slider round"></span></label></td>\
     <td class="py-5 px-6">\
             </tr>')

             total=$("#total").text()
             var a=total.split(" ")[0]
             a=parseInt(a)+1
             $("#total").text(a+" Total")

             $("#exampleModal").modal('toggle')

             Swal.fire('Invitation Sent!','','success')
             $("#firstname").val("")
             $("#lastname").val("")
             $("#emailaddress").val("")

     }
  });
}


function toggleSwitch(id) {
  var checkbox = document.getElementById("myCheckbox"+id);
  status=""
  if (checkbox.checked) {
    // Checkbox is checked, perform action for "ON"
    status="e"
  } else {
    // Checkbox is not checked, perform action for "OFF"
    status="d"
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'changestatus',
     data: {id:id,status:status},
     success:function(data) {
     
     }
  });
}


</script>
</div>
