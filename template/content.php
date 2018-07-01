<!-- Content area starts here-->

     <div id="content">

       <div>
         <img src="images/image.jpg" style="float: left;width: 800px; background-color: transparent;" />
       </div>

       <div id="form2" style="float: right;">
         <form action="" method="post">
           <table>
              <tr>
                <td colspan="2" align="center"><h2>Sign Up Today!</h2></td>
              </tr>
              <tr>
                <td><strong>Name:</strong></td>
                <td><input type="text" name="u_name"
                  required="required" placeholder="Enter your name"></td>
              </tr>
             <tr>
                <td><strong>password:</strong></td>
                <td><input type="password" name="u_password"
                  required="required" placeholder="Enter your password"></td>
              </tr>

              <tr>
                <td><strong>Email:</strong></td>
                <td><input type="email" name="u_email"
                  required="required" placeholder="Enter your Email"></td>
              </tr>
              <tr>
                <td><strong>Country:</strong></td>
                <td>
                  <select name="u_country">
                    <option>Select Country</option>
                    <option>India</option>
                    <option>Pakistan</option>
                    <option>Nepal</option>
                    <option>Bhutan</option>
                    <option>Other</option>
                  </select>

                </td>

              </tr>

              <tr>
                <td><strong>Gender:</strong></td>
                <td>
                  <select name="u_gender">
                    <option>Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>

                </td>
              </tr>
              <tr>
                <td><strong>Birthday:</strong></td>
                <td><input type="date" name="u_birthday"
                  required="required" placeholder="mm/dd/yyyy"></td>
              </tr>
              <tr >
                <td colspan="2" align="center"><input type="submit" name="sign_up" id="button" value="Singup" /></td>
              </tr>

              <tr>  
                <td colspan="4"><?php include("insert_user.php"); ?></td>
              </tr>

           </table>

         </form>

       </div>

     </div>
  
   <!-- Content area ends here-->