window.onload = function(){
	loadData();
}
function saveEditor(page_id)
{
	if (window.XMLHttpRequest)
 	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}

	//xmlhttp.onreadystatechange=function()
  	//{
  	//	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //	{
    //		CKEDITOR.instances.inner_editor.setData(xmlhttp.responseText);
    //	}
  	//}
	xmlhttp.open("POST","wp-content/themes/brightnews/post-text-wpdb.php?text="+encodeURIComponent(CKEDITOR.instances.inner_editor.getData())+"&page_id=" + page_id.toString() + "&user_id=2147483647",true);
	xmlhttp.send();
	console.log(xmlhttp);
	console.log(page_id.toString());
};

function loadData()
{
	if (window.XMLHttpRequest)
 	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}

	xmlhttp.onreadystatechange=function()
  	{
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
    		CKEDITOR.instances.innerEditor.setData(xmlhttp.responseText);
    	}
  	}
	xmlhttp.open("GET","wp-content/themes/brightnews/get-text-wpdb.php?page_id=1350&user_id=2147483647",true);
	xmlhttp.send();
	
};

