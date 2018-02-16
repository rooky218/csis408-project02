<!-- email input -->
                <label for="email">Email address</label>
                <div id="uname-div" class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>

                    <input type="text" id="username" class="form-control" name="uName" placeholder="john123@domain.com" value="<?php echo $_SESSION["return_un"];?>">
                    <span id="uname-x" class="glyphicon glyphicon-remove form-control-feedback" style="display: none;">
                    </span>

                </div>

                <br/>

                <!-- password input -->
                <label for="password">Password</label>
                <div id="pword-div" class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                    </span>

                    <input type="password" id="password" class="form-control" name="pword" placeholder="Password" value="<?php echo $_SESSION["return_pw"];?>">
                        <span id="pword-x" class="glyphicon glyphicon-remove form-control-feedback" style="display: none;">
                        </span>
                </div>




                if(myisset($_SESSION['counter_pv'])){
                  $_SESSION['counter_pv'] = $_SESSION['counter_pv'] + 1;
                } else {
                  $_SESSION['counter_pv'] = 1;
                }

                if($_SESSION['counter_pv'] <= 4){

                  //if form data submitted...
                  if(myisset($user_code)){
                    //if user form submitted
                    for($i = 0; $i < 18; $i++){
                      //run loop until match is found
                      if($_SESSION["code_array"][$i] == $user_code){
                        //if match Confirmed
                        $phone_code_confirmed = $_SESSION["code_array"][$i];
                        $phone_address_confirmed = $_SESSION["address_array"][$i];
                        $match == true;
                        //UPLOAD CONFIRMED TO DB
                      }//end if
                    }//end for loop
                    if($match == false){
                      //if not match found, return error message
                      $invalid_code = true;
                    }
                  } elseif($_SESSION["counter_pv"] == 1){
                    //if this is first time page load
                    return;

                  } else {
                    //if myisset not set
                    //and not first time page load
                    //return error
                    $invalid_code = true;
                  }
                } else {
                  //user has made 3 attempts
                  //return error message
                  //$invalid_exceeded_attempts = true;
                  $change_display = true;
                }
