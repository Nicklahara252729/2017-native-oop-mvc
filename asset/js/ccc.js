//$(document).ready(function(){
	//$('#toggle').click(function(){
		//$('.mn').toggle(2000);
	//});
//});
$(window).scroll(function(){
	var wScroll=$(this).scrollTop();
	$('h1').css({
		'transform':'translate(0px, '+ wScroll /1 +'%)'
	});
	$('#awan_empat').css({
		'transform':'translate(0px, -'+ wScroll /2 +'%)'
	});
	$('.kumpulan-button').css({
		'transform':'translate(0px, -'+ wScroll /1 +'%)'
	});
	$('#awan_dua').css({
		'transform':'translate(0px, '+ wScroll /1 +'%)'
	});
	$('#logo').css({
		'transform':'translate(0px, -'+ wScroll /6 +'%)'
	});
	$('#awan_tiga').css({
		'transform':'translate(0px, '+ wScroll /1 +'%)'
	});
	$('#gambar3').css({
		'transform':'translate(0px, -'+ wScroll /4 +'%)'
	});
	if(wScroll > $('.container').offset().top-($(window).height()
		/ 1.2)){
			$('#gambar').each(function(i){
				setTimeout(function(){
					$('#gambar').eq(i).addClass('is-showing');
				},150 * (i+1));
				});
			}
	$('#toggle').css({
		'transform':'translate(0px, '+ wScroll /2 +'%)'
	});
});