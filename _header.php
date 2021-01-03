<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dental Clinic | Welcome</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- InputMask -->

    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- data table -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

    <!-- Full Calendar Plugin -->
    <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">

    <!-- Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <!-- Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="dist/js/jquery.sweet-modal.min.js"></script>
    <link rel="stylesheet" href="dist/js/jquery.sweet-modal.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    html * {
        font-family: 'Prompt', sans-serif;
    }

    .hidetext {
        -webkit-text-security: disc;
    }
</style>

<?php include 'connector.php';
session_start();
if ($_SESSION['username'] == null) {
    header("location: _nologin.php");
}
$result = $conn->query("select * from master_user where username='" . $_SESSION['username'] . "'");
$obj = mysqli_fetch_object($result)
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item dropdown"> -->
                <li class="nav-item d-none d-sm-inline-block">
                    <!-- <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a> -->
                    <div class="user-panel pt-2 d-flex">
                        <div class="image">
                            <img src="<?php echo $obj->img_name ?>" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="img/1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dental Clinic</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo $obj->img_name ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class -->
                        <li class="nav-item">
                            <a href="_welcome.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    หน้าหลัก
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tooth"></i>
                                <p>
                                    ทันตแพทย์
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="dentist.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ข้อมูลทันตแพทย์</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="_welcome.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>เวลาการทำงาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tooth"></i>
                                <p>
                                    ผู้ป่วย
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="managepatient.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ประวัติผู้ป่วย</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ประวัติการรักษา</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="schedule.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>การนัดหมายผู้ป่วย</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'admin') {
                                echo "<li class='nav-item has-treeview'>
                                <a href='#' class='nav-link'>
                                    <i class='nav-icon fas fa-tooth'></i>
                                    <p>
                                        ผู้ดูแลระบบ
                                        <i class='right fas fa-angle-left'></i>
                                    </p>
                                </a>
                                <ul class='nav nav-treeview'>
                                    <li class='nav-item'>
                                        <a href='./manageuser.php' class='nav-link'>
                                            <i class='far fa-circle nav-icon'></i>
                                            <p>จัดการข้อมูลผู้ใช้ระบบ</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>";
                            }
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" onclick="checkLogout()">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p style="color:crimson">
                                    ออกจากระบบ
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <script>
            function checkLogout() {
                swal({
                        title: "แน่ใจหรือไม่ ?",
                        text: "ต้องการออกจากระบบหรือไม่",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willExit) => {
                        if (willExit)
                            window.location.href = "_logout.php";
                    });
            }
        </script>