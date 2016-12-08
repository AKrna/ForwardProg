$(document).ready(function (){
		$(".chosen-select").chosen({width: "350px"});
		$(".chosen-select2").chosen({width: "150px"});
});


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

function openInnerPage(event, tabName) {
    var i, tabcontent, tablinks;
	
    tabcontent = document.getElementsByClassName("innercontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
	
    tablinks = document.getElementsByClassName("innertabLink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
	
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.className += " active";
}

function openNav(){
	document.getElementById("mainNav").style.width = "250px";
	document.getElementById("mainPage").style.marginLeft = "250px";
}

function closeNav(){
	document.getElementById("mainNav").style.width = "0";
	document.getElementById("mainPage").style.marginLeft = "0";
}

document.getElementById("defaultOpen").click();
document.getElementById("innerdefaultOpen").click();

