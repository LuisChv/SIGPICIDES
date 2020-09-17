var cartitas1=document.querySelector('#objetivosCard');
var cartitas2=document.querySelector('#alcancesCard');        
var cartitas3=document.querySelector('#indicadoresCard');
var alto1=cartitas1.offsetHeight;
var alto2=cartitas2.offsetHeight;       
var alto3=cartitas3.offsetHeight;
//console.log(alto1);       

if(alto1>alto2){
    //console.log('1 mayor');
    if(alto1>=alto3){
        //console.log('TRUE2');
        $('#alcancesCard').css("height", +alto1+"px");
        $('#indicadoresCard').css("height", +alto1+"px");
        //document.getElementById("alcancesCard").setAttribute("style","height:"+alto1+"px"); 
    }
} else if(alto2>alto1){
    if(alto2>=alto3){
        $('#objetivosCard').css("height", +alto2+"px");
        $('#indicadoresCard').css("height", +alto2+"px");
    }
} else if(alto3>alto1){
    if(alto3>=alto2){
        $('#objetivosCard').css("height", +alto3+"px");
        $('#alcancesCard').css("height", +alto3+"px");
    }
}   