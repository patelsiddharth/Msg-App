<?php
session_start();
if(!isset($_SESSION["id"]))
{
    header("location:index.php");
    exit;
}
$con = mysqli_connect("localhost","root","","msgapp");
?>
<?php 
include "header.php";
?>

    <!-- <div class="container" style="padding-top:70px">    
      <form action="search.php" method="post">
        <div class="form-group row">
          <div class="col-md-8">
          <input type="text" class="form-control" placeholder="Enter username" aria-describedby="basic-addon2" name="search" required=""></div>
          <div class="col-md-4" style="padding-left: 0px;"><button class="btn btn-secondary" style="width: 200px;" name="btn_search">Search</button></div>
        </div>
      </form>
      <?php
        if(!$_GET['id'])
        {
          echo '
          <div class="card" style="width: 100%;">
          <ul class="list-group list-group-flush"> 
              <li class="list-group-item" style="height: 55px;line-height: 35px;">
                  NO USER FOUND  
              </li>
          </ul>
          </div>';
        }
        else/*if(isset($_GET['id']))*/
        {
          $sql = "select * from user where id=".$_GET['id'];
          $con = mysqli_connect("localhost","root","","msgapp");
          $result = mysqli_query($con,$sql);
          $row = mysqli_fetch_assoc($result);
          echo '
          <div class="card" style="width: 100%;">
          <ul class="list-group list-group-flush"> 
              <li class="list-group-item" style="height: 55px;line-height: 35px;">'.$row["name"].'
                <a href="home.php?id='.$_GET["id"].'" class="btn btn-success" style="float: right;">Send Message</a> 
              </li>
          </ul>
          </div>';}
      ?>
    </div>  -->
<div class="container" style="padding-top: 50px;">
<div class="row">
  <div class="col-md-4">
    <h3>All Users</h3>
    <div class="card" style="width: 100%;overflow-y: scroll;height: 470px;">
        <ul class="list-group list-group-flush">        
              <?php
                  $con = mysqli_connect("localhost","root","","msgapp");
                  $sql = "select * from user where not id = ".$_SESSION["id"];
                  $result = mysqli_query($con,$sql);
                  while($row = mysqli_fetch_assoc($result))
                  {
                      echo "<li class='list-group-item'style='height: 55px;line-height: 35px;'><a href='home.php?id=".$row['id']."' class='btn btn-secondary' style='width:100%;background:#1da1f2;color:white;' data-rid=".$row['id']." id='r'>".$row['name']."
                      </a></li>";
                  }
              ?>
        </ul>
      </div>
  </div>
  <div class="col-md-8"><h3>Messages - 
  <?php
  if(isset($_GET['id']))
  {
    $sql = "select * from user where id=".$_GET['id'];
    $con = mysqli_connect("localhost","root","","msgapp");
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
    //print_r($row);
    echo $row['name'];
  }
  ?>  </h3>

  <div id="scroll" class="pm_area">
  <div class="col-md-12" id="msg_scroll" style="float: left;padding-top: 15px;">
    <div class="card card-body">
        <!-- <?php
          include"msg_load.php";
        ?>  -->
       <?php
            if(isset($_GET['id']))
            {
            $sql = "select * from message where receiver_id=".$_SESSION["id"]." and sender_id=".$_GET['id']." or sender_id=".$_SESSION["id"]." and receiver_id=".$_GET['id']." order by m_id";
            $con = mysqli_connect("localhost","root","","msgapp");
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);

            $q="select name from user where id=".($_GET["id"]);
            $con = mysqli_connect("localhost","root","","msgapp");
            $r = mysqli_query($con,$q);
            $row1 = mysqli_fetch_assoc($r);

            while($row = mysqli_fetch_assoc($result))
            {
              echo "<div style='clear:both;'></div>";
              if($row['sender_id']==$_SESSION['id'])
              {     
                    echo'
                     <div>
                     <img src="cp.jpg" class="cps" data-toggle="tooltip" data-placement="top" 
                     title='.($_SESSION["username"]).'>
                     </div>&nbsp;
                     <div class="well sender" id="msg" data-id="'.$row["message"].'">                
                     '.$row["message"].'
                     <div class="del_btn_s" data-id="'.$row["m_id"].'" data-did="'.$row["receiver_id"].'"><a href="del_msg.php?m_id='.$row["m_id"].'"><i class="fas fa-trash-alt"></i></a></div>
                     </div>
                     ';
                     $row['time'] = date('Y-m-d h:i:sa');
                   /*<footer class="blockquote-footer">Time : '.$row["time"].'</footer>*/
              }
              echo "<div style='clear:both;'></div>";
              if($row['sender_id']==$_GET['id'])
              {
                     echo'
                     <div><img src="download.png" class="cpr" data-toggle="tooltip" data-placement="top" 
                     title='.$row1['name'].'></div>
                     <div class="well receiver">
                          '.$row["message"].'
                     <div class="del_btn" data-id="'.$row["m_id"].'" data-did="'.$row["sender_id"].'"><a><i class="fas fa-trash-alt" style="padding-left:15px;"></i></a></div>
                     </div>';              
                     $row['time'] = date('Y-m-d h:i:sa');
              }
            }
          }
          else
            echo "<div><img src='msg.png' alt='message image' style='height: 90%;width: 80%;margin: 0px 79px;'></div>";
        ?> 
        </div>
  </div>
  <div style="clear: both;"></div>
  </div>
  <div class="col-md-8 msg_box">
    <form method="post" name="myform" id="myform">
      <div class="col-md-9 msg_area">
        <textarea placeholder=" Enter Message.." name="message" id="msg" class="msg_typing_area"></textarea>
      </div>
    <div class="col-md-3 send_btn_div">
      <button class="btn btn-secondary send_btn" name="send" id="send" data-id="<?php echo $_GET['id'];?>"><b>SEND</b></button>
      <input type="hidden" name="r_id" value="<?php echo $_GET['id'];?>">
    </div>
    </form>
  </div>
  </div>
</div>
<?php 
include "footer.php";
?>
<script type="text/javascript">
  $(document).ready(function(){
  $("#scroll").scrollTop($("#scroll")[0].scrollHeight);
  $("#send").click(function(event){

    event.preventDefault();
    var id = $(this).attr("data-id")
    $.ajax({
      url : "send_msg.php",
      method : "post",
      data : $('form').serialize(),
      dataType : "text",
      success: function(data)
      {
          $("#msg_scroll").load("msg_load.php?id="+id)
          $("#myform")[0].reset();
          /*setInterval(function()
          {
              $('#msg_scroll').load('msg_load.php?id='+id);
          },100);*/
          var link=$("#scroll");
          link.animate({
          scrollTop: link.offset().top+$('#msg_scroll').height()},
          'slow');
          
      }
    })
  })
  })
  $(document).ready(function(){
    $(".del_btn a, .del_btn_s a").click(function(e) {
      e.preventDefault();
    })
  $(".del_btn, .del_btn_s").click(function(event){
    event.preventDefault();
    //$(this).parent().parent().remove();
    var msg_id = $(this).attr("data-id")
    var id = $(this).attr("data-did")
    if(msg_id) 
    {
      $.ajax({
        url : "del_msg.php?msg_id="+msg_id,
        method : "post",
        success: function(data)
        {
            $("#msg_scroll").load("msg_load.php?id="+id)    
        }
      })
    }
    else {
      console.log("error")
      console.log($(this))
    }
  })
  })
  
</script>