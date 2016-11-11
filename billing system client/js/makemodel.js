$(document).ready(function()
{
$(".make").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "selectmodel.php",
data: dataString,
cache: false,
success: function(html)
{
$(".model").html(html);
} 
});

});
});
