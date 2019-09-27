<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="http://localhost/user_plant/index.php" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="http://localhost/user_plant/images/faces/face8.jpg" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name">Allen Moreno</p>
          <p class="designation">Administrator</p>
        </div>
        <div class="icon-container">
          <i class="icon-bubbles"></i>
          <div class="dot-indicator bg-danger"></div>
        </div>
      </a>
    </li>
    <li class="nav-item" id="user_manage">
      <a class="nav-link" href="##">
        <span class="menu-title">Plant manage</span>
        <i class=" icon-fire menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- active nav-item -->
<?php
  require('oop/template.php');
  $setActive = new template();
?>