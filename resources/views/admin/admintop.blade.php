<!DOCTYPE html>
<html lang="en">
<head>
    <title>(Admin Account) JingFang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="shuffle-for-bootstrap.png">
    <style>
    nav .navbar-nav li a{
      color: white !important;
      }
</style>
</head>
<body>
    <div class="">

      <section>

        <nav class=" d-lg-none navbar-light bg-white flex-wrap">
          <div class="container-fluid">
            <div class="d-flex w-100 align-items-center">
              <a class="navbar-brand" href="#">
                <img class="img-fluid" src="artemis-assets/logos/artemis-logo-light.svg" alt="" width="auto">
              </a>
              <button class="navbar-burger navbar-toggler bg-primary-light ms-auto" type="button">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </div>
        </nav>
        <div class="position-relative navbar-menu d-none d-lg-block" style="z-index: 9999;">
          <div class="navbar-backdrop d-lg-none position-fixed top-0 end-0 bottom-0 start-0 bg-dark" style="opacity: .5"></div>
          <div class="position-fixed top-0 start-0 bottom-0 w-75 mw-sm-xs pt-6 bg-white overflow-auto">
            <div class="px-6 pb-6 position-relative border-bottom border-secondary-light">
              <div class="d-inline-flex align-items-center">
                <a href="#">
                  <img class="img-fluid" src="artemis-assets/logos/artemis-logo-light.svg" alt="" width="auto">
                </a>
              </div>
            </div>
            <div class="py-6 px-6">
              <div>
                <h3 class="mb-2 text-secondary text-uppercase small">Main</h3>
                 <ul class="navbar-nav">
                  <li id="dashboard" class="nav-item nav-pills">
                    <a class="nav-link  text-secondary p-3 d-flex align-items-center" href="dashboard">
                    <span id="dashboard_a">Dashboard</span>
                    </a>
                  </li>
                  <li  id="groups" class="nav-item nav-pills">
                    <a class="nav-link text-secondary p-3 d-flex align-items-center"  href="groups">
                    <span id="groups_a">Groups</span>
                    </a>
                  </li>
                  <li id="subgroups" class="nav-item nav-pills">
                    <a class="nav-link text-secondary p-3 d-flex align-items-center" href="subgroups">
                      <span id="subgroups_a">Sub Groups</span>
                    </a>
                  </li>

                  <li id="questions" class="nav-item nav-pills">
                    <a class="nav-link text-secondary p-3 d-flex align-items-center" href="questions">
                      <span id="questions_a">Questions</span>
                    </a>
                  </li>

                  <li id="invites" class="nav-item nav-pills">
                    <a class="nav-link text-secondary p-3 d-flex align-items-center" href="invites">
                      <span id="invites_a">Invites</span>
                    </a>
                  </li>

                  <li id="surveyresult" class="nav-item nav-pills">
                    <a class="nav-link text-secondary p-3 d-flex align-items-center" href="surveyresult">
                      <span id="surveyresult_a">Survey Results</span>
                    </a>
                  </li>
                  <br>
                  <li id="logout" class="nav-item nav-pills">
                    <a class="nav-link text-danger p-3 d-flex align-items-center" href="logout">
                      <span id="logout_a">Logout</span>
                    </a>
                  </li>
                   </ul>


              </div>
            </div>
          </div>
        </div>
      </nav>

      </section>
</ul>

        <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="js/charts-demo.js"></script>
</body>
</html>
