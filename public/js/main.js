
function clicked(e)
{
    if(!confirm('Confirmation de suppression'))e.preventDefault();
}

$(function () {
    $('[data-toggle="popover"]').popover()
  })

$(function () {
$('.example-popover').popover({
    container: 'body'
})
})



function verif(chars) {
    // Caractères autorisés
    var regex = new RegExp("[a-z0-9@.]", "i");
    let valid;
    for (x = 0; x < chars.value.length; x++) {
        valid = regex.test(chars.value.charAt(x));
        if (valid == false) {
            chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1); x--;
        }
    }
}
