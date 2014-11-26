// JavaScript Document
onload=init;
function init(){
	//when user clicks off or tabs off section and leaves it blank...validate
	document.forms[0].ufootbag.onblur = function(){
		checkEmptyString(this, "feedname");
	}
	document.forms[0].uthumb.onblur = function(){
		checkEmptyString(this, "feedthumb");
	}
	document.forms[0].uprice.onblur = function(){
		checkEmptyString(this, "feedprice");
	}
	//when user submits the form
	document.forms[0].onsubmit = function(){
		return checkSubmit(this);
	}
}
//Function informing user to fill in certain fields
function checkEmptyString(fld, feedid){
	fld.style.background ='white';//set field to normal style
	document.getElementById(feedid).innerHTML ='';//set feedback to blank
	//if user didnt type character into field
	if(fld.value.length == 0){
		//set the field to a warning
		//make feedback text appear
		fld.style.background ='orange';
		document.getElementById(feedid).innerHTML ='Required';//lets user know its required
		fld.focus();//put focus right back on that field
		return false; //this sends 'false;  to where function was called and stops code
	}//ends if user did something wrong
	return true;
}

document.forms[0].onsubmit=function(){
	return checkSubmit(this);
}

function checkSubmit(myform){
	var ok_to_submit = true;
	//if an of these return false, prepare okay variable to return false below
	//which keeps form from submitting to process page
	if(!checkEmptyString(myform.ufootbag, "feedname")) ok_to_submit = false;
	if(!checkEmptyString(myform.uthumb, "feedthumb")) ok_to_submit = false;
	if(!checkEmptyString(myform.uprice, "feedprice")) ok_to_submit = false;

	
	return ok_to_submit;
}//end function checkSubmit