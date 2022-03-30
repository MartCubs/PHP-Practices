function column123scroll(div) {
    var d1 = document.getElementById("summary01");
    d1.scrollTop = div.scrollTop;
}
function columnscroll(div) {
    var d1 = document.getElementById("summary02");
	var d2 = document.getElementById("summary03");
    d1.scrollTop = div.scrollTop;
	d2.scrollLeft = div.scrollLeft;
}

function clearsearch(){
	var c = document.getElementById('searchbox');
	c.value='';
}


//Called from keyup on the search textbox.
function movesuggest(event){
	var findpos = document.getElementById('searchbox');
	var liid = document.getElementByID(findpos);
//	alert(liid.value);
//	var CharacterCode = (event.which) ? event.which : event.keyCode;
}

// -------- AJAX REQUEST init
function getXmlHttpRequestObject() {
 if (window.XMLHttpRequest) {
  return new XMLHttpRequest();
 } else if(window.ActiveXObject) {
  return new ActiveXObject("Microsoft.XMLHTTP");
 } else {
  alert("Your Browser Sucks!");
 }
}
// -------- AJAX on payslip
var payslip = getXmlHttpRequestObject();
function loadslipvalue(empno,datefr,dateto){
  if(empno){
    var str = escape(empno);
    payslip.open("GET", 'backend/acfunc.php?acfuncrun=poppayslip&acfuncparam01='+empno+'&acfuncparam02='+datefr+'&acfuncparam03='+dateto, true);
    payslip.onreadystatechange = payslipchange;
    payslip.send(null);
  }
}
function payslipchange(){
	if (payslip.readyState == 4) {
		var str=payslip.responseText;
		var regdays = document.getElementById('regdays');
		regdays.value=str;
	}
}
// ------- AJAX on search suggest.
var searchReq = getXmlHttpRequestObject();
function searchSuggest(table,fieldname,subtype) {
// if (searchReq.readyState == 4 || searchReq.readyState == 0) {
  var str = escape(document.getElementById('searchbox').value);
//	document.location.href="backend/searchquery.php?search="+str+"&tablename="+table+"&fieldname="+fieldname,true;
  searchReq.open("GET", 'backend/searchquery.php?search=' + str+'&tablename='+table+'&fieldname='+fieldname+'&subtype='+subtype, true);
  searchReq.onreadystatechange = handleSearchSuggest;
  searchReq.send(null);
// }
}
function handleSearchSuggest() {
 if (searchReq.readyState == 4) {
   var ss = document.getElementById('layer1');
   var str1 = document.getElementById('searchbox');
   var reference = document.getElementById('reference').innerHTML;
   var curLeft=-65;
   if (str1.offsetParent){
      while (str1.offsetParent){
  		 curLeft += str1.offsetLeft;
  		 str1 = str1.offsetParent;
      }
   }
   var str2 = document.getElementById('searchbox');
   var curTop=90; // position of suggestion box
   if (str2.offsetParent){
      while (str2.offsetParent){
   		curTop += str2.offsetTop;
   		str2 = str2.offsetParent;
      }
  }
  var str=searchReq.responseText.split("\n");
  if(str.length==1)
      document.getElementById('layer1').style.visibility = "hidden";
  else
	  //as css
      ss.setAttribute('style','position:absolute;top:'+curTop+';left:'+curLeft+
					  ';width:400;z-index:1;padding:5px; overflow-y:auto; overflow-x:hidden; height:190;');
	  ss.innerHTML = '';
	  for(i=0; i < str.length - 1; i++) {
		// as echoed in a loop
		var slctd=str[i].split("^");
		if(slctd.length==1){
			var suggest='<a href="backend/acfunc.php?acfuncrun=transert&acfuncparam01='+str[i]+'&acfuncparam02='+reference+'" class="summary"><li id="unselected" align="left">'
//			var suggest='<a href="backend/acp_transert.php?empname='+str[i]+'" class="summary"><li id="unselected" align="left">'
					+slctd[0]+'</li></a>';
			ss.innerHTML += suggest;
		} else {
			var suggest='<a class="summary"><li id="selected" align="left">'+slctd[0]+' <span class="marked">SELECTED</span></li></a>';
			ss.innerHTML += suggest;
		}
  	  }
 }
}