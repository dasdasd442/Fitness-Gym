
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../images/logo.png">

  <title>California Fitness Gym | Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- <link href="../css/sb-admin-2.min.css" rel="stylesheet"> -->
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

  <style>
    .sched li, .sched hr {
    margin-left: 20px;
}
.sched {
    /* background:linear-gradient(190deg,#00388c 0%,#19b0b8 100%); */
    /* background: #e4e4e4; */
    margin:20px 0;
    border-radius: 10px;
    padding:10px 0px;
}

.card1 {
    margin: 18px 10px 40px;
}

.card1 h4 {
    font-size: 20px;
    margin-bottom: 10px;
}


.sched ul {
    list-style-type:none;
    text-align:left;
    
}

.sched h3 {
    font-family: 'Lato', sans-serif;
    font-weight: 400px;
    font-size: 25px;
}

    .showMe {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    }
    .showMe-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 1rem 1.5rem;
        width: 24rem;
        border-radius: 0.5rem;
    }
    .show-showMe {
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
        z-index: 1000;
    }
    .showMe h1 {
        margin-bottom: 0px;
    }
  </style>

</head>
@if (session('msg') == 'Added Successfully!')
  <body id="page-top" onload="toggleModal('Added Successfully!')">
@elseif (session('msg')  == 'Removed Successfully!')
  <body id="page-top" onload="toggleModal('Removed Successfully!')">
@elseif (session('msg')  == 'Updated Successfully!')
  <body id="page-top" onload="toggleModal('Updated Successfully!')">
@elseif (session('msg')  == 'Cannot Perform Action!')
  <body id="page-top" onload="toggleModal('Cannot Perform Action!')">
@else
  <body id="page-top">
@endif


<div class="showMe">
  <div class="showMe-content">
      <h1 style="text-align: center; "></h1>
  </div>
</div>


<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
      <div class="sidebar-brand-icon">
        <img id="showImg" src="images/logo.png" class="img-thumbnail d-lg-none sm"/>
      </div>
      <div class="sidebar-brand-text mx-3">California Fitness Gym</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Navigation Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>View Data</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Information</h6>
          <a class="collapse-item" href="{{ route('admin.customers') }}">California Customers</a>
          <a class="collapse-item" href="{{ route('admin.employees') }}">California Employees</a>
          <a class="collapse-item" href="{{ route('admin.classes') }}">California Classes</a>
          <a class="collapse-item" href="{{ route('admin.shop') }}">California Shop</a>
          <a class="collapse-item" href="{{ route('admin.entrylogs') }}">Entry Log</a>
        </div>
      </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
      Others
    </div>

    <!-- New Transaction  -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.transactions') }}">
        <i class="fas fa-file-invoice"></i></i>
        <span>Transactions</span></a>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">California Gym Website:</h6>
          <a class="collapse-item" href="{{ route('mainpage-index') }}">Your Website</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle" onclick="showLogo()"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

        
          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $authenticatedUser->name }}</span>
              <img class="img-profile rounded-circle" src="../images/logo.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ route('admin.settings') }}">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" style="cursor: pointer;" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->







  @yield('content')




</div>
<!-- End of Main Content -->


<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Hansel 2020</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="{{ route('admin.logout') }}">Logout</a>
  </div>
</div>
</div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('../vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('../vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('../vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>



<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>



<script>
  function filterProduct(e, what) {
    console.log(e.value);
        let x = e.value.toUpperCase();
        let rows = document.querySelectorAll(what);

        for (let i = 0; i < rows.length; i++) {
            if (rows[i].firstElementChild.innerText.toUpperCase().match(x)) {
                rows[i].style.display = 'table-row';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    let modal = document.querySelector('.showMe');
    console.log(modal);
    function toggleModal(say) {
        modal.classList.toggle("show-showMe");
        let what = modal.firstElementChild;
        
        what.style.color = (say == 'Cannot Perform Action!') ? '#d9534f' : '#5cb85c';

        what = what.firstElementChild;
        what.textContent = say;

        setTimeout(() => {
            modal.classList.remove("show-showMe");
        }, 1000);
    }

    let img = document.querySelector('#showImg');
    function showLogo() {
      img.classList.toggle("d-lg-none");
    }
</script>

</body>

</html>