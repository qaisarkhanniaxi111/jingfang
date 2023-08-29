<script>
var active="results"

$("#"+active).css("background-color","blue")
$("#"+active+"_a").css("color","white")

</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
        <button type="button" id="btnclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-6">
          <input type="hidden" id="hiddenid">
    <label class="form-label" for="">Description</label>
    <textarea class="form-control" id="description" type="text" name="field-name" placeholder="Enter Question Description"></textarea></div>

    <div class="mb-6">
      <input type="hidden" id="hiddenid">
<label class="form-label" for="">Options <span style="font-size:12px">(Click here if you want to switch between False and N/A)</span> <button id="changelabels" class="btn p-0 me-2">
                <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4999 9C16.2789 9 16.0669 9.0878 15.9106 9.24408C15.7544 9.40036 15.6666 9.61232 15.6666 9.83333V14.8333C15.6666 15.0543 15.5788 15.2663 15.4225 15.4226C15.2662 15.5789 15.0542 15.6667 14.8332 15.6667H3.16656C2.94555 15.6667 2.73359 15.5789 2.57731 15.4226C2.42103 15.2663 2.33323 15.0543 2.33323 14.8333V3.16667C2.33323 2.94565 2.42103 2.73369 2.57731 2.57741C2.73359 2.42113 2.94555 2.33333 3.16656 2.33333H8.16657C8.38758 2.33333 8.59954 2.24554 8.75582 2.08926C8.9121 1.93298 8.9999 1.72101 8.9999 1.5C8.9999 1.27899 8.9121 1.06702 8.75582 0.910744C8.59954 0.754464 8.38758 0.666667 8.16657 0.666667H3.16656C2.50352 0.666667 1.86764 0.930059 1.3988 1.3989C0.929957 1.86774 0.666565 2.50363 0.666565 3.16667V14.8333C0.666565 15.4964 0.929957 16.1323 1.3988 16.6011C1.86764 17.0699 2.50352 17.3333 3.16656 17.3333H14.8332C15.4963 17.3333 16.1322 17.0699 16.601 16.6011C17.0698 16.1323 17.3332 15.4964 17.3332 14.8333V9.83333C17.3332 9.61232 17.2454 9.40036 17.0892 9.24408C16.9329 9.0878 16.7209 9 16.4999 9ZM3.9999 9.63333V13.1667C3.9999 13.3877 4.0877 13.5996 4.24398 13.7559C4.40026 13.9122 4.61222 14 4.83323 14H8.36657C8.47624 14.0006 8.58496 13.9796 8.68649 13.9381C8.78802 13.8967 8.88037 13.8356 8.95823 13.7583L14.7249 7.98333L17.0916 5.66667C17.1697 5.5892 17.2317 5.49703 17.274 5.39548C17.3163 5.29393 17.3381 5.18501 17.3381 5.075C17.3381 4.96499 17.3163 4.85607 17.274 4.75452C17.2317 4.65297 17.1697 4.5608 17.0916 4.48333L13.5582 0.908333C13.4808 0.830226 13.3886 0.768231 13.287 0.725924C13.1855 0.683617 13.0766 0.661835 12.9666 0.661835C12.8566 0.661835 12.7476 0.683617 12.6461 0.725924C12.5445 0.768231 12.4524 0.830226 12.3749 0.908333L10.0249 3.26667L4.24156 9.04167C4.16433 9.11953 4.10323 9.21188 4.06176 9.31341C4.02029 9.41494 3.99926 9.52366 3.9999 9.63333ZM12.9666 2.675L15.3249 5.03333L14.1416 6.21667L11.7832 3.85833L12.9666 2.675ZM5.66656 9.975L10.6082 5.03333L12.9666 7.39167L8.0249 12.3333H5.66656V9.975Z" fill="#382CDD"></path></svg></button></label>
<div class="mb-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="true" name="same" value="true" checked><label class="form-check-label" id="truelabel">True</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="false" name="same" value="false"><label class="form-check-label" id="falselabel" for="">False</label>
                </div>
              </div>
</div>

<div class="mb-6">
<label class="form-label" for="">Weight</label>
<select class="form-select" id="weight" type="text" name="field-name"><option></option><option>1</option></select></div>

<div class="mb-6">
<label class="form-label" for="">Priority</label>
<select class="form-select" id="priority" type="text" name="field-name"><option></option><option>1</option></select></div>

      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="actionnew" class="btn btn-primary"><span id="whattodo">Create</span></button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="mx-auto ms-lg-80">

<section class="py-8"><div class="container">

  <div class="px-4 pb-4 mb-6 bg-white rounded shadow">
    <div class="table-responsive">
      <table class="table mb-0 table-borderless table-striped small"><thead><tr class="text-secondary"><th class="pt-4 pb-3 px-6">First Name</th><th class="pt-4 pb-3 px-6">Last Name</th><th class="pt-4 pb-3 px-6">Email</th><th class="pt-4 pb-3 px-6">Attempt Date</th><th class="pt-4 pb-3 px-6">Action</th></tr></thead><tbody id="tb">
        @foreach($results as $g)
        <tr id="row{{$g->id}}">
        <td class="py-5 px-6" id="description{{$g->id}}">{{$g->firstname}}</td>
        <td class="py-5 px-6" id="options{{$g->id}}">{{$g->lastname}}</td>
        <td class="py-5 px-6" id="trueAnswer{{$g->id}}">{{$g->email}}</td>
        <td class="py-5 px-6" id="weight{{$g->id}}">{{$g->attemptdate}}</td>

        <td class="py-5 px-6">
          <a target="_blank" href="viewResultAdmin?id={{$g->id}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="green" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
</a>
                </td>
        </tr>
        @endforeach
      </tbody></table></div>
  </div>
  </div>
</section>
<script>
$("#create").click(function(){
  $("#whattodo").text("Create")
})

$("#actionnew").click(function(){
  description=$("#description").val()
  id=$("#id").val()
  maingroup=$("#maingroup").val()
  var maingroupid=maingroup.split("_")[1]
  subgroup=$("#subgroup").val()
  var subgroupid=subgroup.split("_")[1]
  var weight=$("#weight").val()
  var priority=$("#priority").val()
  var option1=$("#truelabel").text()
  var option2=$("#falselabel").text()
  var trueAnswer=""
  if($("#true").is(":checked"))
  {
    trueAnswer=option1
  }
  if($("#false").is(":checked"))
  {
    trueAnswer=option2
  }

  if(description=="")
  {
    Swal.fire('Please Enter the Question Description!','','error')
    return
  }

  var action=$("#whattodo").text()

  if(action=="Create")
  {
  add(description,maingroupid,subgroupid,option1,option2,trueAnswer,weight,priority)
  }
  else if(action=="Edit")
  {
   edit($("#hiddenid").val(),description,maingroupid,subgroupid,option1,option2,trueAnswer,weight,priority)
  }
  else if(action=="Delete")
  {
  deletee($("#hiddenid").val())
  }
  $("#name").val("")
  $("#hiddenid").val("")
  $('#exampleModal').modal('toggle')
});

$("#close").click(function(){
  $("#name").val("")
  $("#hiddenid").val("")
})

$("#btnclose").click(function(){
  $("#name").val("")
  $("#hiddenid").val("")
})

function viewme(val)
{
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'viewResultAdmin',
     data: {id:val},
     success:function(data) {
     if(data=="")
     {
       $("#row"+id).remove()
       total=$("#total").text()
       var a=total.split(" ")[0]
       a=parseInt(a)-1
       $("#total").text(a+" Total")
     }
     }
  });
}
function deleteme(val)
{
  $("#whattodo").text("Delete")
  $("#exampleModalLabel").text("Delete Question")
  $("#description").val($("#description"+val).text())
  $("#weight").val($("#weight"+val).text())
  $("#priority").val($("#priority"+val).text())
  var options=$("#options"+val).text()
  var a=options.split(",")


  $("#falselabel").text(a[1])
  var trueAnswer=$("#trueAnswer"+val).text()
  if(trueAnswer=="True")
  {
    $("true").is(":checked")
  }
  else {
    $("false").is(":checked")
  }
  $("#hiddenid").val(val)
}

function add(description,maingroupid,subgroupid,option1,option2,trueAnswer,weight,priority)
{

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'addQuestion',
     data: {description:description,maingroupid:maingroupid,subgroupid:subgroupid,option1:option1,option2:option2,trueAnswer:trueAnswer,weight:weight,priority:priority},
     success:function(data) {
     if(weight=="")
     {
       weight=0
     }
     if(priority=="")
     {
       priority=0
     }
     $("#tb").append('<tr id=\"row'+data+'\">\
     <td class="py-5 px-6" id=\"description'+data+'\">'+description+'</td>\
     <td class="py-5 px-6" id=\"options'+data+'\">'+option1+","+option2+'</td>\
     <td class="py-5 px-6" id=\"trueAnswer'+data+'\">'+trueAnswer+'</td>\
     <td class="py-5 px-6" id=\"weight'+data+'\">'+weight+'</td>\
     <td class="py-5 px-6" id=\"priority'+data+'\">'+priority+'</td>\
     <td class="py-5 px-6">\
     <button class="btn p-0 me-2" onclick=\"editme('+data+')\" data-bs-toggle="modal" data-bs-target="#exampleModal">\
     <svg  width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4999 9C16.2789 9 16.0669 9.0878 15.9106 9.24408C15.7544 9.40036 15.6666 9.61232 15.6666 9.83333V14.8333C15.6666 15.0543 15.5788 15.2663 15.4225 15.4226C15.2662 15.5789 15.0542 15.6667 14.8332 15.6667H3.16656C2.94555 15.6667 2.73359 15.5789 2.57731 15.4226C2.42103 15.2663 2.33323 15.0543 2.33323 14.8333V3.16667C2.33323 2.94565 2.42103 2.73369 2.57731 2.57741C2.73359 2.42113 2.94555 2.33333 3.16656 2.33333H8.16657C8.38758 2.33333 8.59954 2.24554 8.75582 2.08926C8.9121 1.93298 8.9999 1.72101 8.9999 1.5C8.9999 1.27899 8.9121 1.06702 8.75582 0.910744C8.59954 0.754464 8.38758 0.666667 8.16657 0.666667H3.16656C2.50352 0.666667 1.86764 0.930059 1.3988 1.3989C0.929957 1.86774 0.666565 2.50363 0.666565 3.16667V14.8333C0.666565 15.4964 0.929957 16.1323 1.3988 16.6011C1.86764 17.0699 2.50352 17.3333 3.16656 17.3333H14.8332C15.4963 17.3333 16.1322 17.0699 16.601 16.6011C17.0698 16.1323 17.3332 15.4964 17.3332 14.8333V9.83333C17.3332 9.61232 17.2454 9.40036 17.0892 9.24408C16.9329 9.0878 16.7209 9 16.4999 9ZM3.9999 9.63333V13.1667C3.9999 13.3877 4.0877 13.5996 4.24398 13.7559C4.40026 13.9122 4.61222 14 4.83323 14H8.36657C8.47624 14.0006 8.58496 13.9796 8.68649 13.9381C8.78802 13.8967 8.88037 13.8356 8.95823 13.7583L14.7249 7.98333L17.0916 5.66667C17.1697 5.5892 17.2317 5.49703 17.274 5.39548C17.3163 5.29393 17.3381 5.18501 17.3381 5.075C17.3381 4.96499 17.3163 4.85607 17.274 4.75452C17.2317 4.65297 17.1697 4.5608 17.0916 4.48333L13.5582 0.908333C13.4808 0.830226 13.3886 0.768231 13.287 0.725924C13.1855 0.683617 13.0766 0.661835 12.9666 0.661835C12.8566 0.661835 12.7476 0.683617 12.6461 0.725924C12.5445 0.768231 12.4524 0.830226 12.3749 0.908333L10.0249 3.26667L4.24156 9.04167C4.16433 9.11953 4.10323 9.21188 4.06176 9.31341C4.02029 9.41494 3.99926 9.52366 3.9999 9.63333ZM12.9666 2.675L15.3249 5.03333L14.1416 6.21667L11.7832 3.85833L12.9666 2.675ZM5.66656 9.975L10.6082 5.03333L12.9666 7.39167L8.0249 12.3333H5.66656V9.975Z" fill="#382CDD"></path></svg></button>\
     <button class="btn p-0" onclick=\"deleteme('+data+')\" data-bs-toggle="modal" data-bs-target="#exampleModal">\
     <svg  width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.33333 15C8.55435 15 8.76631 14.9122 8.92259 14.7559C9.07887 14.5996 9.16667 14.3877 9.16667 14.1667V9.16666C9.16667 8.94564 9.07887 8.73368 8.92259 8.5774C8.76631 8.42112 8.55435 8.33332 8.33333 8.33332C8.11232 8.33332 7.90036 8.42112 7.74408 8.5774C7.5878 8.73368 7.5 8.94564 7.5 9.16666V14.1667C7.5 14.3877 7.5878 14.5996 7.74408 14.7559C7.90036 14.9122 8.11232 15 8.33333 15ZM16.6667 4.99999H13.3333V4.16666C13.3333 3.50362 13.0699 2.86773 12.6011 2.39889C12.1323 1.93005 11.4964 1.66666 10.8333 1.66666H9.16667C8.50363 1.66666 7.86774 1.93005 7.3989 2.39889C6.93006 2.86773 6.66667 3.50362 6.66667 4.16666V4.99999H3.33333C3.11232 4.99999 2.90036 5.08779 2.74408 5.24407C2.5878 5.40035 2.5 5.61231 2.5 5.83332C2.5 6.05434 2.5878 6.2663 2.74408 6.42258C2.90036 6.57886 3.11232 6.66666 3.33333 6.66666H4.16667V15.8333C4.16667 16.4964 4.43006 17.1322 4.8989 17.6011C5.36774 18.0699 6.00363 18.3333 6.66667 18.3333H13.3333C13.9964 18.3333 14.6323 18.0699 15.1011 17.6011C15.5699 17.1322 15.8333 16.4964 15.8333 15.8333V6.66666H16.6667C16.8877 6.66666 17.0996 6.57886 17.2559 6.42258C17.4122 6.2663 17.5 6.05434 17.5 5.83332C17.5 5.61231 17.4122 5.40035 17.2559 5.24407C17.0996 5.08779 16.8877 4.99999 16.6667 4.99999ZM8.33333 4.16666C8.33333 3.94564 8.42113 3.73368 8.57741 3.5774C8.73369 3.42112 8.94565 3.33332 9.16667 3.33332H10.8333C11.0543 3.33332 11.2663 3.42112 11.4226 3.5774C11.5789 3.73368 11.6667 3.94564 11.6667 4.16666V4.99999H8.33333V4.16666ZM14.1667 15.8333C14.1667 16.0543 14.0789 16.2663 13.9226 16.4226C13.7663 16.5789 13.5543 16.6667 13.3333 16.6667H6.66667C6.44565 16.6667 6.23369 16.5789 6.07741 16.4226C5.92113 16.2663 5.83333 16.0543 5.83333 15.8333V6.66666H14.1667V15.8333ZM11.6667 15C11.8877 15 12.0996 14.9122 12.2559 14.7559C12.4122 14.5996 12.5 14.3877 12.5 14.1667V9.16666C12.5 8.94564 12.4122 8.73368 12.2559 8.5774C12.0996 8.42112 11.8877 8.33332 11.6667 8.33332C11.4457 8.33332 11.2337 8.42112 11.0774 8.5774C10.9211 8.73368 10.8333 8.94564 10.8333 9.16666V14.1667C10.8333 14.3877 10.9211 14.5996 11.0774 14.7559C11.2337 14.9122 11.4457 15 11.6667 15Z" fill="#E85444"></path></svg></button>\
             </td>\
             </tr>')

             total=$("#total").text()
             var a=total.split(" ")[0]
             a=parseInt(a)+1
             $("#total").text(a+" Total")
     }
  });
}


function edit(id,description,maingroupid,subgroupid,option1,option2,trueAnswer,weight,priority)
{
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'editQuestion',
     data: {id:id,description:description,maingroupid:maingroupid,subgroupid:subgroupid,option1:option1,option2:option2,trueAnswer:trueAnswer,weight:weight,priority:priority},
     success:function(data) {
     if(data=="")
     {
       $("#description"+id).text(description)
       $("#options"+id).text(option1+","+option2)
       $("#trueAnswer"+id).text(trueAnswer)
       if(weight=="")
       {
         weight=0
       }
       if(priority=="")
       {
         priority=0
       }
       $("#weight"+id).text(weight)
       $("#priority"+id).text(priority)
     }
     }
  });
}


function deletee(id)
{

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'deleteQuestion',
     data: {id:id},
     success:function(data) {
     if(data=="")
     {
       $("#row"+id).remove()
       total=$("#total").text()
       var a=total.split(" ")[0]
       a=parseInt(a)-1
       $("#total").text(a+" Total")
     }
     }
  });
}

$("#maingroup").change(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
      }
    });
    $.ajax({
       type:'post',
       url:'changeMainGroupQuestion',
       data: {maingroup:$("#maingroup").val().split("_")[1]},
       success:function(data) {
         var subgroups=data[0]
         var questions=data[1]
         var ret=""
         var ss='<option value="subgroup_0"></option>'
         for(i=0;i<subgroups.length;i++)
         {
         ss+='<option value="subgroup_'+subgroups[i].id+'">'+subgroups[i].name+'</option>'
         }
          $("#subgroup").html(ss)

         var ret=""
         for(i=0;i<questions.length;i++)
         {
       ret+='<tr id=\"row'+questions[i].id+'\">\
       <td class="py-5 px-6" id=\"description'+questions[i].id+'\">'+questions[i].question+'</td>\
       <td class="py-5 px-6" id=\"options'+questions[i].id+'\">'+questions[i].questionoption1+","+questions[i].questionoption2+'</td>\
       <td class="py-5 px-6" id=\"trueAnswer'+questions[i].id+'\">'+questions[i].answer+'</td>\
       <td class="py-5 px-6" id=\"weight'+questions[i].id+'\">'+questions[i].weight+'</td>\
       <td class="py-5 px-6" id=\"priority'+questions[i].id+'\">'+questions[i].priority+'</td>\
       <td class="py-5 px-6">\
       <button class="btn p-0 me-2" onclick=\"editme('+questions[i].id+')\" data-bs-toggle="modal" data-bs-target="#exampleModal">\
       <svg  width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4999 9C16.2789 9 16.0669 9.0878 15.9106 9.24408C15.7544 9.40036 15.6666 9.61232 15.6666 9.83333V14.8333C15.6666 15.0543 15.5788 15.2663 15.4225 15.4226C15.2662 15.5789 15.0542 15.6667 14.8332 15.6667H3.16656C2.94555 15.6667 2.73359 15.5789 2.57731 15.4226C2.42103 15.2663 2.33323 15.0543 2.33323 14.8333V3.16667C2.33323 2.94565 2.42103 2.73369 2.57731 2.57741C2.73359 2.42113 2.94555 2.33333 3.16656 2.33333H8.16657C8.38758 2.33333 8.59954 2.24554 8.75582 2.08926C8.9121 1.93298 8.9999 1.72101 8.9999 1.5C8.9999 1.27899 8.9121 1.06702 8.75582 0.910744C8.59954 0.754464 8.38758 0.666667 8.16657 0.666667H3.16656C2.50352 0.666667 1.86764 0.930059 1.3988 1.3989C0.929957 1.86774 0.666565 2.50363 0.666565 3.16667V14.8333C0.666565 15.4964 0.929957 16.1323 1.3988 16.6011C1.86764 17.0699 2.50352 17.3333 3.16656 17.3333H14.8332C15.4963 17.3333 16.1322 17.0699 16.601 16.6011C17.0698 16.1323 17.3332 15.4964 17.3332 14.8333V9.83333C17.3332 9.61232 17.2454 9.40036 17.0892 9.24408C16.9329 9.0878 16.7209 9 16.4999 9ZM3.9999 9.63333V13.1667C3.9999 13.3877 4.0877 13.5996 4.24398 13.7559C4.40026 13.9122 4.61222 14 4.83323 14H8.36657C8.47624 14.0006 8.58496 13.9796 8.68649 13.9381C8.78802 13.8967 8.88037 13.8356 8.95823 13.7583L14.7249 7.98333L17.0916 5.66667C17.1697 5.5892 17.2317 5.49703 17.274 5.39548C17.3163 5.29393 17.3381 5.18501 17.3381 5.075C17.3381 4.96499 17.3163 4.85607 17.274 4.75452C17.2317 4.65297 17.1697 4.5608 17.0916 4.48333L13.5582 0.908333C13.4808 0.830226 13.3886 0.768231 13.287 0.725924C13.1855 0.683617 13.0766 0.661835 12.9666 0.661835C12.8566 0.661835 12.7476 0.683617 12.6461 0.725924C12.5445 0.768231 12.4524 0.830226 12.3749 0.908333L10.0249 3.26667L4.24156 9.04167C4.16433 9.11953 4.10323 9.21188 4.06176 9.31341C4.02029 9.41494 3.99926 9.52366 3.9999 9.63333ZM12.9666 2.675L15.3249 5.03333L14.1416 6.21667L11.7832 3.85833L12.9666 2.675ZM5.66656 9.975L10.6082 5.03333L12.9666 7.39167L8.0249 12.3333H5.66656V9.975Z" fill="#382CDD"></path></svg></button>\
       <button class="btn p-0" onclick=\"deleteme('+questions[i].id+')\" data-bs-toggle="modal" data-bs-target="#exampleModal">\
       <svg  width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.33333 15C8.55435 15 8.76631 14.9122 8.92259 14.7559C9.07887 14.5996 9.16667 14.3877 9.16667 14.1667V9.16666C9.16667 8.94564 9.07887 8.73368 8.92259 8.5774C8.76631 8.42112 8.55435 8.33332 8.33333 8.33332C8.11232 8.33332 7.90036 8.42112 7.74408 8.5774C7.5878 8.73368 7.5 8.94564 7.5 9.16666V14.1667C7.5 14.3877 7.5878 14.5996 7.74408 14.7559C7.90036 14.9122 8.11232 15 8.33333 15ZM16.6667 4.99999H13.3333V4.16666C13.3333 3.50362 13.0699 2.86773 12.6011 2.39889C12.1323 1.93005 11.4964 1.66666 10.8333 1.66666H9.16667C8.50363 1.66666 7.86774 1.93005 7.3989 2.39889C6.93006 2.86773 6.66667 3.50362 6.66667 4.16666V4.99999H3.33333C3.11232 4.99999 2.90036 5.08779 2.74408 5.24407C2.5878 5.40035 2.5 5.61231 2.5 5.83332C2.5 6.05434 2.5878 6.2663 2.74408 6.42258C2.90036 6.57886 3.11232 6.66666 3.33333 6.66666H4.16667V15.8333C4.16667 16.4964 4.43006 17.1322 4.8989 17.6011C5.36774 18.0699 6.00363 18.3333 6.66667 18.3333H13.3333C13.9964 18.3333 14.6323 18.0699 15.1011 17.6011C15.5699 17.1322 15.8333 16.4964 15.8333 15.8333V6.66666H16.6667C16.8877 6.66666 17.0996 6.57886 17.2559 6.42258C17.4122 6.2663 17.5 6.05434 17.5 5.83332C17.5 5.61231 17.4122 5.40035 17.2559 5.24407C17.0996 5.08779 16.8877 4.99999 16.6667 4.99999ZM8.33333 4.16666C8.33333 3.94564 8.42113 3.73368 8.57741 3.5774C8.73369 3.42112 8.94565 3.33332 9.16667 3.33332H10.8333C11.0543 3.33332 11.2663 3.42112 11.4226 3.5774C11.5789 3.73368 11.6667 3.94564 11.6667 4.16666V4.99999H8.33333V4.16666ZM14.1667 15.8333C14.1667 16.0543 14.0789 16.2663 13.9226 16.4226C13.7663 16.5789 13.5543 16.6667 13.3333 16.6667H6.66667C6.44565 16.6667 6.23369 16.5789 6.07741 16.4226C5.92113 16.2663 5.83333 16.0543 5.83333 15.8333V6.66666H14.1667V15.8333ZM11.6667 15C11.8877 15 12.0996 14.9122 12.2559 14.7559C12.4122 14.5996 12.5 14.3877 12.5 14.1667V9.16666C12.5 8.94564 12.4122 8.73368 12.2559 8.5774C12.0996 8.42112 11.8877 8.33332 11.6667 8.33332C11.4457 8.33332 11.2337 8.42112 11.0774 8.5774C10.9211 8.73368 10.8333 8.94564 10.8333 9.16666V14.1667C10.8333 14.3877 10.9211 14.5996 11.0774 14.7559C11.2337 14.9122 11.4457 15 11.6667 15Z" fill="#E85444"></path></svg></button>\
               </td>\
               </tr>'
          }

          $("#tb").html(ret)

               total=$("#total").text()
               var a=total.split(" ")[0]

               $("#total").text(questions.length+" Total")
       }
    });
})


$("#subgroup").change(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
      }
    });
    $.ajax({
       type:'post',
       url:'changeSubGroupQuestion',
       data: {maingroup:$("#maingroup").val().split("_")[1],subgroup:$("#subgroup").val().split("_")[1]},
       success:function(data) {
         var questions=data
         var ret=""
         for(i=0;i<questions.length;i++)
         {
       ret+='<tr id=\"row'+data[i].id+'\">\
       <td class="py-5 px-6" id=\"description'+questions[i].id+'\">'+questions[i].question+'</td>\
       <td class="py-5 px-6" id=\"options'+questions[i].id+'\">'+questions[i].questionoption1+","+questions[i].questionoption2+'</td>\
       <td class="py-5 px-6" id=\"trueAnswer'+questions[i].id+'\">'+questions[i].answer+'</td>\
       <td class="py-5 px-6" id=\"weight'+questions[i].id+'\">'+questions[i].weight+'</td>\
       <td class="py-5 px-6" id=\"priority'+questions[i].id+'\">'+questions[i].priority+'</td>\
       <td class="py-5 px-6">\
       <button class="btn p-0 me-2" onclick=\"editme('+questions[i].id+')\" data-bs-toggle="modal" data-bs-target="#exampleModal">\
       <svg  width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4999 9C16.2789 9 16.0669 9.0878 15.9106 9.24408C15.7544 9.40036 15.6666 9.61232 15.6666 9.83333V14.8333C15.6666 15.0543 15.5788 15.2663 15.4225 15.4226C15.2662 15.5789 15.0542 15.6667 14.8332 15.6667H3.16656C2.94555 15.6667 2.73359 15.5789 2.57731 15.4226C2.42103 15.2663 2.33323 15.0543 2.33323 14.8333V3.16667C2.33323 2.94565 2.42103 2.73369 2.57731 2.57741C2.73359 2.42113 2.94555 2.33333 3.16656 2.33333H8.16657C8.38758 2.33333 8.59954 2.24554 8.75582 2.08926C8.9121 1.93298 8.9999 1.72101 8.9999 1.5C8.9999 1.27899 8.9121 1.06702 8.75582 0.910744C8.59954 0.754464 8.38758 0.666667 8.16657 0.666667H3.16656C2.50352 0.666667 1.86764 0.930059 1.3988 1.3989C0.929957 1.86774 0.666565 2.50363 0.666565 3.16667V14.8333C0.666565 15.4964 0.929957 16.1323 1.3988 16.6011C1.86764 17.0699 2.50352 17.3333 3.16656 17.3333H14.8332C15.4963 17.3333 16.1322 17.0699 16.601 16.6011C17.0698 16.1323 17.3332 15.4964 17.3332 14.8333V9.83333C17.3332 9.61232 17.2454 9.40036 17.0892 9.24408C16.9329 9.0878 16.7209 9 16.4999 9ZM3.9999 9.63333V13.1667C3.9999 13.3877 4.0877 13.5996 4.24398 13.7559C4.40026 13.9122 4.61222 14 4.83323 14H8.36657C8.47624 14.0006 8.58496 13.9796 8.68649 13.9381C8.78802 13.8967 8.88037 13.8356 8.95823 13.7583L14.7249 7.98333L17.0916 5.66667C17.1697 5.5892 17.2317 5.49703 17.274 5.39548C17.3163 5.29393 17.3381 5.18501 17.3381 5.075C17.3381 4.96499 17.3163 4.85607 17.274 4.75452C17.2317 4.65297 17.1697 4.5608 17.0916 4.48333L13.5582 0.908333C13.4808 0.830226 13.3886 0.768231 13.287 0.725924C13.1855 0.683617 13.0766 0.661835 12.9666 0.661835C12.8566 0.661835 12.7476 0.683617 12.6461 0.725924C12.5445 0.768231 12.4524 0.830226 12.3749 0.908333L10.0249 3.26667L4.24156 9.04167C4.16433 9.11953 4.10323 9.21188 4.06176 9.31341C4.02029 9.41494 3.99926 9.52366 3.9999 9.63333ZM12.9666 2.675L15.3249 5.03333L14.1416 6.21667L11.7832 3.85833L12.9666 2.675ZM5.66656 9.975L10.6082 5.03333L12.9666 7.39167L8.0249 12.3333H5.66656V9.975Z" fill="#382CDD"></path></svg></button>\
       <button class="btn p-0" onclick=\"deleteme('+questions[i].id+')\" data-bs-toggle="modal" data-bs-target="#exampleModal">\
       <svg  width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.33333 15C8.55435 15 8.76631 14.9122 8.92259 14.7559C9.07887 14.5996 9.16667 14.3877 9.16667 14.1667V9.16666C9.16667 8.94564 9.07887 8.73368 8.92259 8.5774C8.76631 8.42112 8.55435 8.33332 8.33333 8.33332C8.11232 8.33332 7.90036 8.42112 7.74408 8.5774C7.5878 8.73368 7.5 8.94564 7.5 9.16666V14.1667C7.5 14.3877 7.5878 14.5996 7.74408 14.7559C7.90036 14.9122 8.11232 15 8.33333 15ZM16.6667 4.99999H13.3333V4.16666C13.3333 3.50362 13.0699 2.86773 12.6011 2.39889C12.1323 1.93005 11.4964 1.66666 10.8333 1.66666H9.16667C8.50363 1.66666 7.86774 1.93005 7.3989 2.39889C6.93006 2.86773 6.66667 3.50362 6.66667 4.16666V4.99999H3.33333C3.11232 4.99999 2.90036 5.08779 2.74408 5.24407C2.5878 5.40035 2.5 5.61231 2.5 5.83332C2.5 6.05434 2.5878 6.2663 2.74408 6.42258C2.90036 6.57886 3.11232 6.66666 3.33333 6.66666H4.16667V15.8333C4.16667 16.4964 4.43006 17.1322 4.8989 17.6011C5.36774 18.0699 6.00363 18.3333 6.66667 18.3333H13.3333C13.9964 18.3333 14.6323 18.0699 15.1011 17.6011C15.5699 17.1322 15.8333 16.4964 15.8333 15.8333V6.66666H16.6667C16.8877 6.66666 17.0996 6.57886 17.2559 6.42258C17.4122 6.2663 17.5 6.05434 17.5 5.83332C17.5 5.61231 17.4122 5.40035 17.2559 5.24407C17.0996 5.08779 16.8877 4.99999 16.6667 4.99999ZM8.33333 4.16666C8.33333 3.94564 8.42113 3.73368 8.57741 3.5774C8.73369 3.42112 8.94565 3.33332 9.16667 3.33332H10.8333C11.0543 3.33332 11.2663 3.42112 11.4226 3.5774C11.5789 3.73368 11.6667 3.94564 11.6667 4.16666V4.99999H8.33333V4.16666ZM14.1667 15.8333C14.1667 16.0543 14.0789 16.2663 13.9226 16.4226C13.7663 16.5789 13.5543 16.6667 13.3333 16.6667H6.66667C6.44565 16.6667 6.23369 16.5789 6.07741 16.4226C5.92113 16.2663 5.83333 16.0543 5.83333 15.8333V6.66666H14.1667V15.8333ZM11.6667 15C11.8877 15 12.0996 14.9122 12.2559 14.7559C12.4122 14.5996 12.5 14.3877 12.5 14.1667V9.16666C12.5 8.94564 12.4122 8.73368 12.2559 8.5774C12.0996 8.42112 11.8877 8.33332 11.6667 8.33332C11.4457 8.33332 11.2337 8.42112 11.0774 8.5774C10.9211 8.73368 10.8333 8.94564 10.8333 9.16666V14.1667C10.8333 14.3877 10.9211 14.5996 11.0774 14.7559C11.2337 14.9122 11.4457 15 11.6667 15Z" fill="#E85444"></path></svg></button>\
               </td>\
               </tr>'
          }

          $("#tb").html(ret)

               total=$("#total").text()
               var a=total.split(" ")[0]

               $("#total").text(questions.length+" Total")
       }
    });
})

$("#changelabels").click(function(){
  var falseLabel=$("#falselabel").text()
  if(falseLabel=="False")
  {
    $("#falselabel").html("N/A")
  }
  if(falseLabel=="N/A")
  {
    $("#falselabel").html("False")
  }
})

</script>
</div>
