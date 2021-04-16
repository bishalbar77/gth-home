// // change picture
    
function picchange1()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/why1.png";
document.getElementById("b1").classList.add("btnn-primary");
document.getElementById("b2").classList.remove("btnn-primary");
document.getElementById("b3").classList.remove("btnn-primary");
document.getElementById("b4").classList.remove("btnn-primary");
document.getElementById("b5").classList.remove("btnn-primary");
}
function picchange2()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/screen.png";
document.getElementById("b2").classList.add("btnn-primary");
document.getElementById("b1").classList.remove("btnn-primary");
document.getElementById("b3").classList.remove("btnn-primary");
document.getElementById("b4").classList.remove("btnn-primary");
document.getElementById("b5").classList.remove("btnn-primary");
}
function picchange3()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/screen1.png";
document.getElementById("b3").classList.add("btnn-primary");
document.getElementById("b1").classList.remove("btnn-primary");
document.getElementById("b2").classList.remove("btnn-primary");
document.getElementById("b4").classList.remove("btnn-primary");
document.getElementById("b5").classList.remove("btnn-primary");
}
function picchange4()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/why1.png";
document.getElementById("b4").classList.add("btnn-primary");
document.getElementById("b1").classList.remove("btnn-primary");
document.getElementById("b2").classList.remove("btnn-primary");
document.getElementById("b3").classList.remove("btnn-primary");
document.getElementById("b5").classList.remove("btnn-primary");

}
function picchange5()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/screen1.png";
document.getElementById("b5").classList.add("btnn-primary");
document.getElementById("b1").classList.remove("btnn-primary");
document.getElementById("b2").classList.remove("btnn-primary");
document.getElementById("b3").classList.remove("btnn-primary");
document.getElementById("b4").classList.remove("btnn-primary");
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
// 
// 
// counter end
(function ($){
  $.fn.counter = function() {
    const $this = $(this),
		  	   da = new Date(),
	   m = da.getMonth(),
	  d = da.getDate(),
	  h = da.getHours(),
	  mi = da.getMinutes(),
	
	
	  
	  
    numberFrom = 425000*m + 15000*d + 625*h + 20*mi,
    numberTo = parseInt($this.attr('data-to')),
    delta = numberTo - numberFrom,
// delta = 995895309
		
    deltaPositive = delta > 0 ? 1 : 0,
    time = parseInt($this.attr('data-time')),
    changeTime = 1;
    
    let currentNumber = numberFrom,
//     value = delta*changeTime/time;
value=0.002
    var interval1;
    const changeNumber = () => {

      currentNumber += value;
      //checks if currentNumber reached numberTo
      (deltaPositive && currentNumber >= numberTo) || (!deltaPositive &&currentNumber<= numberTo) ? currentNumber=numberTo : currentNumber;
      this.text(parseInt(currentNumber));
      currentNumber == numberTo ? clearInterval(interval1) : currentNumber;  
    }

    interval1 = setInterval(changeNumber,changeTime);
  }
}(jQuery));

$(document).ready(function(){

  $('.count-up').counter();
  $('.count1').counter();
  $('.count2').counter();
  $('.count3').counter();
  $('.count4').counter();
  
  new WOW().init();
  
  setTimeout(function () {
    $('.count5').counter();
  }, 3000);
});

// counter end
// 
// 




