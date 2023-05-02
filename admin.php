<?php
session_start();
include("db_connect.php");
include "./imports.php";
if (isset($_COOKIE['adminid']) && $_COOKIE['adminemail']) {

  $userid = $_COOKIE['adminid'];
  $useremail = $_COOKIE['adminemail'];

  $sqluser = "SELECT * FROM Administrator WHERE Password='$userid' && Email='$useremail'";

  $retrieved = mysqli_query($db, $sqluser);
  while ($found = mysqli_fetch_array($retrieved)) {
    $firstname = $found['Firstname'];
    $sirname = $found['Sirname'];
    $emails = $found['Email'];
    $id = $found['id'];
  }
} else {
  header('location:index.php');
  exit;
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({


      });
    });
  </script>
  <script type="text/javascript">
    $(document).on("click", ".open-Delete", function() {
      var myValue = $(this).data('id');
      swal({
          title: "Are you sure?",
          text: "You want to remove this staff from the database!",
          type: "warning",
          showCancelButton: true,
          cancelButtonColor: "red",
          confirmButtonColor: "green",
          confirmButtonText: "Yes, remove!",
          cancelButtonText: "No, cancel!",
          closeOnConfirm: false,
          closeOnCancel: false,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm == true) {
            var vals = myValue;
            $.ajax({
              type: 'POST',
              url: "upload.php",
              data: {
                Valuedel: vals
              },
              success: function(result) {
                if (result == "ok") {
                  swal({
                      title: "Deleted!",
                      text: "Staff has been deleted from the database.",
                      type: "success"
                    },
                    function() {
                      location.reload();
                    }
                  );
                }

              }
            });
          } else {
            swal("Cancelled", "This user is safe :)", "error");
          }
        });

    });
  </script>

  <script type="text/javascript">
    $(document).on("click", ".open-Updatepicture", function() {
      var myTitle = $(this).data('id');
      $(".modal-body #bookId").val(myTitle);

    });
  </script>
  <!-- requried-jsfiles-for owl -->
  <!-- //requried-jsfiles-for owl -->
</head>
<script type="text/javascript">
  $(document).on("click", ".open-updateProfile", function() {
    
    var id = $(this).data('id');
    var firstname = $(this).data('firstname');
    var middleName = $(this).data('middlename');
    var lastName = $(this).data('lastname');
    var suffix = $(this).data('suffix');
    var gender = $(this).data('gender');
    var position = $(this).data('position');
    var areaOfAssignment = $(this).data('areaofassignment');
    var regular_suballotment = $(this).data('regular_suballotment');
    var contractDuration_start = $(this).data('contractduration_start');
    var contractDuration_end = $(this).data('contractduration_end');
    var inclusiveDateOfEmployment = $(this).data('inclusivedateofemployment');
    var salaryGrade = $(this).data('salarygrade');
    var salary = $(this).data('salary');
    var prc = $(this).data('prc');
    var address = $(this).data('address');
    var birthdate = $(this).data('birthdate');
    var placeOfBirth = $(this).data('placeofbirth');
    var nameOfPersonToNotify = $(this).data('nameofpersontonotify');
    var bloodtype = $(this).data('bloodtype');
    var tinNumber = $(this).data('tinnumber');
    var philhealth = $(this).data('philhealth');
    var sss = $(this).data('sss');
    var pagIbigNumber = $(this).data('pagibignumber');
    var cpNumber = $(this).data('cpnumber');
    var emailAddress = $(this).data('emailaddress');

    
    console.log(firstname);
    
    $(".modal-title #firstname").val(firstname);
    $(".modal-body #firstname").val(firstname);
    $(".modal-body #middlename").val(middleName);
    $(".modal-body #lastname").val(lastName);
    $(".modal-body #suffix").val(suffix);
    $(".modal-body #gender").val(gender);
    $(".modal-body #position").val(position);
    $(".modal-body #areaofassignment").val(areaOfAssignment);
    $(".modal-body #regular_suballotment").val(regular_suballotment);
    $(".modal-body #contractduration_start").val(contractDuration_start);
    $(".modal-body #contractduration_end").val(contractDuration_end);
    $(".modal-body #inclusivedateofemployment").val(inclusiveDateOfEmployment);
    $(".modal-body #salarygrade").val(salaryGrade);
    $(".modal-body #salary").val(salary);
    $(".modal-body #prc").val(prc);
    $(".modal-body #address").val(address);
    $(".modal-body #birthdate").val(birthdate);
    $(".modal-body #placeofbirth").val(placeOfBirth);
    $(".modal-body #nameofpersontonotify").val(nameOfPersonToNotify);
    $(".modal-body #bloodtype").val(bloodtype);
    $(".modal-body #tinnumber").val(tinNumber);
    $(".modal-body #philhealth").val(philhealth);
    $(".modal-body #sss").val(sss);
    $(".modal-body #pagibignumber").val(pagIbigNumber);
    $(".modal-body #cpnumber").val(cpNumber);
    $(".modal-body #emailaddress").val(emailAddress);
    $(".modal-body #employeeid").val(id);
  });
</script>
<?php if (isset($_SESSION['memberadded'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
        title: "Successful!",
        text: "Staff added successfully!!.",
        type: "success"
      });
    });
  </script>

<?php
  session_destroy();
} ?>
<?php if (isset($_SESSION['memberexist'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "There is arleady a staff with those details in the database", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['emptytextboxes'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "You did not fill all the textboxes on the form", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['tutor'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "User removed successfully",
          text: "Do you want to remove another one?",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: "green",
          confirmButtonText: "OK!",
          closeOnConfirm: true,
          closeOnCancel: true,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm) {
            window.location = "administrator.php?id=2";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['cat'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "This category arleady in the system", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['category'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "Category added successfully",
          text: "Do you want to add another one?",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: "green",
          confirmButtonText: "OK!",
          closeOnConfirm: true,
          closeOnCancel: true,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm) {
            window.location = "administrator.php?id=3";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['del'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "Category Deleted",
          text: "Do you want to delete another one?",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: "green",
          confirmButtonText: "OK!",
          closeOnConfirm: true,
          closeOnCancel: true,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm) {
            window.location = "administrator.php?id=4";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>




<?php if (isset($_SESSION['pass'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
        title: "Successful!",
        text: "Staff details edited!!.",
        type: "success"
      });

    });
  </script>
<?php session_destroy();
} ?>


<?php 
$sqluse = "SELECT * FROM Inorg ORDER BY id DESC ";
$retrieve = mysqli_query($db, $sqluse);
while ($foundk = mysqli_fetch_array($retrieve)) {
  $name = $foundk['name'];
  $website = $foundk['website'];
  $phone = $foundk['Phone'];
  $year = $foundk['year'];
  $mail = $foundk['email'];
  $idz = $foundk['id'];
}

?>

<!-- <div id="Taxreceipted" class="modal fade" role="dialog">
  <div class="modal-dialog">
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
            <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php 
            // echo $idsx;
             ?>" readonly="readonly">
          </div>


      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
      </div>
      </form>
    </div>
  </div>
</div> -->



<div id="updateProfile" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;">
          <center>
            Edit details of <input style="border: none;background:#222d32" type="text" id="firstname" value="" readonly="readonly" />
          </center>
        </h4>
      </div>
      <div class="modal-body">
        <center>

          <form method="post" action="upload.php" enctype='multipart/form-data'>

            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;First Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="firstName" id="firstname"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Middle Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="middleName" id="middlename"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Last Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="lastName" id="lastname"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suffix:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="suffix" id="suffix"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Gender:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="gender" id="gender"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Position:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="position" id="position"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Area of Assignment<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="areaOfAssignment" id="areaofassignment"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Regular/SubAllotment:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="regular_suballotment" id="regular_suballotment"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Contract Duration(start)<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="contractDuration_start" id="contractduration_start"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Contract Duration (end)<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="contractDuration_end" id="contractduration_end"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Inclusive Date of Employment:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="inclusiveDateOfEmployment" id="inclusivedateofemployment"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Salary Grade:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="salaryGrade" id="salarygrade"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Salary:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="salary" id="salary"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;PRC ID Number (if application):<label style="color: red;font-size:20px;"></label><input style="width:270px;" type="text" name="prc" id="prc"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Address:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="address" id="address"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Birthdate:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="birthdate" id="birthdate"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Place of Birth:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="placeOfBirth" id="placeofbirth"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Name of Person to Notify in Case of Emergency:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="nameOfPersonToNotify" id="nameofpersontonotify"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Bloodtype:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="bloodtype" id="bloodtype"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;TIN Number:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="tinNumber" id="tinnumber"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;PHILHEALTH:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="philhealth" id="philhealth"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;SSS:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="sss" id="sss"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;PAGIBIG Number:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="pagibigNumber" id="pagibignumber"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;CP Number:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="cpNumber" id="cpnumber"></span></p>
                        <p><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;Email Address:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="emailAddress" id='emailaddress'></span></p>
                        Add Signature photo:<input name='sigFiled' type='file' id='sigFiled'>
                        Add ID photo:<input name='IDFiled' type='file' id='IDFiled'>
                        <input type="hidden" name="page" id="employeeid" />
        </center>

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Reset" id="updateEmployeeDetails" name="updateEmployeeDetails"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div id="Updatepicture" class="modal fade" role="dialog">
  <div class="modal-dialog" style="float:right;width:20%">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
        </h4>
      </div>
      <div class="modal-body">
        <center>
          <p></p>
          <form method="post" action="upload.php" enctype='multipart/form-data'>

            <p style="margin-bottom:10px;">
              Select picture<input name='file2' type='file' id='file2'>
            </p>
            <p>
              <input name='id' type='hidden' value='' id='bookId'>
              <input name='category' type='hidden' value='Administrator'>
              <input type="hidden" name="page" value="users.php" />

            </p>

        </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Change" id="btns1" name="Change"> &nbsp;

      </div>
    </div>
    </form>
  </div>
</div>

<div id="Useradd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
          <center>
            ADD STAFF DETAILS
          </center>
        </h4>
      </div>

      <div class="modal-body">
        <center>
          <form method="post" action="upload.php" enctype='multipart/form-data' style="width: 98%;">


            <p style="margin-bottom:10px;">
              <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="pro">&nbsp;Pro&nbsp;&nbsp; &nbsp; &nbsp;</span>
              <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="dr">&nbsp;Dr &nbsp; &nbsp;&nbsp;&nbsp;</span>
              <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mr">&nbsp;Mr &nbsp; &nbsp; &nbsp;&nbsp;</span>
              <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mrs">&nbsp;Mrs &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
              <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="miss">&nbsp;Miss</span>
            </p>

            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;Firstname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mfname"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Sirname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="msname"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Department:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="minstitution"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="memail"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Email:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mphone"></span></p>
            <p><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;Staff ID:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mpassword"></span></p>
            Add profile picture:<input name='filed' type='file' id='filed'>

            <input type="hidden" name="page" value="admin.php" />
        </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Submit" id="addmember" name="addmember"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

<body class="cbp-spmenu-push">
  <div class="main-content">
    <!--left-fixed -navigation-->
    <?php include "./navigation.php" ?>
    <!--left-fixed -navigation-->

    <!-- header-starts -->
    <div class="sticky-header header-section">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->

        <!--notification menu end -->
        <div class="clearfix"> </div>
      </div>
      <div class="header-right">


        <!--search-box-->

        <div class="profile_details">
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img">
                  <span class="prfil-img">
                    <?php
                    $sql = "SELECT * FROM Profilepictures WHERE ids='$id' && Category='User'";
                    $rget = mysqli_query($db, $sql);
                    $num = mysqli_num_rows($rget);
                    if ($num != 0) {
                      while ($found = mysqli_fetch_array($rget)) {
                        $profile = $found['name'];
                      }
                      echo "<img src='admin/images/$profile' height='50px' width='50px' alt=''>";
                    } else {
                      echo "<img src='admin/images/profile.png' height='50px' width='50px' alt=''>";
                    }

                    ?>
                  </span>
                  <div class="user-name">
                    <p style="color:#1D809F;"><?php if (isset($sirname)) {
                                                echo "<strong>" . $firstname . " " . $sirname . " </strong>";
                                              } ?>
                    </p>
                    <span>Administrator&nbsp;<img src='admin/images/dot.png' height='15px' width='15px' alt=''>
                    </span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>
                </div>
              </a>
              <ul class="dropdown-menu drp-mnu">
                <!-- <li>
                                  <a data-toggle='modal' data-id='<?php echo $id; ?>' href='#Updatepicture' class='open-Updatepicture'><i class="fa fa-user"></i>Change profile picture</a>
                                 </li> -->
                <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
    </div>
    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="charts">
          <div class="mid-content-top charts-grids">
            <div class="middle-content">
              <h4 class="title">Users</h4>
              <!-- start content_slider -->
              <div class="alert alert-info">
                <i class="fa fa-envelope"></i>&nbsp;This screen displays 50 records use the search box to spool more records
              </div>

              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Area Of Assignment</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>PRINT</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sqlmember = "SELECT * FROM Employee ";
                  $retrieve = mysqli_query($db, $sqlmember);
                  $count = 0;
                  while ($found = mysqli_fetch_array($retrieve)) {
                    $count = $count + 1;
                    $id = $found['ID'];
                    $firstName = $found['FirstName'];
                    $middleName = $found['MiddleName'];
                    $lastName = $found['LastName'];
                    $suffix = $found['Suffix'];
                    $gender = $found['Gender'];
                    $position = $found['Position'];
                    $areaOfAssignment = $found['AreaOfAssignment'];
                    $regular_suballotment = $found['Regular_SubAllotment'];
                    $contractDuration_start = $found['ContractDuration_start'];
                    $contractDuration_end = $found['ContractDuration_end'];
                    $inclusiveDateOfEmployment = $found['InclusiveDateOfEmployment'];
                    $salaryGrade = $found['SalaryGrade'];
                    $salary = $found['Salary'];
                    $prc = $found['PRC'];
                    $address = $found['Address'];
                    $birthdate = $found['Birthdate'];
                    $placeOfBirth = $found['PlaceOfBirth'];
                    $nameOfPersonToNotify = $found['NameOfPersonToNotify'];
                    $bloodtype = $found['Bloodtype'];
                    $tinNumber = $found['TINNumber'];
                    $philhealth = $found['Philhealth'];
                    $sss = $found['SSS'];
                    $pagIbigNumber = $found['PagIbigNumber'];
                    $cpNumber = $found['CPNumber'];
                    $emailAddress = $found['EmailAddress'];

                    $fullName = $firstName . " " . $lastName;
                    $contact = $cpNumber . "/" . $emailAddress;
                    echo "<tr>    <td>$id</td>                                       
                          <td>$fullName</td>        	
                          <td>$position</td>
                            <td>$areaOfAssignment</td>
                           <td>$address</td>
			                 <td>$contact</td>
			                 <td>
			                   <a  href='card.php?id=$id' class='btn btn-success' title='click to print ID Card'  target='_blank'><span class='glyphicon glyphicon-print' style='color:white;'></span></a>
                              </td>
			                 <td>
			                   <a data-toggle='modal' data-id='$id' 
                         data-firstname='$firstName'  data-middlename='$middleName' data-lastname='$lastName' data-suffix='$suffix' data-gender='$gender' data-position='$position' data-areaofassignment='$areaOfAssignment' 
                         data-regular_suballotment='$regular_suballotment' data-contractduration_start='$contractDuration_start' data-contractduration_end='$contractDuration_end'
                         data-inclusivedateofemployment='$inclusiveDateOfEmployment' data-salarygrade='$salaryGrade' data-salary='$salary' 
                         data-prc='$prc'  data-address='$address' data-birthdate='$birthdate' data-placeofbirth='$placeOfBirth' data-nameofpersontonotify='$nameOfPersonToNotify' data-bloodtype='$bloodtype' 
                         data-tinnumber='$tinNumber'  data-philhealth='$philhealth' data-sss='$sss' data-pagibignumber='$pagIbigNumber' data-cpnumber='$cpNumber' data-emailaddress='$emailAddress' 
                         class='open-updateProfile btn  btn-info' title='edit user details' href='#updateProfile'><span class='glyphicon glyphicon-edit' style='color:white;'></span></a>
							 
			                 </td>				                 
			                 <td>
			                   <a data-id='$id'  class='open-Delete btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
							 
			                 </td>			 
                             </tr>";
                  }

                  ?>
                </tbody>

              </table>
              <button id="clear-all-button">Clear All Filters</button>

            </div>

          </div>

          <!--//sreen-gallery-cursual---->
        </div>
      </div>
    </div>
    <!--footer-->
    <div class="footer">
      <p>© 2018 Attainment . All Rights Reserved

      </p>
    </div>
    <!--//footer-->
  </div>


</body>

</html>