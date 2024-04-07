<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"   id="signupModalLabel">SignUp</h5>
        
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
   
      <div class="modal-body">
      <form action="repeatedcode/_handlesignup.php" method="post" >
        
        <div class="form-group">
          <label for="signup">Username</label>
          <input type="username" class="form-control" id="signup" aria-describedby="emailHelp" name="email" placeholder="Make a username" required >
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Make a Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
        </div>
        <div class="form-group">
          <label for="cpassword">Confirm Password</label>
          <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Please Enter the same password as above"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
        </div>
        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    
    
        <button type="submit" class="btn btn-primary">SignUp</button>
        <input type="reset" class="btn btn-danger ml-2" value="Reset">
       
       
      </form>
      
     
      </div>
     
    </div>
  </div>
</div>
