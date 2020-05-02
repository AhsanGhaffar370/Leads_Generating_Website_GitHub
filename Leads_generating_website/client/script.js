function myFunction() {
    var fname= document.getElementById('fname').value;
    var lname= document.getElementById('lname').value;
    var email= document.getElementById('email').value;
    var mob= document.getElementById('mob').value;
    var law_cat= document.getElementById('law_cat').value;
    var msg= document.getElementById('msg').value;
    var submitbtn= document.getElementById('submit12').value;
    var btn=document.getElementById('submit12');
    // var create_pdf ="";
    // if (wireTransfer!=""){
    //   create_pdf=wireTransfer;
    // }
    // else{
    //   create_pdf=paypal;
    // }
    // var letters = $('input[name="no[]"]:checked').map(function(){
    //     return this.value;
    // }).get();
    // alert("sss");
    var dataString = 'fname=' + fname + '&lname=' + lname + '&email=' + email+'&mob=' + mob+'&law_cat=' + law_cat+'&msg=' + msg+'&submitbtn=' + submitbtn;
    // AJAX code to submit form.
    $.ajax({
    type: "POST",
    url: "client.php",
    data: dataString,
    cache: false,
    success: function(data) {
    fname="";
    lname="";
    email="";
    mob="";
    law_cat="";
    msg="";
    btn.disabled = true;
    $("#mydatashow").html(data);

  }
    });
    return false;
}