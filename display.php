<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"></html>

<LINK rel="stylesheet" href="style.css" type="text/css" media="all">

<head>
<title>Display</title>

<!--meta http-equiv="refresh" content="120"-->

</head>

<script>


var ajax = new ajaxFunction();
var loading = false;

function ajaxFunction(){
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    return xmlHttp;
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      return xmlHttp;
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        return xmlHttp;
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
  }

function init(){
getBoxAll();
}

function getBox(){
  if(!loading)
  {
  loading = true;
	var catchError = setTimeout(function(){ajax.abort(); loading = false;}, 3000);
    ajax.onreadystatechange=function()
      {
      if(ajax.readyState==4)
        {
		  //if(ajax.status == 200)
		  //{				
	      clearTimeout(catchError);
		  var nuevoArray = eval(ajax.responseText);
		  if(nuevoArray[0] == '1')
		    {
		    document.getElementById('sound').innerHTML = '<embed src=tono.ogg autostart=true hidden=true loop=1>';
		    updateDisplay(nuevoArray);
			
            }
		  loading = false;
		 // }
		}
		
      }
    ajax.open("POST","getbox.php",true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send();
  }
} 
 
 
function getBoxAll(){    
    //var ajax;
    //ajax=new ajaxFunction();
	var catchError = setTimeout(function(){ajax.abort(); getBoxAll();}, 3000);	
    ajax.onreadystatechange=function()
      {
      if(ajax.readyState==4)
        {
		  if(ajax.status == 200)
		  {
	      clearTimeout(catchError);
		  setInterval(function(){getBox();}, 250);
		  var nuevoArray = eval(ajax.responseText);		
		  updateDisplay(nuevoArray);	  
		  }
		}
      }
    ajax.open("POST","getbox.php",true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send();
} 
 
 
function updateDisplay(nuevoArray){
    var largo = nuevoArray.length;
	for(i = 1 ; i < largo ; i++)
	{
	  if (nuevoArray[i][2] == '2'){ /*es manzanera*/
	    document.getElementById('box'+i).innerHTML = "<p>"+nuevoArray[i][0]+"</p>";
	    document.getElementById('num'+i).innerHTML = "<p style=\"font-size: "+sizeOfIndex(i)+"px;\">M-"+lastTwo(nuevoArray[i][1])+"</p>";
		document.getElementById('display_frame'+i).style.background = '#FFF';			
		document.getElementById('display_frame'+i).style.color = '#000';
		document.getElementById('box'+i).style.background = '#0a0';
		document.getElementById('num'+i).style.background = '#0a0';		
		}
	  else{
	    document.getElementById('box'+i).innerHTML = "<p>"+nuevoArray[i][0]+"</p>";
	    document.getElementById('num'+i).innerHTML = "<p>"+nuevoArray[i][1]+"</p>";
		document.getElementById('display_frame'+i).style.background = '#000';			
		document.getElementById('display_frame'+i).style.color = '#FFF';
		document.getElementById('box'+i).style.background = '#000';
		document.getElementById('num'+i).style.background = '#000';						
		}
	}
}

/*retorna el valor de la letra al agregar el texto correspondiente a el indicador de manzanera*/
function sizeOfIndex(index){
  switch(index){
    case 1:
      return "200";
      break;
    case 2:
      return "100";
      break;
    case 3:
      return "100";
      break;
    case 4:
      return "50";
      break;
    case 5:
      return "50";
      break;
    case 6:
      return "50";
      break;
  }
}

function lastTwo(newString){
var len = newString.length;
return newString.substring((len-2), len);
}






</script>

<body onload="init()">

<div id="sound" style="width:0px; height: 0px; overflow:hidden;"><p>nada</p></div>


<div id="display_frame">

  <div id="display_frame1">
  
    <div id="num1">
      <p>--</p>
	</div > <!-- cierra num1 -->
	<div id="box1">
      <p>BOX -</p>
	</div > <!-- cierra box1 -->
	
  </div > <!-- cierra display_frame1 -->

  <div id="display_frame23">
  
    <div id="display_frame2">
  
    <div id="num2">
      <p>--</p>
	</div > <!-- cierra num2 -->
	<div id="box2">
      <p>BOX -</p>
	</div > <!-- cierra box2-->
	
    </div > <!-- cierra display_frame2 -->

    <div id="display_frame3">
  
    <div id="num3">
      <p>--</p>
	</div > <!-- cierra num3 -->
	<div id="box3">
      <p>BOX -</p>
	</div > <!-- cierra box3 -->
	
    </div > <!-- cierra display_frame3 -->
	
  </div > <!-- cierra display_frame23 -->
  
  <div id="display_frame456">

    <div id="display_frame4">
  
    <div id="num4">
      <p>--</p>
	</div > <!-- cierra num4 -->
	<div id="box4">
      <p>BOX -</p>
	</div > <!-- cierra box4 -->
	
    </div > <!-- cierra display_frame -->

    <div id="display_frame5">
  
    <div id="num5">
      <p>--</p>
	</div > <!-- cierra num5 -->
	<div id="box5">
      <p>BOX -</p>
	</div > <!-- cierra box5 -->
	
    </div > <!-- cierra display_frame -->

    <div id="display_frame6">
  
    <div id="num6">
      <p>--</p>
	</div > <!-- cierra num6-->
	<div id="box6">
      <p>BOX -</p>
	</div > <!-- cierra box6 -->
	
    </div > <!-- cierra display_frame -->
	
  </div > <!-- cierra display_frame456 -->

</div > <!-- cierra display_frame -->

</body>