<?php
include "./db_connect.php";
include("./imports.php");

$sqlid = "SELECT * FROM Employee Order BY ID DESC";
$ret = mysqli_query($db, $sqlid);
while ($found = mysqli_fetch_array($ret)) {
  $idsx = $found['ID'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<div id="Initialisation" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
          <center>
            SYSTEM INFORMATION INITIALIZATION
          </center>
        </h4>
      </div>
      <form method="post" action="upload.php" enctype='multipart/form-data'>

        <div class="modal-body">
          <center>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Org Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgname"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Phone:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgphone"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Email:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgemail"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;Website:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgwebsite"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Active Year:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgyear"></span></p>
            Attach Organisation Logo:(<h7 style="color:red">Make sure it is a transparent image</h7>)<input name='filed' type='file' id='filed'>
            <input type="hidden" name="page" value="admin.php" />
          </center>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Finish" id="addmember" name="orginitial"> &nbsp;
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
    </div>
    </form>
  </div>
</div>

<div id="Initialisation2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
          <center>
            EDIT SYSTEM INFORMATION
          </center>
        </h4>
      </div>
      <form method="post" action="upload.php" enctype='multipart/form-data'>

        <div class="modal-body">
          <center>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Org Name:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="orgname" value="<?php if (isset($name)) {
                                                                                echo $name;
                                                                              } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Phone:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="orgphone" value="<?php if (isset($phone)) {
                                                                                  echo $phone;
                                                                                } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Email:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="orgemail" value="<?php if (isset($mail)) {
                                                                                  echo $mail;
                                                                                } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;Website:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="orgwebsite" value="<?php if (isset($website)) {
                                                                                    echo $website;
                                                                                  } ?>"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Active Year:<label style="color: red;font-size:20px;">*</label>
                <input style="width:270px;" type="text" name="orgyear" value="<?php if (isset($year)) {
                                                                                echo $year;
                                                                              } ?>"></span></p>
            Attach Organisation Logo:(<h7 style="color:red">Make sure it is a transparent image</h7>)<input name='filed' type='file' id='filed'>
            <input type="hidden" name="page" value="admin.php" />
            <input type="hidden" name="pageid" value="<?php echo $idz; ?>" />

          </center>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Update" id="addmember" name="orgupdate"> &nbsp;
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
    </div>
    </form>
  </div>
</div>
  <div id="printBulk" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
            <center>
              PRINT IDs IN BULK
            </center>
          </h4>
        </div>

        <div class="modal-body">
          <form action="printbulk.php" method="post" target="_blank">
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">From</span>
              <input id="text" type="number" class="form-control" name="startpoint">
            </div>
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">To</span>
              <input type="number" class="form-control" name="endpoint">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Employee id starts @</span>
              <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo $idsx; ?>" readonly="readonly">
            </div>


        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>


          <?php
          $sqln = "SELECT * FROM Inorg ";
          $rgetb = mysqli_query($db, $sqln);
          $numb = mysqli_num_rows($rgetb);
          if ($numb != 0) {
            while ($foundl = mysqli_fetch_array($rgetb)) {
              $profile = $foundl['pname'];
            }
            echo "<center><img src='media/$profile'  width='63%' height='140px' alt=''></center>";
          } else {



          ?>
            <h1>
              <a class="navbar-brand" href="index.html"><span class="fa fa-area-chart">

                </span>MAIN MENU<span class="dashboard_text"></span>
              </a>
            </h1>
          <?php } ?>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="sidebar-menu">
            <li class="header">
              <h4>Administrator</h4>
            </li>
            <li class="treeview">
              <a href="admin.php">
                <i class="fa fa-tv"></i> <span>Control Panel</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog"></i>
                <span>Initialisation</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a data-toggle='modal' data-id='' href='#Initialisation' class='open-Initial'><i class="fa fa-plus"></i>Add System Info</a></li>
                <li><a data-toggle='modal' data-id='' href='#Initialisation2' class='open-Initial2'><i class="fa fa-minus"></i>Edit System Info</a></li>
              </ul>
            </li>
            <!-- <li class="treeview">
              <a data-toggle='modal' data-id='' href='#Useradd' class='open-adduser'><i class="fa fa-user"></i>Add Employee</a>
            </li> -->
            <li class="treeview">
              <a data-toggle='modal' data-id='' href='./useradd.php' class='open-adduser'><i class="fa fa-user-plus"></i>Add Employee (New)</a>
            </li>
            <li class="treeview">
              <a href="bulk.php"><i class='fa fa-print'></i>Bulk registration</a>
            </li>
            <li class="treeview">
              <a data-toggle='modal' href="#printBulk" class="Open-printBulk"><i class='fa fa-print'></i>Bulk printing</a>
            </li>

          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
    </aside>
  </div>
  <script src='admin/js/SidebarNav.min.js' type='text/javascript'></script>
  <script>
    $('.sidebar-menu').SidebarNav()
  </script>

   <!-- new added graphs chart js-->
  <script src="admin/js/Chart.bundle.js"></script>
  <script src="admin/js/utils.js"></script>


  <!-- Classie --><!-- for toggle left push menu script -->
  <script src="admin/js/classie.js"></script>
  <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
      showLeftPush = document.getElementById('showLeftPush'),
      body = document.body;

    showLeftPush.onclick = function() {
      classie.toggle(this, 'active');
      classie.toggle(body, 'cbp-spmenu-push-toright');
      classie.toggle(menuLeft, 'cbp-spmenu-open');
      disableOther('showLeftPush');
    };


    function disableOther(button) {
      if (button !== 'showLeftPush') {
        classie.toggle(showLeftPush, 'disabled');
      }
    }
  </script>
  <!-- //Classie --><!-- //for toggle left push menu script -->

  <!--scrolling js-->
  <script src="admin/js/jquery.nicescroll.js"></script>
  <script src="admin/js/scripts.js"></script>
  <!--//scrolling js-->

  <!-- Bootstrap Core JavaScript -->
  <script src="admin/js/bootstrap.js"> </script>
  <!-- //Bootstrap Core JavaScript -->
  <script src=" css/bootstrap-dropdownhover.js"></script>
</body>

</html>