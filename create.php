<?php require_once("header.html"); ?>


<script>
    function checkReq(e){
        if((document.getElementById("user").value == "")){
          alert("You Must Enter a User Name");
          document.getElementById("user").focus();
          e.preventDefault();
        }

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

        if((document.getElementById("confirmEmail").value == "")){
          alert("You Must Enter a Confirm Email Address");
          document.getElementById("confirmEmail").focus();
          e.preventDefault();
        }

        if(document.getElementById("email").value != document.getElementById("confirmEmail").value){
          alert("Email and Confirm Email Does not Match");
          document.getElementById("email").focus();
          e.preventDefault();
        }

        if((document.getElementById("password").value == "")){
          alert("You Must Enter a Password");
          document.getElementById("password").focus();
          e.preventDefault();
        }
        else{
            if((document.getElementById("password").value.length < 5)){
              alert("Password is less than 5 characters");
              document.getElementById("password").focus();
              e.preventDefault();
            }
        }
        if((document.getElementById("confirmPassword").value == "")){
          alert("You Must Enter a Confirm Password");
          document.getElementById("confirmPassword").focus();
          e.preventDefault();
        }



        if(document.getElementById("password").value != document.getElementById("confirmPassword").value){
          alert("Password and Confirm Password Does not Match");
          document.getElementById("password").focus();
          e.preventDefault();
        }
        if((document.getElementById("phone").value != "")){

          if((document.getElementById("phone").value.length != 5)){
            alert("Phone Number is not Properly Formed");
            document.getElementById("phone").focus();
            e.preventDefault();
          }
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

                        <h3>Create Account</h3>
                        <form method="post" action="addAccount.php">
                            <table class = "loginbox">
                              <tr colspan = "1">
                                        <td colspan = "1" class = "loginbox-text">

                                                <label for ="user" class ="required-text">
                                                    User Name:
                                                </label>
                                        </td>
                                        <td>
                                            <input name = "user" id = "user" type = "text" size = "25">


                                        </td>
                              </tr>
                              <tr>
                                        <td colspan = "1" class = "loginbox-text">
                                            <label class = "required-text">Email Address:</label>
                                        </td>
                                        <td>
                                            <input name = "email" id = "email" type = "email" size = "25">
                                        </td>
                              </tr>
                              <tr>
                                        <td class = "loginbox-text">
                                            <label class = "required-text">Confirm Email Address:</label>
                                        </td>
                                        <td>
                                          <input name = "email" id = "confirmEmail" type = "email" size = "25">
                                      </td>
                              </tr>
                              <tr>
                                        <td colspan = "2">Select a password (minimum of 5 characters):</td>
                              </tr>
                              <tr>
                                        <td colspan = "1" class = "loginbox-text">
                                            <label class = "required-text">Password:</label>
                                        </td>
                                        <td>
                                            <input name = "pass" id = "password" type="password" size="25" maxlength="50">
                                        </td>
                              </tr>
                              <tr>
                                        <td class = "loginbox-text">
                                            <label class = "required-text">Confirm Password:</label>
                                        </td>
                                        <td>
                                          <input name = "pass" id = "confirmPassword" type="password" size="25" maxlength="50">
                                      </td>
                              </tr>
                              <tr>
                                      <td class = "loginbox-text">
                                          <label>Phone:</label>
                                    </td>
                                    <td>
                                        <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                                      </td>

                              </tr>
                            </table>
                                <input type = "submit" value = "Create Account"/>
                                <input type="reset"  value ="Reset Form"/><br>
                                <em>Fields in <p4>red</p4> are required</em>


                        </form>
                    </div>
                </td>
                </tbody>
        </body>
<?php require_once("footer.html"); ?>
