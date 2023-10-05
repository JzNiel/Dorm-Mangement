<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dropdown Menu with Search Box | CodingNepal</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
        <div class="logo "><a href="profile.php"><img src="2.png" alt="" height="60" width="60" ></a></div>
      <div class="logo"> <a href="profile.php">Ocean Of Kwonledge</a></div>
        <ul class="links">
          <li><a href="leavesection.php">Request Form</a></li>
          <li>
            <a href="#" class="desktop-link">Edit Profile +</a>
            <input type="checkbox" id="show-services">
            <label for="show-services">Edit Profile +</label>
            <ul>
              <li><a href="editprofile.php">Edit Profile</a></li>
              <li><a href="add-logbook.php">Logbook</a></li>
              <li><a href="changepassword.php">Change Password</a></li>
              <li><a href="addpayment.php">Payment</a></li>
            </ul>
          </li>
          <li><a href="profile.php">My Profile</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>

      
    </nav>
  </div>

</body>
</html>