function copyToClipboard() {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#shorturl').text().trim()).select();
    document.execCommand("copy");
    $temp.remove();

    $('#copy-msg').html("Copied to clipboard!");
}

$(document).ready(function() {
  $(window).load(function() { $("html, body").animate({
    scrollTop: $(document).height() }, 0);
  });
)};
