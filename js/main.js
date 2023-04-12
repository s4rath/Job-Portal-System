function validate() {
    var password_input = document.getElementById("password");
    var confirm_password_input = document.getElementById("confirm_password");
    var password = password_input.value;
    var confirm_password = confirm_password_input.value;
    var phone_number_ip = document.getElementById("phno");
    var phone_number = phone_number_ip.value;
    var name_input = document.getElementById("name");
    var name= name_input.value;
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    function validateName(name) {
        var nameRegex = /^[a-zA-Z\s]+$/;
        return nameRegex.test(name);
      }
      if (!validateName(name)) {
        alert("Please enter a valid name");
        return false;
      }
    if (phone_number.length != 10) {
        alert("Phone number must be 10 digits");
        // e.preventDefault();
        return false;
    } else {
        phone_number_ip.setCustomValidity("");
    }
    // Check password match
    if (password != confirm_password) {
        alert("Passwords do not match!");
        // e.preventDefault();
        return false;
    }

    // Check password validation
    
    else if(!passwordRegex.test(password)) {
        alert("Password must contain at least one digit, one lowercase letter, one uppercase letter, and be at least 8 characters long");
        // e.preventDefault();
        return false;
    }
   

}

