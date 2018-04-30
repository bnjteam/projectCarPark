

  @extends('layouts.app')



  @section('content')
  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-10">
        <div class="card border-primary ">
          <div class="card-header" style="text-align:center">Reserve</div>
          <div class="card-body">
            <div class="" >
              <div class="row justify-content-center">
                  <img src="/storage/check.gif" loop=1 alt="" style="padding:20px">
              </div>
              <h3 style="text-align:center">Success</h3>

              <div class="" style="text-align:center">


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php  echo "<script>location.href='/parkings/info'</script>" ?>
  @endsection
