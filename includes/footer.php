<!-- Footer -->
<footer class="footer">
    <div class="container1">
        <div class="col-md-12 text-center">
            <p>&copy; 2023 Eurasian Paradise Resort. All Rights Reserved.</p>
        </div>
    </div>
</footer>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/custom.js"></script>   
    
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
    $(document).ready(function() {
        var maxLength = 99; // Adjust this value according to the maxlength attribute

        $('#message').keyup(function() {
            var length = $(this).val().length;
            var remaining = maxLength - length;

            // Update the character count
            $('#charCount').text(length + '/' + maxLength);

            // Disable the textarea if the limit is reached
            if (length > maxLength) {
                $(this).val($(this).val().substring(0, maxLength));
                $('#charCount').text(maxLength + '/' + maxLength);
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
         var add_elip =  $(this).text().trim().substring(0, 65);
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
          
          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);
          
          // });
          //Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'./connection/deactive.php',
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
              url: './connection/insert.php',
              type: 'POST',
              data: form_data,
              success: function(data) {
                  // Check the response from the server
                  if (data) {
                    alert("Message Sent! Check Your Email For Updates");
                    location.reload();
                  } else {
                    alert("Failed To Send Message. Please try again.");
                  }
              }
          });
      } else {
          alert("Please fill in all the fields");
      }
  });
});
</script>

