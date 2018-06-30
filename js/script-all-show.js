var signup = "<div class=\"padded-container account-utils\">";
signup += "<h2>Sign Up</h2>";
signup += "<a href=\"#\" onclick=\"removePopUp()\">&#10005;</a>"
signup += "<form name=\"signup\" action=\"php\\signup.php\" onsubmit=\"return validateSignUp(false);\" method=\"post\">";
signup += "<input type=\"text\" name=\"full-name\" placeholder=\"Name\">";
signup += "<br>";
signup += "<input type=\"text\" name=\"username\" placeholder=\"Username\">"; 
signup += "<br>";
signup += "<input type=\"password\" name=\"password\" placeholder=\"Password\">";	
signup += "<br>";
signup += "<br>";
signup += "<input type=\"submit\" value=\"Sign Up\">";
signup += "</form>";
signup += "</div>";

var login = "<div class=\"padded-container account-utils\">";
login += "<h2>Log In</h2>";
login += "<a href=\"#\" onclick=\"removePopUp()\">&#10005;</a>"
login += "<form name=\"login\" action=\"php\\login.php\" onsubmit=\"return validateLogin();\" method=\"post\">";
login += "<input type=\"text\" name=\"username\" placeholder=\"Username\">"; 
login += "<br>";
login += "<input type=\"password\" name=\"password\" placeholder=\"Password\">";	
login += "<br>";
login += "<br>";
login += "<input type=\"submit\" value=\"Log In\">";
login += "</form>";
login += "</div>";

var user_box_display = false;
var signup_display = false;
var login_display = false;

function addLiked(showName, year)
{

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) 
    {
     alert("Liked \"" + showName + "\"");
    }
  };
  xmlhttp.open("GET", "php\\user_pref.php?table=liked&title=" + showName + "&year=" + year, true);
  xmlhttp.send();
    
}

function addDisliked(showName, year)
{
  
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) 
    {
     alert("Disliked \"" + showName + "\"");
    }
  };
  xmlhttp.open("GET", "php\\user_pref.php?table=disliked&title=" + showName + "&year=" + year, true);
  xmlhttp.send();
}

function addFavourited(showName, year)
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) 
    {
     alert("Favourited \"" + showName + "\"");
    }
  };
  xmlhttp.open("GET", "php\\user_pref.php?table=favourited&title=" + showName + "&year=" + year, true);
  xmlhttp.send();
}

function addWishList(showName, year)
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) 
    {
     alert("Wishlisted \"" + showName + "\"");
    }
  };
  xmlhttp.open("GET", "php\\user_pref.php?table=wishlisted&title=" + showName + "&year=" + year, true);
  xmlhttp.send();
}

function loadSignUp()
{
	$('.account-utils').remove();
	$('body').prepend(signup);
	$('.content').css('filter', 'brightness(50%)');
}

function removePopUp()
{
	$('.account-utils').remove();
	$('.content').css('filter', 'brightness(100%)');
}

function loadUserOptions()
{
  if (user_box_display)
  {
    $('.user_clickable').children('ul').css('display', 'none');
    user_box_display = false;
  }
  else 
  {
    $('.user_clickable').children('ul').css('display', 'block');
    user_box_display = true;
  }
  
}

function loadLogIn()
{
	$('.account-utils').remove();
	$('body').prepend(login);
	$('.content').css('filter', 'brightness(50%)');
}

function validateSignUp(check)
{
    if (!check) return true;
    var full_name = document.forms["signup"]["full-name"].value;
    var username = document.forms["signup"]["username"].value;
    var password = document.forms["signup"]["password"].value;

    if (full_name.length == 0 || username.length == 0 || password.length == 0)
    {
    	alert("All Fields Required");
    	return false;
    }

    for (var i = 0; i < username.length; i++)
    {
    	var temp = username.charAt(i);
    	if (temp == ' ')
    	{
    		alert('Username Cannot Have Spaces');
    		return false;
    	}
    	else if (temp == '!' || temp == '@' || temp == '$' || temp == '%' || temp == '^' || temp == '&' || temp == '*' || temp == '(' || temp == ')' || temp == '-' || temp == '+' || temp == '=')
    	{
    		alert('No special characters are allowed in username');
    		return false;
    	}
    }
   
    if (password.length < 8)
   	{
    	alert("Password Must Be At Least 8 characters long");
    	return false;    	
    }
    else
    {
    	var small = false;
   		var capital = false;
   		var number = false;
   		var symbol = false;

   		
   		for (var i = 0; i < password.length; i++)
   		{
   			var temp = password.charAt(i);
   			if (temp >= 'a' && temp <= 'z')
   			{
   				small = true;
   			}
   			else if (temp >= 'A' && temp <= 'Z')
   			{
   				capital = true;
   			}
   			else if (temp >= '0' && temp <= '9')
   			{
   				number = true;
   			}
   			else
   			{
   				symbol = true;
   			}
   		}

   		var allowed = small && capital && number && symbol;

   		if (!allowed)
   		{
   			alert('Password Must Have Capital, Small Characters, Digits and Symbols')
   			return false;
   		}



   		
    }
       
}

function validateLogIn()
{
    var username = document.forms["login"]["username"].value;
    var password = document.forms["login"]["password"].value;

    if (username.length == 0 || password.length == 0)
    {
    	alert("All Fields Required");
    	return false;
    }
}
