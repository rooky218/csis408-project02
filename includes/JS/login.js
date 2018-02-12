//valid fields on login page, check null, check valid entry
var x = document.forms["login-frm"]["uName"].value; //email

function validateForm() {
      //set variables
      var x = document.forms["login-frm"]["uName"].value; //email
      var y = document.forms["login-frm"]["pword"].value; //password

      //check for null values and display error
      if (x == "" && y == "") { //missing user and pass
          
              //Display error - missing fields
              document.getElementById("alert-missing-danger").style.display = "block"; //show message

          return false;

      } else if (x == "") { //missing user
          
            //Display error - missing fields
            document.getElementById("alert-missing-danger").style.display = "block"; //show message

        return false;

      } else if (y == "") { //missing pass
          
        //Display error - missing fields
        document.getElementById("alert-missing-danger").style.display = "block"; //show message

        return false;

      }//end else if

  }//end function


