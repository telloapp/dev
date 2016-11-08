alert('successfully uploaded');
        window.location.href='index1.php?success'; // note : this js
  </script>
  <?php
 }
//else
 {
  ?>
  <script>
  alert('error while uploading file');               // note : this js
        window.location.href='index1.php?fail';