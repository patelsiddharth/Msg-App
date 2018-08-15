<?php
            session_start();
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
                     <div class="well sender">                
                     '.$row["message"].'
                     <div class="del_btn_s" data-id="'.$row["m_id"].'" data-did="'.$row["receiver_id"].'"><a href="del_msg.php?m_id='.$row["m_id"].'"><i class="fas fa-trash-alt"></i></a></div>
                     </div>
                     ';
              }
              echo "<div style='clear:both;'></div>";
              if($row['sender_id']==$_GET['id'])
              {
                     echo'
                     <div><img src="download.png" class="cpr" data-toggle="tooltip" data-placement="top" 
                     title='.$row1['name'].'></div>
                     <div class="well receiver">
                          '.$row["message"].'
                     <div class="del_btn" data-id="'.$row["m_id"].'" data-did="'.$row["sender_id"].'"><a href="del_msg.php?m_id='.$row["m_id"].'"><i class="fas fa-trash-alt"></i></a></div>
                     </div>';
              }
            }
        ?>
<script type="text/javascript">
  $(document).ready(function()
  {
    /*$("#scroll").scrollTop($("#scroll")[0].scrollHeight);*/
    $(".del_btn a, .del_btn_s a").click(function(e) {
      e.preventDefault();
    })
    $(".del_btn, .del_btn_s").click(function(event){
    event.preventDefault();
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

