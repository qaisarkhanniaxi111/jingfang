<script>

var active="clientresult"

$("#"+active).css("background-color","blue")
$("#"+active+"_main").css("background-color","blue")
$("#"+active+"_a").css("color","white")
$("#"+active+"_main_a").css("color","white")
</script>

<div class="container">
  <br>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
     <table class="table table-bordered">
       <tr><td style="font-weight:bold">Name</td><td style="color:green">{{$firstname}} {{$lastname}}</td><tr>
         <tr><td style="font-weight:bold">Quiz Date</td><td style="color:blue">{{$attemptdate}}</td><tr>
     </table>
    </div>
</div>

<div class="row">
  <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto px-3" style="font-weight:bold">Formula Families in Order of Scoring</legend>
        <div class="px-4 pb-4 mb-6 bg-white rounded shadow">
          <div class="table-responsive">
            <table class="table mb-0 table-borderless table-striped small"><thead><tr class="text-secondary"><th class="pt-4 pb-3 px-6">Family</th><th class="pt-4 pb-3 px-6">Score</th><th class="pt-4 pb-3 px-6">Priority Questions</th></tr></thead><tbody id="tb">
              @for($i=0;$i<count($maingroups);$i++)
              <tr>
                <td style="width:500px">
                  <div class="accordion" id="accordionExample{{$i}}">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$i}}" aria-expanded="false" aria-controls="collapseOne{{$i}}">
                          {{$maingroups[$i]}}
                        </button>
                      </h2>
                      <div id="collapseOne{{$i}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample{{$i}}">
                        <div class="accordion-body">
                          <h3>Positive Answers</h3>
                          <?php $mGroup= $maingroupsansweredcorrect[$i];?>
                          @if(count($mGroup)>0)

                          @for($j=0;$j<count($mGroup);$j++)
                          <?php $mg=explode("***",$mGroup[$j]) ?>
                          <span style="color:green">{{$j+1}}. {{$mg[0]}}</span><br>
                          @endfor
                          @else
                           <span style="color:green">No Answers</span><br>
                          @endif

                          <h3>Negative Answers</h3>
                          <?php $mGroup= $maingroupsansweredincorrect[$i];?>
                          @for($j=0;$j<count($mGroup);$j++)
                          <?php $mg=explode("***",$mGroup[$j]) ?>
                          <span style="color:red">{{$j+1}}. {{$mg[0]}}</span><br>
                          @endfor
                        </div>
                      </div>
                    </div>
                  </div>
                  </td>

              <td class="py-5 px-6">{{$maingroupscorrectquestions[$i]}}/{{$maingroupstotalquestions[$i]}} - {{number_format((float)$maingroupscorrectquestions[$i]/$maingroupstotalquestions[$i]*100, 2, '.', '')}}%</td>
              <td class="py-5 px-6"><?php if($sgroups[$i]!="") echo "Yes"; else echo "No"; ?></td>


              </tr>
              @endfor
            </tbody></table></div>
        </div>
        </div>
</div>

<div class="row">
  <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto px-3" style="font-weight:bold">Refinement Questions for Formula Families that meet Priority or are over Threshold</legend>

      @for($i=0;$i<count($sgroups);$i++)
      @if($sgroups[$i]!="")
      <h4 style="font-weight:bold">{{$maingroups[$i]}} Refinement questions</h4><br>
      <span style="font-size:16px;font-weight:bold">Positive Answers</span><br>
      <?php $mg=$sgroupsansweredpositively[$i]; ?>
      @if(count($mg)>0)
      @for($j=0;$j<count($mg);$j++)

      <span style="color:green">{{$j+1}}. {{$mg[$j]}}</span><br>
      @endfor
      @else
      <span style="color:green">No Positive Answers</span><br>
      @endif

      <span style="font-size:16px;font-weight:bold">Unknown Answers</span><br>
      <?php $mg=$sgroupsunknownanswered[$i] ?>
      @if(count($mg)>0)
      @for($j=0;$j<count($mg);$j++)

      <span style="color:orange">{{$j+1}}. {{$mg[$j]}}</span><br>
      @endfor
      @else
      <span style="color:orange;">No Unknown Answers</span><br>
      @endif

      <div class="accordion" id="accordionExampleo{{$i}}">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneo{{$i}}" aria-expanded="false" aria-controls="collapseOneo{{$i}}">
              +
            </button>
          </h2>
          <div id="collapseOneo{{$i}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExampleo{{$i}}">
            <div class="accordion-body">
              <span style="font-size:16px;font-weight:bold">Negative or N/A Answers</span><br>
              <?php $mg=$sgroupsnegativeonaanswered[$i] ?>
              @if(count($mg)>0)

              @for($j=0;$j<count($mg);$j++)

              <span style="color:red">{{$j+1}}. {{$mg[$j]}}</span><br>
              @endfor
              @else
              <span style="color:red">No Negative Answers</span><br>
              @endif
            </div>
          </div>
        </div>
        <br>
        <div>
      @endif
      @endfor
            </fieldset>
      </div>
</div>
<br><br>
