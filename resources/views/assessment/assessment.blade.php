
<input type="hidden" value="{{$code}}" id="thiscode">
<div class="container" id="maincontent">
  <fieldset class="border rounded-3 p-3">
    <legend class="float-none w-auto px-3">JingFang Assessment</legend>
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-8">Welcome, <b style="color:blue">{{$data[0]->firstname}}  {{$data[0]->lastname}}</b></div>
    </div>

<br>
<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-8">
  <button class="btn btn-primary" id="startEvaluation" style="width:200px"><span id="status">{{$status}}</span></button>&nbsp;&nbsp;&nbsp;
</div>
</div>
  </fieldset>
<input id="totalQuestions" type="hidden">
  <fieldset class="border rounded-3 p-3" id="evaluation" style="display:none">
    <legend class="float-none w-auto px-3"><b style="color:blue">Evaluation Test</b></legend>

<div id="testBody">
</div>

<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-8">
  <button class="btn btn-success" id="submit" style="width:100px">Submit</button>
</div>
</div>
  </fieldset>

</div>

<script>
$("#startEvaluation").click(function(){

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'showQuestions',
     data:{code:$("#thiscode").val()},
     success:function(data) {
       console.log(data)
       if(data=="closed")
       {
         Swal.fire("This test is closed","","info")
       }
       var number=data[1]

       var data=data[0]
       $("#evaluation").css("display","block")
       displayQuestions(data,number)
     }
  });
})


function displayQuestions(data,number)
{
  var txt=""
  var allQuestions=""
  for(i=0;i<data.length;i++)
  {
    allQuestions+=data[i].id+","
      
  txt+='<span style="color:blue">'+(i+1+number)+". "+data[i].question+"</span><br>"
  if(data[i].maingroupname=='CCMQ') {
      txt+='<span style="color:red">( No=1, Seldom=2, Sometimes=3, Often=4, Always=5 )</span><br>';
  }
  if(data[i].maingroupname=='BCQ_Negative' || data[i].maingroupname=='BCQ_Positive' || data[i].maingroupname=='BCQs') {
      txt+='<span style="color:red">( No=0, Seldom=25, Sometimes=50, Often=75, Always=100 )</span><br>';
  }


  txt+='<div class="row"><div class="col-lg-6">'

  txt+='<div class="col-lg-3"><input class="form-check-input" type="radio" name=\"question_'+data[i].id+'\" id="searchByName2"  value=\"'+data[i].questionoption1+'\"><label class="form-check-label" id="searchByName"  style="font-weight:bold">&nbsp;'+data[i].questionoption1+'</label></div>';
  if(data[i].reservevalue!="")
  {
    txt+='<div class="col-lg-3"><input class="form-check-input" type="radio" name=\"question_'+data[i].id+'\" id="searchByName2"  value=\"'+data[i].reservevalue+'\"><label class="form-check-label" id="searchByName" style="font-weight:bold">&nbsp;'+data[i].reservevalue+'</label></div>'

  }
  else {
    txt+='<div class="col-lg-3"><input class="form-check-input" type="radio" name=\"question_'+data[i].id+'\" id="searchByName2"  value=\"'+data[i].questionoption2+'\"><label class="form-check-label" id="searchByName"  style="font-weight:bold">&nbsp;'+data[i].questionoption2+'</label></div>';

      if(data[i].questionoption3!='') {
          txt+='<div class="col-lg-3"><input class="form-check-input" type="radio" name=\"question_'+data[i].id+'\" id="searchByName2"  value=\"'+data[i].questionoption3+'\"><label class="form-check-label" id="searchByName"  style="font-weight:bold">&nbsp;'+data[i].questionoption3+'</label></div>';
      }

      if(data[i].questionoption4!='') {
          txt+='<div class="col-lg-3"><input class="form-check-input" type="radio" name=\"question_'+data[i].id+'\" id="searchByName2"  value=\"'+data[i].questionoption4+'\"><label class="form-check-label" id="searchByName"  style="font-weight:bold">&nbsp;'+data[i].questionoption4+'</label></div>';

      }

      if(data[i].questionoption5!='') {
        txt+='<div class="col-lg-3"><input class="form-check-input" type="radio" name=\"question_'+data[i].id+'\" id="searchByName2"  value=\"'+data[i].questionoption5+'\"><label class="form-check-label" id="searchByName"  style="font-weight:bold">&nbsp;'+data[i].questionoption5+'</label></div>';
  
      }
  }
  txt+="</div></div><br>"
  }
  $("#totalQuestions").val(allQuestions)
  $("#testBody").html(txt)
}


$("#submit").click(function(){
  var list=[]
  questions=$("#totalQuestions").val()
  questions=questions.split(",")
  for(i=0;i<questions.length-1;i++)
  {
    var q=$('input[name="question_'+questions[i]+'"]:checked').val()
    if(q!=null)
    {
    list.push([questions[i],q])
  }
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $("meta[name='csrf_token']").attr('content')
    }
  });
  $.ajax({
     type:'post',
     url:'submitQuestionAnswers',
     data:{list:list,questions:questions,code:$("#thiscode").val()},
     success:function(data) {
    
       if(data=="closed")
       {
         $("#maincontent").html("Thank you for attempting the Assessment Quiz")
       }
       else {

       var number=data[1]
       data=data[0]
       if(data.length>0)
       {
       displayQuestions(data,number)
      }
      else {
        $("#maincontent").html("Thank you for attempting the Assessment Quiz")
        //window.location.href = "login";
      }
     }
   }
  });
})
</script>
