<script>
var active="fillsurveys"

$("#"+active).css("background-color","blue")
$("#"+active+"_a").css("color","white")

</script>

<input type="hidden" id="invitationid">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fill Survey</h5>
        <button type="button" id="btnclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-6">
          <input type="hidden" id="invitationid">
    <label class="form-label" for="">Top Formula matches the patient</label>
    <select class="form-select" id="topformula"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></div>
    <div class="mb-6">
    <label class="form-label" for="">Second Formula matches the patient</label>
    <select class="form-select" id="secondformula"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></div>
    <div class="mb-6">
    <label class="form-label" for="">Third Formula matches the patient</label>
    <select class="form-select" id="thirdformula"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></div>
    <div class="mb-6">
    <label class="form-label" for="">I found these results clinically useful</label>
    <select class="form-select" id="resultsuseful"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></div>

      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="actionnew" class="btn btn-primary"><span id="whattodo">Submit</span></button>
      </div>
    </div>
  </div>
</div>

<div class="container">
<section>
  <div class="py-8 px-6">
<div class="table-responsive">

<table class="table mb-0 table-borderless table-striped small">
<thead><tr class="text-secondary"><th class="pt-4 pb-3 px-6">First Name</th><th class="pt-4 pb-3 px-6">Last Name</th><th class="pt-4 pb-3 px-6">Email Address</th><th class="pt-4 pb-3 px-6">Invite Date</th><th class="pt-4 pb-3 px-6">Attempt Date</th><th class="pt-4 pb-3 px-6">Attempted</th><th class="pt-4 pb-3 px-6">Status</th><th class="pt-4 pb-3 px-6">Result</th><th class="pt-4 pb-3 px-6">Fill Survey</th></thead>
<tbody id="clientrows">
@foreach($invites as $iv)
<tr id="{{$iv->invitationid}}" class="text-secondary">
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}">{{$iv->firstname}}</td>
<td class="pt-4 pb-3 px-6" id="lastname{{$iv->invitationid}}">{{$iv->lastname}}</td>
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}">{{$iv->email}}</td>
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}">{{$iv->invitedate}}</td>
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}">{{$iv->attemptdate}}</td>
@if($iv->attempt=="n")
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}">Not Attempted</td>
@else
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}">Attempted</td>
@endif
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}">{{$iv->stage}}</td>
@if($iv->stage=="Closed")
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}"><a target="_blank" href="viewResultAdmin?id={{$iv->invitationid}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="green" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
</a></td>
@else
<td class="pt-4 pb-3 px-6" id="firstname{{$iv->invitationid}}">Not Completed</td>
@endif

<td class="pt-4 pb-3 px-6">
  <button class="btn p-0 me-2" onclick="editme({{$iv->invitationid}})">
    <svg width="18" onclick="editme({{$iv->invitationid}})" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4999 9C16.2789 9 16.0669 9.0878 15.9106 9.24408C15.7544 9.40036 15.6666 9.61232 15.6666 9.83333V14.8333C15.6666 15.0543 15.5788 15.2663 15.4225 15.4226C15.2662 15.5789 15.0542 15.6667 14.8332 15.6667H3.16656C2.94555 15.6667 2.73359 15.5789 2.57731 15.4226C2.42103 15.2663 2.33323 15.0543 2.33323 14.8333V3.16667C2.33323 2.94565 2.42103 2.73369 2.57731 2.57741C2.73359 2.42113 2.94555 2.33333 3.16656 2.33333H8.16657C8.38758 2.33333 8.59954 2.24554 8.75582 2.08926C8.9121 1.93298 8.9999 1.72101 8.9999 1.5C8.9999 1.27899 8.9121 1.06702 8.75582 0.910744C8.59954 0.754464 8.38758 0.666667 8.16657 0.666667H3.16656C2.50352 0.666667 1.86764 0.930059 1.3988 1.3989C0.929957 1.86774 0.666565 2.50363 0.666565 3.16667V14.8333C0.666565 15.4964 0.929957 16.1323 1.3988 16.6011C1.86764 17.0699 2.50352 17.3333 3.16656 17.3333H14.8332C15.4963 17.3333 16.1322 17.0699 16.601 16.6011C17.0698 16.1323 17.3332 15.4964 17.3332 14.8333V9.83333C17.3332 9.61232 17.2454 9.40036 17.0892 9.24408C16.9329 9.0878 16.7209 9 16.4999 9ZM3.9999 9.63333V13.1667C3.9999 13.3877 4.0877 13.5996 4.24398 13.7559C4.40026 13.9122 4.61222 14 4.83323 14H8.36657C8.47624 14.0006 8.58496 13.9796 8.68649 13.9381C8.78802 13.8967 8.88037 13.8356 8.95823 13.7583L14.7249 7.98333L17.0916 5.66667C17.1697 5.5892 17.2317 5.49703 17.274 5.39548C17.3163 5.29393 17.3381 5.18501 17.3381 5.075C17.3381 4.96499 17.3163 4.85607 17.274 4.75452C17.2317 4.65297 17.1697 4.5608 17.0916 4.48333L13.5582 0.908333C13.4808 0.830226 13.3886 0.768231 13.287 0.725924C13.1855 0.683617 13.0766 0.661835 12.9666 0.661835C12.8566 0.661835 12.7476 0.683617 12.6461 0.725924C12.5445 0.768231 12.4524 0.830226 12.3749 0.908333L10.0249 3.26667L4.24156 9.04167C4.16433 9.11953 4.10323 9.21188 4.06176 9.31341C4.02029 9.41494 3.99926 9.52366 3.9999 9.63333ZM12.9666 2.675L15.3249 5.03333L14.1416 6.21667L11.7832 3.85833L12.9666 2.675ZM5.66656 9.975L10.6082 5.03333L12.9666 7.39167L8.0249 12.3333H5.66656V9.975Z" fill="#382CDD"></path></svg></button>
</td>
</tr>
  @endforeach
</tbody></table>
</div>
</section>
</div>

<script>
function editme(id)
{
  $("#invitationid").val(id)
$("#exampleModal").modal("toggle")
}

$("#actionnew").click(function(){
  var topformula=$("#topformula").val()
  var secondformula=$("#secondformula").val()
  var thirdformula=$("#thirdformula").val()
  var resultsuseful=$("#resultsuseful").val()
  var invitationid=$("#invitationid").val()


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'s',
     data: {invitationid:invitationid,topformula:topformula,secondformula:secondformula,thirdformula:thirdformula,resultsuseful:resultsuseful},
     success:function(data) {
       $("#"+invitationid).remove()
       $("#topformula").val("1")
       $("#secondformula").val("1")
       $("#thirdformula").val("1")
       $("#resultsuseful").val("1")
       $("#invitationid").val("1")
       $("#exampleModal").modal("toggle")
       Swal.fire("Survey Results stored","","success")
     }
  });
})

</script>
