<!-- 
function preload() {
   if (document.images) {
     nextImage1 = new Image;
	 nextImage1.src = "../images/opt_resources_off.gif";
	 nextImage2 = new Image;
	 nextImage2.src = "../images/opt_notes_off.gif";
	 nextImage3 = new Image;
	 nextImage3.src = "../images/opt_practice_off.gif";
	 nextImage4 = new Image;
	 nextImage4.src = "../images/opt_sites_off.gif";
	 nextImage5 = new Image;
	 nextImage5.src = "../images/opt_about_off.gif";
   }
}

function openwin(fileName, w, h) {
  myWin= open(fileName, "code", "width="+w+",height="+h+",status=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,resizable=no");
}

function openwingen(fileName, w, h, stat, scroll, tbar, mbar, loc, resize) {
  myWin= open(fileName, "code", "width="+w+",height="+h+",status="+stat+",scrollbars="+scroll+",toolbar="+tbar+",menubar="+mbar+",location="+loc+",resizable="+resize);
}

function turnon(imagename) {
  if (document.images) {
    document.images[imagename].src = "../images/opt_" + imagename + "_on.gif";
  }
}

function turnoff(imagename) {
  if (document.images) {
    document.images[imagename].src = "../images/opt_" + imagename + "_off.gif";
  }
}

function openpage(prefix, dropDown) {
   URL = prefix +  dropDown.options[dropDown.selectedIndex].value;
   parent.location.href=URL;
}

function formVal() {
	var f1 = document.forms[0];
	if (f1.realname.value == "" || f1.realname.value == " ") {
		alert("Please enter your name");
		f1.realname.focus();
		return (false);
	} else if (f1.email.value == "" || f1.email.value == " ") {
		alert("Please enter your email address");
		f1.email.focus();
		return (false);
	} else return (true);
}

//-->