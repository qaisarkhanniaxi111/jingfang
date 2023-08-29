<script>
var active="dashboard"

$("#"+active).css("background-color","blue")
$("#"+active+"_a").css("color","white")

</script>


<div class="mx-auto ms-lg-80">
<section>
  <div class="py-8 px-6">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <div class="col-12 col-lg-auto mb-4 mb-lg-0">
        <div class="d-flex align-items-center">
          <h4 class="mb-0 me-2">Dashboard</h4>
        </div>
      </div>

  </div>
</div>
</section>
<section class="py-8"><div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-2">
      <div class="card">
        <div class="card-header">Total Results</div>
  <div class="card-body">
    <span style="font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/results">{{$results}}</a></span>
  </div>
</div>
  </div>

  <div class="col-lg-2">
    <div class="card">
      <div class="card-header">Total Invites</div>
<div class="card-body">
  <span style="font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/invites">{{$invites}}</a></span>
</div>
</div>
</div>


</div>
</section>
</div>
