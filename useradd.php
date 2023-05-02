<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>

<body>
    <?php
    include "./imports.php";
    include "./navigation.php";
    ?>
    <div class="modal-dialog">
        <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
            <div class="modal-header" style="background:#222d32">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
                    <center>
                        ADD EMPLOYEE DETAILS
                    </center>
                </h4>
            </div>

            <div class="modal-body">
                <center>
                    <form method="post" action="upload.php" enctype='multipart/form-data' style="width: 98%;">

                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;First Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="firstName"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Middle Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="middleName"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Last Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="lastName"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suffix:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="suffix"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Gender:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="gender"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Position:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="position"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Area of Assignment<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="areaOfAssignment"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Regular/SubAllotment:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="regular_suballotment"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Contract Duration(start)<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="contractDuration_start"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Contract Duration (end)<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="contractDuration_end"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Inclusive Date of Employment:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="inclusiveDateOfEmployment"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Salary Grade:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="salaryGrade"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Salary:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="salary"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;PRC ID Number (if application):<label style="color: red;font-size:20px;"></label><input style="width:270px;" type="text" name="prc"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Address:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="address"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Birthdate:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="birthdate"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Place of Birth:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="placeOfBirth"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Name of Person to Notify in Case of Emergency:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="nameOfPersonToNotify"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Bloodtype:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="bloodType"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;TIN Number:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="tinNumber"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;PHILHEALTH:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="philhealth"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;SSS:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="sss"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;PAGIBIG Number:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="pagibigNumber"></span></p>
                        <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;CP Number:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="cpNumber"></span></p>
                        <p><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;Email Address:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="emailAddress" id='oldpass'></span></p>
                        Add Signature photo:<input name='sigFiled' type='file' id='sigFiled'>
                        Add ID photo:<input name='IDFiled' type='file' id='IDFiled'>
                        <input type="hidden" name="page" value="admin.php" />
                </center>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Submit" id="addEmployee" name="addEmployee"> &nbsp;
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</body>

</html>