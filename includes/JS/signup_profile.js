//this function checks if the user has entered a value into username
//and password. If null, it sends an error to the form from
//used for signup form

    function validateForm() {
    
        //load values for form inputs
      var xin = [
        document.forms['signup-frm']['fName'].value,
        document.forms['signup-frm']['lName'].value,
        document.forms['signup-frm']['phone'].value,
        document.forms['signup-frm']['zip'].value,
      ];


      //set alerts for null values
      for(var i = 0; i < 4; i++){
        if(xin[i] == ""){
          document.getElementById("alert-missing-danger").style.display = "block";
            return false;
        }//end if
      }// end for
    }//end function


//add hyphens to phone number
function adhyphen(){
    
}
