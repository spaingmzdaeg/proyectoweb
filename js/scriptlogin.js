
  
  function validateForm() {
    var username = document.forms["addformuser"]["username"].value;
    var password = document.forms["addformuser"]["password"].value;
    
    
    if (username == "") {
      alert("username must be filled out");
      return false;
    }else if(username.length < 10){
      alert(" please min 10 characters ");
      return false;
    }else if(username.length > 20){
      alert(" please max 20 characters ");
      return false;
    }else if(password.length < 10){
      alert(" please min 10 characters ");
      return false;
    }else if(password.length > 20){
      alert(" please max 20 characters ");
      return false;
    }else if(password == ""){
      alert("password must be filled out");
      return false;
    }else {
      return true;
    }
    
  }

  var username = document.forms["addformuser"]["username"].value;
  var password = document.forms["addformuser"]["password"].value;
  
  
  if (username == "") {
    alert("username must be filled out");
    return false;
  }else if(username.length < 10){
    alert(" please min 10 characters ");
    return false;
  }else if(username.length > 20){
    alert(" please max 20 characters ");
    return false;
  }else if(password.length < 10){
    alert(" please min 10 characters ");
    return false;
  }else if(password.length > 20){
    alert(" please max 20 characters ");
    return false;
  }else if(password == ""){
    alert("password must be filled out");
    return false;
  }else {
    return true;
  }
  