function copyToClipboard() {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#shorturl').text().trim()).select();
    document.execCommand("copy");
    $temp.remove();

    $('#copy-msg').html("Copied to clipboard!");
}
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
});
