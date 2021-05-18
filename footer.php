 <!-- Script -->

 <!-- JQuery -->
 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 	<!-- Sweet Alert -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Toastr Alert -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	

 <script>
   //Apply Animation

   $(document).ready(function() {
     $('.plus').toggleClass('active');
     $('.overlay').toggleClass('active');
     $('.wrapper').toggleClass('active');
   });

   // Close Animation

   $(document).ready(function() {
     $('.plus').click(function() {
       $('.plus').toggleClass('active');
       $('.overlay').toggleClass('active');
       $('.wrapper').toggleClass('active');
     });
   });

  //  Ajax Real Time Input Check

   $(document).ready(function() {
     $('#email, #username').blur(function() {
       let postData = $(this).val();
       $.ajax({
         url: "check.php",
         method: "POST",
         data: {
           post_data: postData,
           post_id: this.id
         },
         success: function(data) {
          toastr.info('"' + data + '"');
         }
       })
     })
   });
 </script>

 </body>

 </html>