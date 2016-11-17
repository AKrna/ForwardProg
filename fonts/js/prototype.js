function openPage(event, tabName) {
    var i, tabcontent, tablinks;
	
    tabcontent = document.getElementsByClassName("content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
	
    tablinks = document.getElementsByClassName("tabLink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
	
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

$(document).ready(function (){
		$(".button").hover(function() {
			$(this).css("background-color", "yellow");
			$(this).css("color", "black");
		}, function() {
			$(this).css("background-color", "#3f51b5");
			$(this).css("color", "white");
		});
	
		$(".chosen-select").chosen({width: "350px"});
		$(".chosen-select2").chosen({width: "150px"});
});