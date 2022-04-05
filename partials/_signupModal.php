
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="z-index:10000;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="/OS-Visual-Studio/partials/_handleSignup.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> User Email</label>
              <input type="text" class="form-control" id="signupEmail" name="signupEmail" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Enter password" required>
            </div>
			<div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Confirm Password</label>
              <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" placeholder="Enter password" required>
            </div>
            <!-- <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div> -->
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Sign Up</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <!-- <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p> -->
        </div>
      </div>
      
    </div>
  </div> 