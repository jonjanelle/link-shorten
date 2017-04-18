
/*
* Main page copy to clipboard from result bar click
*/
function copyToClipboard() {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#shorturl').text().trim()).select();
    document.execCommand("copy");
    $temp.remove();
    $('#copy-msg').html("Copied to clipboard!");
}

/*
*User dashboard copy on table cell click
*/
$( document ).ready(function() {
  $('td').click(function(){
    var temp = $("<input>");
    $("body").append(temp);
    temp.val($(this).text().trim()).select();
    document.execCommand("copy");
    temp.remove();
    $('#copy-msg').html("Copied to clipboard!");
    $('#copy-msg').css("color","#CC3333");
    $('#copy-msg').fadeOut( 2000, function() {
       $( "#copy-msg" ).fadeIn( "slow" );
       $('#copy-msg').html("Click cell to copy contents to clipboard.");
       $('#copy-msg').css("color","#3333FF");
    });
  });

  /* Close collapsed navbar upon click away */
  $("body").click(function(event) {
      // only do this if navigation is visible, otherwise you see jump in navigation while collapse() is called
       if ($(".navbar-collapse").is(":visible") && $(".navbar-toggle").is(":visible") ) {
          $('.navbar-collapse').collapse('toggle');
      }
  });
});
