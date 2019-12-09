<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script src="http://code.jquery.com/jquery-latest.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
<link rel="shortcut icon" type="image/x-icon" href="growth.png" />
    
</head>
<body>
<h1>ajax</h1>

<div class="btn-group btn-group-toggle" data-toggle="buttons" id="option1">
  <label class="btn btn-secondary" id="option1_on">
    <input type="button" name="options_option1" value="on"> On
  </label>
  <label class="btn btn-secondary" id="option1_off">
    <input type="button" name="options_option1" value="off"> Off
  </label>
</div>

<div class="btn-group btn-group-toggle" data-toggle="buttons" id="option2">
  <label class="btn btn-secondary" id="option2_on">
    <input type="button" name="options_option2" value="on"> On
  </label>
  <label class="btn btn-secondary" id="option2_off">
    <input type="button" name="options_option2" value="off"> Off
  </label>
</div>
</body>
</html>
<script>
 $(".btn-group-toggle input:button").on('change', function() {
  let val = $(this).val();
  if (val == 'on') {
    var sibling = $(this)
      .parents('.btn-group-toggle')
      .siblings()
      .find('input[value="off"]')
      .prop('checked', true)
  }
})
</script>