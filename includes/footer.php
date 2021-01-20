

<!-- Main Footer -->
<footer class="main-footer text-center">
  <strong>Copyright &copy; 2021 <a href="index.php">BulSU iLearn</a>. All rights reserved. 
</footer>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>

$("#loginBTN").click(function () {
      var emailuser = document.getElementById("emailuserInput").value;
      var passinput = document.getElementById("passwordInput").value;

      if (emailuser == '' || emailuser == '' || passinput == ''){
        document.getElementById("alertLogininfo").style.display = "block";
        document.getElementById("alertLogininfo").innerHTML = "Some input fields are empty. Fillup the fields first before you can  login.";
      }
      else if (emailuser == 'admin' || emailuser == 'admin@admin.com'){
        if (passinput == '1234'){
          document.location.href="admin"; 
        }
        else {
          document.getElementById("alertLogininfo").style.display = "block";
          document.getElementById("alertLogininfo").innerHTML = "Wrong Username or Password. Try again.";
        }
      }
      else if (emailuser == 'junevcruz' || emailuser == 'junevcruz@gmail.com'){
        if (passinput == '1234'){
          document.location.href="student"; 
        }
        else {
          document.getElementById("alertLogininfo").style.display = "block";
          document.getElementById("alertLogininfo").innerHTML = "Wrong Username or Password. Try again.";
        }
      }
      else {
          document.getElementById("alertLogininfo").style.display = "block";
          document.getElementById("alertLogininfo").innerHTML = "Wrong Username or Password. Try again.";
        }
            
     });
</script>
</body>
</html>
