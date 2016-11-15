<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>addClass demo</title>
  <style>
  div {
    background: white;
  }
  .red {
    background: red;
  }
  .red.green {
    background: green;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
 <div class="red">This div should be white</div>
<p>This div will be green because it now has the "green" and "red" classes.
   It would be red if the addClass function failed.</p>
 <div class="green">This div should be white</div>
 <p>There are zero green divs </p>
 
<script>
$( "div" ).addClass(function( index, currentClass ) {
  var addedClass;
 
  if ( currentClass === "red" ) {
    addedClass = "green";
    $( "green" ).text( "There is one green div" );
  }
 
  return addedClass;
});
</script>
 
</body>
</html>