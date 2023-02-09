<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
      <span class="logo_name">epicStream</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../AddGame/AddGame.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Add Game Category</span>
          </a>
        </li>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Milot Hoti</span>
        <i class='bx bx-chevron-down' ></i>
        
      </div>
    </nav>
    <div class="home-content">
      <div class="overview-boxes">
      <div class="box" >
  <div class="right-side">
    <div class="box-topic">Total Users</div>
    <div class="number">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "videogamelivestreaming_db");
        $sql = "SELECT COUNT(*) as total_users FROM users";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        echo $data['total_users'];
      ?>
    </div>
  </div>
  <i class='bx bx-user cart four'></i>
</div>

        <div class="box">
          <div class="right-side">
            <div class="box-topic">Game Categories</div>
            <div class="number">6</div>
          </div>
          <i class='bx bx-category cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Messages</div>
            <div class="number">0</div>
          </div>
          <i class='bx bx-message cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Today New Users</div>
            <div class="number">0</div>
          </div>
          <i class='bx bx-user cart' ></i>
        </div>
      </div>

      <div class="users-boxes">
  <div class="recent-users box">
    <div class="title">Recent Users</div>
    <div class="sales-details">
      <ul class="details">
        <li class="topic">id</li>
        <?php
          $conn = mysqli_connect("localhost", "root", "", "videogamelivestreaming_db");
          $sql = "SELECT id, username, email FROM users ORDER BY id DESC LIMIT 6";
          $result = mysqli_query($conn, $sql);
          while ($data = mysqli_fetch_assoc($result)) {
            echo "<li><a href='#'>" . $data['id'] . "</a></li>";
          }
        ?>
      </ul>
      <ul class="details">
        <li class="topic">User</li>
        <?php
          $result = mysqli_query($conn, $sql);
          while ($data = mysqli_fetch_assoc($result)) {
            echo "<li><a href='#'>" . $data['username'] . "</a></li>";
          }
        ?>
      </ul>
      <ul class="details">
        <li class="topic">Email</li>
        <?php
          $result = mysqli_query($conn, $sql);
          while ($data = mysqli_fetch_assoc($result)) {
            echo "<li><a href='#'>" . $data['email'] . "</a></li>";
          }
        ?>
      </ul>
    </div>
    <br>
          <div class="button">
            <a href="users.php">See All</a>
          </div>
        </div>
        <div class="top-viewed box">
          <div class="title">Top Viewed Games</div>
          <ul class="top-games-details">
            <li>
            <a href="#">
              <!--<img src="images/sunglasses.jpg" alt="">-->
              <span class="game">CS:GO</span>
            </a>
            <span class="price">48234 views</span>
          </li>
          <li>
            <a href="#">
               <!--<img src="images/jeans.jpg" alt="">-->
              <span class="game">GTA 5 </span>
            </a>
            <span class="price">39986 views</span>
          </li>
          <li>
            <a href="#">
             <!-- <img src="images/nike.jpg" alt="">-->
              <span class="game">Fifa</span>
            </a>
            <span class="price">37876 views</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/scarves.jpg" alt="">-->
              <span class="game">Call Of Duty</span>
            </a>
            <span class="price">27531 views</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/blueBag.jpg" alt="">-->
              <span class="game">Dota 2</span>
            </a>
            <span class="price">14421 views</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/bag.jpg" alt="">-->
              <span class="game">Fortnite</span>
            </a>
            <span class="price">13341 views</span>
          
          </ul>
        </div>
        
      </div>
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
 let sidebarBtn = document.querySelector(".sidebarBtn");
 sidebarBtn.onclick = function() {
   sidebar.classList.toggle("active");
   if(sidebar.classList.contains("active")){
   sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
 }else
   sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
 }
  </script>

</body>
</html>

