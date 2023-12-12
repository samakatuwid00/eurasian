<style>
    body {
      margin:0 !important;
      padding:0 !important;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }
    #over {
      font-size: 32px;
      color: white;
      margin: 0.5rem 0.4rem !important;
      padding: 8px; /* Add padding to create a background box */
      background-color: #2c3e50; /* Set your desired background color */
      border-radius: 50%; /* Make it a circle */
      cursor: pointer; /* Add this to indicate it's clickable */
      }
    .round{
      width:30px;
      height:30px;
      border-radius:50%;
      position:relative;
      background:red;
      display:inline-block;
      padding:0.3rem 0.2rem !important;
      margin:0.3rem 0.2rem !important;
      top:1px;
      z-index: 99 !important;
      left: 0; /* Set left to 0 to make it static */
    }
    #bell-count {
      position: absolute;
      top: 0;
      left:96%; /* Adjust the left position as needed */
    }
    .round > span {
      color:white;
      display:block;
      text-align:center;
      font-size:1rem !important;
      padding:0 !important;
      cursor: pointer;
    }
    #list {
      display: none;
      top: 40px;
      position: absolute;
      left: 65%;
      background:none;
      z-index:100 !important;
      width: 25vw;
      margin-left: -37px;
      padding:0 !important;
      margin:0 auto !important;      
      overflow: hidden; /* Add this line to hide the scrollbar */
    }
    .message > span {
      width:100%;
      display:block;
      color:black;
      text-align:justify;
      margin: 0.1rem 0 !important; /* Adjusted margin */
      padding:0.5rem !important;
      /* line-height:1rem !important; */
      font-weight:bold;
      /* border-bottom:1px solid white; */
      font-size:1.2rem !important;
    }
    .message {
      background: #3498db;
      margin:0.5rem 0.2rem !important;
      padding:0.2rem 0 !important;
      width:95%;
      display:block;
    }
    .message > .msg {
      width:90%;
      margin: 0.1rem 0.3rem !important; /* Adjusted margin */
      padding:0.1rem 0.2rem !important;
      text-align:justify;
      font-size: small;
      display:flex;
    }
    .close-icon {
      font-size: 1px;
      position: absolute;
      top: 0mm;
      left: 85%;
      cursor: pointer;
    }
    h6 {
      font-size: 12px;
    }
    #list > li {
    list-style: none;
    margin-bottom: 1px; /* Adjust the margin as needed */
    }
</style>

  <?php
    $find_notifications = "SELECT * FROM notifications WHERE seen = 1";
    $result = mysqli_query($con,$find_notifications);
    $count_active = '';
    $notifications_data = array(); 
    $deactive_notifications_dump = array();
    while($rows = mysqli_fetch_assoc($result)){
            $count_active = mysqli_num_rows($result);
            $notifications_data[] = array(
                        "id" => $rows['id'],
                        "name"=>$rows['name'],
                        "email"=>$rows['email'],
                        "message"=>$rows['message']
            );
    }
    //only five specific posts
    $deactive_notifications = "SELECT * FROM notifications WHERE seen = 0 ORDER BY id DESC LIMIT 0,5";
    $result = mysqli_query($con,$deactive_notifications);
    while($rows = mysqli_fetch_assoc($result)){
      $deactive_notifications_dump[] = array(
                  "id" => $rows['id'],
                  "name"=>$rows['name'],
                  "email"=>$rows['email'],
                  "message"=>$rows['message']
      );
    }
  ?>
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group input-group-outline">
                <!-- <label class="form-label">Type here...</label> -->
                <!-- <input type="text" class="form-control"> -->
              </div>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li>
              <i class="fa fa-bell" id="over" data-value="<?php echo $count_active;?>" style="font-size: 32px; color: white; margin: 0.5rem 0.4rem !important;"></i>
              <?php if (!empty($count_active)) { ?>
                <div class="round" id="bell-count" data-value="<?php echo $count_active; ?>"><span><?php echo $count_active; ?></span></div>
              <?php } ?>
            </li>
              <?php if(!empty($count_active)){?>
                <div id="list">
                <?php
                    foreach($notifications_data as $list_rows){?>
                      <li id="message_items">
                      <div class="message alert alert-warning" data-id=<?php echo $list_rows['id'];?>>
                      <span class="close-icon" id="close-contact-form">
                        <img src="../Images/trash-outline.svg" alt="Trash Can" style="width:18px; height:20px;">
                      </span>
                        <span><?php echo $list_rows['name'];?>
                        <h6><?php echo $list_rows['email'];?></h6></span>
                        <div class="msg">
                          <p><?php 
                            echo $list_rows['message'];
                          ?></p>
                        </div>
                      </div>
                      </li>
                  <?php }
                ?> 
                </div> 
              <?php }else{?>
              <!--old Messages-->
              <div id="list">
              <?php
                foreach($deactive_notifications_dump as $list_rows){?>
                  <li id="message_items">
                  <div class="message alert alert-danger" data-id=<?php echo $list_rows['id'];?>>
                    <span><?php echo $list_rows['name'];?></span>
                    <br>
                    <h6><?php echo $list_rows['email'];?><h6></span>
                    <div class="msg">
                      <p><?php 
                        echo $list_rows['message'];
                      ?></p>
                    </div>
                  </div>
                  </li>
                <?php }
              ?>
              <!--old Messages-->
              <?php } ?>
            </div>
          </ul>
        </div>
      </nav>
    </body>
  </html>

