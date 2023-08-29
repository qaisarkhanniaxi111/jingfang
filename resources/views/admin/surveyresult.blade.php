<script>
var active="surveyresult"

$("#"+active).css("background-color","blue")
$("#"+active+"_a").css("color","white")

</script>


<div class="mx-auto ms-lg-80">

<section>
  <div class="py-8 px-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-3"><b>Total number of Invites: </b></div>
        <div class="col-lg-2"><b>{{$invites}} </b></div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-3"><b>Total number of Responses: </b></div>
        <div class="col-lg-2"><b>{{$result}} </b></div>
      </div>
      <br>
      <div class="px-4 pb-4 mb-6 bg-white rounded shadow">
        <div class="table-responsive">
          <table class="table mb-0 table-borderless table-striped small"><thead><tr class="text-secondary"><th class="pt-4 pb-3 px-6">Question</th><th class="pt-4 pb-3 px-6">1</th><th class="pt-4 pb-3 px-6">2</th><th class="pt-4 pb-3 px-6">3</th><th class="pt-4 pb-3 px-6">4</th><th class="pt-4 pb-3 px-6">5</th></tr></thead><tbody id="tb">
            <tr id="row">
              <td class="py-5 px-6" id="firstname">First Family Matches the Patient</td>
            @for($i=1;$i<count($firstfamily);$i++)
            <td class="py-5 px-6" id="firstname">{{$firstfamily[$i]}}</td>
              @endfor
        </tr>
        <tr id="row">
          <td class="py-5 px-6" id="firstname">Second Family Matches the Patient</td>
        @for($i=1;$i<count($secondfamily);$i++)
        <td class="py-5 px-6" id="firstname">{{$secondfamily[$i]}}</td>
          @endfor
    </tr>
    <tr id="row">
      <td class="py-5 px-6" id="firstname">Third Family Matches the Patient</td>
    @for($i=1;$i<count($thirdfamily);$i++)
    <td class="py-5 px-6" id="firstname">{{$thirdfamily[$i]}}</td>
      @endfor
</tr>
<tr id="row">
  <td class="py-5 px-6" id="firstname">I Found these results clinically usefull</td>
@for($i=1;$i<count($resultstouse);$i++)
<td class="py-5 px-6" id="firstname">{{$resultstouse[$i]}}</td>
  @endfor
</tr>

          </tbody></table></div>
      </div>
      </div>
  </div>
</section>
</div>
