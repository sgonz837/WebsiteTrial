<?php require_once("header.html"); ?>

<script>
function checkReq(e){
  if((document.getElementById("email").value == "")){
    alert("You Must Enter a Email Address");
    document.getElementById("email").focus();
    e.preventDefault();
  }
  else{
      if (document.getElementById("email").value.indexOf('@') == -1)  {
          alert('Email is not properly formed');
          document.getElementById("User_name").focus();
          e.preventDefault();
      }
  }
  if((document.getElementById("password").value == "")){
    alert("You Must Enter a Password");
    document.getElementById("password").focus();
    e.preventDefault();
  }
}
function ResetForm(e)  {
    if(!confirm('Are you sure you want to clear all form values')) {
      e.preventDefault();
    }
  }
  window.addEventListener( "submit", checkReq);
  window.addEventListener("reset", ResetForm);
</script>

                                <h3>Login</h3>

                                <form method="post" action="login.php">

                                            <table class = "loginbox">

                                                <tr colspan = "1" >
                                                    <td class = "loginbox-text">
                                                        <label class = "required-text">Email Address:</label>
                                                    </td>
                                                    <td>
                                                    <input name = "email" id = "email" type = "text" size = "25">
                                                    </td>
                                                </tr>
                                                <tr colspan ="1">
                                                    <td class = "loginbox-text">
                                                        <label class = "required-text">Password:</label>
                                                    </td>
                                                    <td>
                                                    <input name = "pass" id = "password" type="password" size="25" maxlength="50">
                                                    </td>
                                                </tr>
                                            </form>
                                    </table>
                                        <input name = "submit" type="submit" value="Login"/>
                                        <input type="reset" value ="Reset Form"/><br>
                                        <em>Fields in <p4>red</p4> are required</em>
                                </form>
                            </div>
                        </td>
                </tbody>
        </body>
<?php require_once("footer.html"); ?>
