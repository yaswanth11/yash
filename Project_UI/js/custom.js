$(document).ready(function(){
	// sidebar 
	
	$("#show").click(function() {
		$("#menu-side").css("marginLeft", "0px");
	});
	$(".close").click(function(){
		$("#menu-side").css("marginLeft", "-273px");
		$("#show").css("left", "0%");
	});
	// file upload function
	
	$('#file-upload').change( function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]); 
		$("#disp_tmp_path").html("File-Name : "+tmppath);
	});
	
	// Clear Function
	
	$( "#clear" ).on( "click", function() {
		$("#disp_tmp_path").html("");
	});
	
	// Tab navigation
	
	$('#upload').click(function(){
		$("#tab2").prop("checked", true);
		
    });
	$('#finish').click(function(){
		$("#tab3").prop("checked", true);  
	});
	
	//view sidebar navigation
	
	$('#list').hide();
	$('#document').hide();
	$('#ab').click(function (e) {
		e.preventDefault();
		$('#document').slideUp();
		$('#list').slideDown();
	});
	$('#con').click(function (e) {
		e.preventDefault();
		$('#list').slideUp();
		$('#document').slideDown();
	});
	$('#showmenu').click(function() {
        $('.menu').toggle("slide");
    });
	
});	

	// Data Computation
	
function move() {
    var elem = document.getElementById("myBar"); 
	var width = 1;
    var id = setInterval(frame, 10);
	function funct2()
	{
		document.getElementById("myProgress").className="hide";
	}
	function func1()
	{
		document.getElementById("my_div").className="show";
		funct2();
	}
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++; 
            elem.style.width = width + '%'; 
        }
    }
	setTimeout(func1, 2000);	
}
 

