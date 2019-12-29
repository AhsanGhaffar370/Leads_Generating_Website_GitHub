// JavaScript Document// JavaScript Document

/////////////////////////////////////ser_city Information
$(document).ready(function() {

    $("#country").focusout(function() {
		// check_state();
	});
	
	$('.ser_state').submit(function(e) {
		// check_state();
		
		if(check_ser_state()===true ){
			return;
		}
		else{
			e.preventDefault();
		}
    });

});


/////////////////////////////////////client form Information
$(document).ready(function() {

    $("#fname").focusout(function() {
		// check_fname();
	});
	$("#lname").focusout(function() {
		// check_lname();
	});
	
	$("#email").focusout(function() {
		// check_mail();
	});
	
	$("#mob").focusout(function() {
		// check_mob();
	});
	
	$("#law_cat").focusout(function() {
		// check_law_cat();
	});
	
	$("#msg").focusout(function() {
		// check_law_cat();
	});
	
	$('.client-form1').submit(function(e) {
		check_fname();
		check_lname();
		check_mail();
		check_mob();
		check_law_cat();
		check_msg();
		
		if(check_fname()===true && check_lname()===true && check_mail()===true && check_mob()===true && check_law_cat()===true && check_msg()===true ){
			return;
		}
		else{
		e.preventDefault();}
    });

});

/////////////////////////////////////Lawyer Sign In Information
$(document).ready(function() {

    $("#email").focusout(function() {
		// check_mail();
	});

	$("#pass").focusout(function() {
		// check_pass1();
	});

	$('.lawyer-signIn-form1').submit(function(e) {
		check_mail();
		check_pass();
		
		
		if(check_mail() === true && check_pass()=== true ){
			return;
		}
		else{
		e.preventDefault();}
    });

});


/////////////////////////////////////Lawyer Sign Up Information
$(document).ready(function() {


    $("#fname").focusout(function() {
		// check_fname();
	});
	
	$("#organ").focusout(function() {
		// check_organ();
	});
	
	$("#email").focusout(function() {
		// check_mail();
	});
	
	$("#mob").focusout(function() {
		// check_mobile();
	});
	
	$("#state").focusout(function() {
		// check_state();
	});
	
	$("#zip").focusout(function() {
		// check_zip();
	});
	
	$("#pass").focusout(function() {
		// check_pass();
	});
    
	$('.lawyer-form1').submit(function(e) {
		check_fname();
		check_organ();
		check_mail();
		check_mob();
		check_state();
		check_zip();
		check_pass();
		
		if(check_fname()===true && check_organ()===true && check_mail()===true && check_mob()===true && check_state()===true && check_zip()===true && check_pass()===true){
			return;
		}
		else{
		e.preventDefault();}
    });

});

/*
/////////////////////////////////////Payment Information
$(document).ready(function() {

	

	$('.payment-form1').submit(function(e) {
		// check_card_num();
		// check_cvc();
		// check_month();
		// check_year();
		
		if(check_card_num()===true && check_cvc()===true && check_month()===true && check_year()===true ){
			return;
		}
		else{
		e.preventDefault();}
    });

});
*/


/////////////////////////////////////Contact Us Info
$(document).ready(function() {

    $("#fname").focusout(function() {
		// check_fname();
	});
	$("#lname").focusout(function() {
		// check_lname();
	});
	
	$("#email").focusout(function() {
		// check_mail();
	});
	
	$("#mob").focusout(function() {
		// check_mob();
	});
	
	
	$("#msg").focusout(function() {
		// check_law_cat();
	});
	
	$('.contact-form1').submit(function(e) {
		check_fname();
		check_lname();
		check_mail();
		check_mob();
		check_msg();
		
		if(check_fname()===true && check_lname()===true && check_mail()===true && check_mob()===true && check_msg()===true ){
			return;
		}
		else{
		e.preventDefault();}
    });

});


function check_fname(){
	$(".error").remove();
	var fregex= new RegExp(/^[a-zA-Z\s]{3,30}$/);
	var fname = $("#fname").val();
	
	if (fname.length < 1) {
		$("#fname").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#fname').after('<span style="font-size:13px; color:#900;" class="error">This Field is required</span>');
		$("#fname").focus();
		return false;
	}
	else if (!fregex.test(fname)) {
		$("#fname").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#fname').after('<span style="font-size:13px; color:#900;" class="error">Please provide valid Name</span>');
		$("#fname").focus();
		return false;
	}
	else{
		$("#fname").css({"border":	"2px solid green" , "padding" : "10px"});
		return true;
	}
}//end of function


function check_lname(){
	$(".error").remove();
	var fregex= new RegExp(/^[a-zA-Z\s]{3,30}$/);
	var fname = $("#lname").val();
	
	if (fname.length < 1) {
		$("#lname").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#lname').after('<span style="font-size:13px; color:#900;" class="error">This Field is required</span>');
		$("#lname").focus();
		return false;
	}
	else if (!fregex.test(fname)) {
		$("#lname").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#lname').after('<span style="font-size:13px; color:#900;" class="error">Please provide valid Name</span>');
		$("#lname").focus();
		return false;
	}
	else{
		$("#lname").css({"border":	"2px solid green" , "padding" : "10px"});
		return true;
	}
}//end of function

function check_organ(){
	$(".error").remove();
	var fregex= new RegExp(/^[a-zA-Z\s]{3,50}$/);
	var organ = $("#organ").val();
	
	if (organ.length < 1) {
		$("#organ").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#organ').after('<span style="font-size:13px; color:#900;" class="error">This Field is required</span>');
		$("#organ").focus();
		return false;
	}
	else if (!fregex.test(organ)) {
		$("#organ").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#organ').after('<span style="font-size:13px; color:#900;" class="error">Please provide valid organization name</span>');
		$("#organ").focus();
		return false;
	}
	else{
		$("#organ").css({"border":	"2px solid green" , "padding" : "10px"});
		return true;
	}
}//end of function

function check_pass(){
	$(".error").remove();
	var fregex= new RegExp(/^.{6,30}$/);
	var pass = $("#pass").val();
	
	if (pass.length < 1) {
		$("#pass").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#pass').after('<span style="font-size:13px; color:#900;" class="error">This Field is required</span>');
		$("#pass").focus();
		return false;
	}
	else if (!fregex.test(pass)) {
		$("#pass").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#pass').after('<span style="font-size:13px; color:#900;" class="error">Please provide strong password</span>');
		$("#pass").focus();
		return false;
	}
	else{
		$("#pass").css({"border":	"2px solid green" , "padding" : "10px"});
		return true;
	}
}//end of function

function check_msg(){
	$(".error").remove();	
	var matter = $("#msg").val();
	
	if (matter.length < 1) {
		$("#msg").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#msg').after('<span style="font-size:13px; color:#900;" class="error">This Field is required</span>');
		$("#msg").focus();
		return false;
	}
	else if (matter.length < 5) {
		$("#msg").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#msg').after('<span style="font-size:13px; color:#900;" class="error">Please enter valid message</span>');
		$("#msg").focus();
		return false;
	}
	else{
		$("#msg").css({"border":	"2px solid green" , "padding" : "10px"});
		return true;
	}
}//end of function
	
/*	
function check_card_num(){
	$(".error").remove();
	var fregex= new RegExp(/^[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}$/);
	var card_num = $("#card_num").val();
	
	if (card_num.length < 1) {
		$("#card_num").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#card_num').after('<span style="font-size:13px; color:#900;" class="error">This Field is required</span>');
		$("#card_num").focus();
		return false;
	}
	else if (!fregex.test(card_num)) {
		$("#card_num").css({"border":	"1px solid red" , "padding" : "10px"});
		$('#card_num').after('<span style="font-size:13px; color:#900;" class="error">Please provide valid card number</span>');
		$("#card_num").focus();
		return false;
	}
	else{
		$("#card_num").css({"border":	"2px solid green" , "padding" : "10px"});
		return true;
	}
}//end of function
*/	
	
function check_mail(){
	$(".error").remove();
// 	var eregex= new RegExp(/^\w+@\w+(\.\w+)+$/);
    var eregex= new RegExp(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]{3,40}@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,18}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,18}[a-zA-Z0-9])?){1,10}$/);
	var email=$("#email").val();
	
	if (email.length < 1) {
		$("#email").css({"border":	"1px solid red" , "padding" : "10px"});
      	$('#email').after('<span style="font-size:13px; color:#900;" class="error">Email is required</span>');
		$("#email").focus();
		return false;
    } 
	else if(!eregex.test(email)){
		$("#email").css({"border":	"1px solid red" , "padding" : "10px"});
		$("#email").after('<span style="font-size:13px; color:#900;" class="error">Please provide valid Email i.e:xxx@gmail.com</span>');
		$("#email").focus();
		return false;

	} else{	
		$("#email").css({"border":	"2px solid green" , "padding" : "10px"});
		return true;
	}
}//end of function

function check_mob(){
	$(".error").remove();
	var mob = $("#mob").val();
	var pregex= new RegExp(/^(\([0-9]{3}\) |[0-9]{3}-*)[0-9]{3}-*[0-9]{4}$/);

	if (mob.length < 1) {
		$("#mob").css({"border":	"1px solid red"});
		$("#mob").after('<span style="font-size:13px; color:#900;" class="error">This field is required</span>');
		$("#mob").focus();
		return false;
	}
	else if(!pregex.test(mob)){
		$("#mob").css({"border":	"1px solid red"});
		$("#mob").after('<span style="font-size:13px; color:#900;" class="error">Enter valid number</span>');
		$("#mob").focus();
		return false;
	}
	else {
		$("#mob").css({"border":"2px solid green" , "padding" : "5px"});
		return true;
	}
}//end of function

function check_zip(){
	$(".error").remove();
	var zip = $("#zip").val();
	var pregex= new RegExp(/^[0-9]{5}$/);

	if (zip.length < 1) {
		$("#zip").css({"border":	"1px solid red"});
		$("#zip").after('<span style="font-size:13px; color:#900;" class="error">This field is required</span>');
		$("#zip").focus();
		return false;
	}
	else if(!pregex.test(zip)){
		$("#zip").css({"border":	"1px solid red"});
		$("#zip").after('<span style="font-size:13px; color:#900;" class="error">Enter valid zip code</span>');
		$("#zip").focus();
		return false;
	}
	else {
		$("#zip").css({"border":"2px solid green" , "padding" : "5px"});
		return true;
	}
}//end of function

/*
function check_cvc(){
	$(".error").remove();
	var cvc = $("#cvc").val();
	var pregex= new RegExp(/^[0-9]{4}$/);

	if (cvc.length < 1) {
		$("#cvc").css({"border":	"1px solid red"});
		$("#cvc").after('<span style="font-size:13px; color:#900;" class="error">This field is required</span>');
		$("#cvc").focus();
		return false;
	}
	else if(!pregex.test(cvc)){
		$("#cvc").css({"border":	"1px solid red"});
		$("#cvc").after('<span style="font-size:13px; color:#900;" class="error">Enter valid CVC code</span>');
		$("#cvc").focus();
		return false;
	}
	else {
		$("#cvc").css({"border":"2px solid green" , "padding" : "5px"});
		return true;
	}
}//end of function

function check_month(){
	$(".error").remove();
	var month = $("#month").val();
	var pregex= new RegExp(/^[0-9]{2}$/);

	if (month.length < 1) {
		$("#month").css({"border":	"1px solid red"});
		$("#month").after('<span style="font-size:13px; color:#900;" class="error">This field is required</span>');
		$("#month").focus();
		return false;
	}
	else if (parseInt(month)< 1 || parseInt(month)> 12) {
		$("#month").css({"border":	"1px solid red"});
		$("#month").after('<span style="font-size:13px; color:#900;" class="error">Please enter valid month.</span>');
		$("#month").focus();
		return false;
	}
	else if(!pregex.test(month)){
		$("#month").css({"border":	"1px solid red"});
		$("#month").after('<span style="font-size:13px; color:#900;" class="error">Enter valid month</span>');
		$("#month").focus();
		return false;
	}
	else {
		$("#month").css({"border":"2px solid green" , "padding" : "5px"});
		return true;
	}
}//end of function

function check_year(){
	$(".error").remove();
	var year1 = $("#year").val();
	var year = parseInt(year1);
	
	var pregex= new RegExp(/^[0-9]{4}$/);

	if (year1.length < 1) {
		$("#year").css({"border":	"1px solid red"});
		$("#year").after('<span style="font-size:13px; color:#900;" class="error">This field is required</span>');
		$("#year").focus();
		return false;
	}
	else if (year< 1850 || year> 2019) {
		$("#month").css({"border":	"1px solid red"});
		$("#month").after('<span style="font-size:13px; color:#900;" class="error">Please enter valid year.</span>');
		$("#month").focus();
		return false;
	}
	else if(!pregex.test(year1)){
		$("#year").css({"border":	"1px solid red"});
		$("#year").after('<span style="font-size:13px; color:#900;" class="error">Enter valid year </span>');
		$("#year").focus();
		return false;
	}
	else {
		$("#year").css({"border":"2px solid green" , "padding" : "5px"});
		return true;
	}
}//end of function
*/
function check_state(){
	$(".error").remove();
	var state = $("#state").val();

	if (state == null) {
		$("#state").css({"border":	"1px solid red"});
		$("#state").after('<span style="font-size:13px; color:#900;" class="error">This field is required</span>');
		$("#state").focus();
		return false;
	}
	else {
		$("#state").css({"border":"2px solid green" , "padding" : "5px"});
		return true;
	}
}//end of function

function check_ser_state(){
	$(".error").remove();
	var req = $("#country").val();

	if (req.length < 4) {
		$("#country").css({"border":"1px solid red"});
		// $("#country").after('<span style="font-size:13px; color:#900;" class="error">This field is required</span>');
		$("#country").focus();
		return false;
	}
	else {
		$("#country").css({"border":"2px solid green" , "padding" : "5px"});
		return true;
	}
}//end of function


function check_law_cat(){
	$(".error").remove();
	var law_cat = $("#law_cat").val();

	if (law_cat == null) {
		$("#law_cat").css({"border":	"1px solid red"});
		$("#law_cat").after('<span style="font-size:13px; color:#900;" class="error">This field is required</span>');
		$("#law_cat").focus();
		return false;
	}
	else {
		$("#law_cat").css({"border":"2px solid green" , "padding" : "5px"});
		return true;
	}
}//end of function
