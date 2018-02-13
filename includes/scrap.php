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