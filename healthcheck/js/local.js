// change picture
function picchange1()
	{
	
document.getElementById("why").src="images/why1.png";
document.getElementById("b1").classList.add("btn-primary");
document.getElementById("b2").classList.remove("btn-primary");
document.getElementById("b3").classList.remove("btn-primary");
document.getElementById("b4").classList.remove("btn-primary");
document.getElementById("b5").classList.remove("btn-primary");
}
function picchange2()
	{
	
document.getElementById("why").src="images/screen1.png";
document.getElementById("b2").classList.add("btn-primary");
document.getElementById("b1").classList.remove("btn-primary");
document.getElementById("b3").classList.remove("btn-primary");
document.getElementById("b4").classList.remove("btn-primary");
document.getElementById("b5").classList.remove("btn-primary");
}
function picchange3()
	{
	
document.getElementById("why").src="images/screen1.png";
document.getElementById("b3").classList.add("btn-primary");
document.getElementById("b1").classList.remove("btn-primary");
document.getElementById("b2").classList.remove("btn-primary");
document.getElementById("b4").classList.remove("btn-primary");
document.getElementById("b5").classList.remove("btn-primary");
}
function picchange4()
	{
	
document.getElementById("why").src="images/why1.png";
document.getElementById("b4").classList.add("btn-primary");
document.getElementById("b1").classList.remove("btn-primary");
document.getElementById("b2").classList.remove("btn-primary");
document.getElementById("b3").classList.remove("btn-primary");
document.getElementById("b5").classList.remove("btn-primary");

}
function picchange5()
	{
	
document.getElementById("why").src="images/screen1.png";
document.getElementById("b5").classList.add("btn-primary");
document.getElementById("b1").classList.remove("btn-primary");
document.getElementById("b2").classList.remove("btn-primary");
document.getElementById("b3").classList.remove("btn-primary");
document.getElementById("b4").classList.remove("btn-primary");
}
// picture change end

// video


 $('#play').on('click', function (e) {
  e.preventDefault();
  $("#player")[0].src += "?autoplay=1";
  $('#player').show();
  $('#video-cover').hide();
})
$('#modal1').on('hidden.bs.modal', function (e) {
  $('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
});


// video end