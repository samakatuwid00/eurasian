<style>
    .close-icon {
    top: 10px;
    right: 50px;
    font-size: 35px;
    cursor: pointer;
    color: black;
    transition: color 0.3s; /* Add the transition property for color change */
    }
    .close-icon:hover {
        color: red; /* Change the color when hovered */
    }
</style>
</main>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/smooth-scrollbar.min.js"></script>

    <script src="assets/js/custom.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>"

    <!--    Alertify     -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>

        <?php if(isset($_SESSION['message'])) 
        { 
            ?>
            alertify.set('notifier','position', 'top-right');
            alertify.success('<?= $_SESSION['message']; ?>');
            <?php 
            unset($_SESSION['message']);
        } 
        ?>
    </script>
    <script>
    // Add a click event handler for the "Ban" buttons
    const banButtons = document.querySelectorAll('.ban_users_btn');
    banButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (button.innerText === 'Ban') {
                button.innerText = 'Unban';
                // You can add code here to perform the banning action.
            } else {
                button.innerText = 'Ban';
                // You can add code here to perform the unbanning action.
            }
        });
    });
    </script>
    <script>
    // JavaScript to close a specific list with confirmation and redirect to deactive.php
    document.querySelectorAll(".close-icon").forEach(function (closeIcon) {
        closeIcon.addEventListener("click", function () {
        // Display a confirmation dialog
        var confirmation = window.confirm("Are you sure you want to delete this?");
        
        // If the user clicks OK in the confirmation dialog
        if (confirmation) {
            var list = closeIcon.closest(".message");
            if (list) {
            // Extract the data-id attribute from the list for identification
            var dataId = list.getAttribute("data-id");

            // Redirect to deactive.php with the data-id parameter
            window.location.href = 'deactive.php?id=' + encodeURIComponent(dataId);
            }
        }
        });
    });
    </script>
<script>
    $(document).ready(function(){
        var ids = new Array();
        $('#over').on('click',function(){
            $('#list').toggle();  
        });

   //Message with Ellipsis
   $('div.msg').each(function(){
       var len =$(this).text().trim(" ").split(" ");
      if(len.length > 12){
         var add_elip =  $(this).text().trim().substring(0, 99);
         $(this).text(add_elip);
      }
    }); 

   $("#bell-count").on('click',function(e){
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');
        
        if(belvalue == ''){
         
          console.log("inactive");
        }else{
          $(".round").css('display','none');
          $("#list").css('display','block');
          
          $('.message').each(function(){
          var i = $(this).attr("data-id");
          ids.push(i);
          
          });
        //   Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'deactive.php',
                type:'POST',
                data:{"id":$(this).attr('data-id')},
                success:function(data){
                 
                    console.log(data);
                    location.reload();
                    }
                });
            });
        }
   });

   $('#notify').on('click', function(e){
      e.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
      var ins_msg = $('#message').val();

      if ($.trim(name).length > 0 && $.trim(ins_msg).length > 0) {
          var form_data = $('#frm_data').serialize();
          $.ajax({
              url: 'insert.php',
              type: 'POST',
              data: form_data,
              success: function(data) {
                  if (data) {
                      alert("Message Sent! Check Your Email For Updates");
                  } else {
                      echo("Failed To Send Message. Please try again.");
                  }
              }
          });
      } else {
          alert("Please fill in all the fields");
      }
  });
});
</script>
</body>
</html>
