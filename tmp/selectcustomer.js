// JavaScript Document
<script type="text/javascript">
	xmlHttp=GetXmlHttpObject();
	function GetXmlHttpObject(){
		var objXmlHttm=null;
		if(window.XMLHttpRequest){
			objXmlHttm=new XMLHttpRequest()
		}
		else if(window.ActiveXObject){
			objXmlHttm=new ActiveXObject("Microsoft.XMLHTTP")
		}
		return objXmlHttm
	}
	xmlHttp.onreadystatechange=stateChanged;
	function stateChanged(){
		if(xmlHttp.readyState==4||xmlHttp.readyState=="complete"){
			document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
		}
	}
	function showcustomer(str){
		xmlHttp=GetXmlHttpObject();
		if(xmlHttp==null){
			alert("browser does not support");
			return;
		}
		xmlHttp.onreadystatechange=stateChanged;
		var url="getcustomer.php";
		url=url+"?q="+str;
		url=url+"&sid="+Math.random();
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
</script>