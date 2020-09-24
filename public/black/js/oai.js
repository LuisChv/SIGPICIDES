

setTimeout(function(){ 
    var cartitas1=document.querySelector('#objetivosCard');
    var cartitas2=document.querySelector('#alcancesCard');        
    var cartitas3=document.querySelector('#indicadoresCard');
    var alto1=cartitas1.offsetHeight;
    var alto2=cartitas2.offsetHeight;       
    var alto3=cartitas3.offsetHeight;
    //console.log(alto1);       

    if(alto3>alto1 && alto3>=alto2){
        alto3=alto3+10;
        $('#objetivosCard').css("height", +alto3+"px");
        $('#alcancesCard').css("height", +alto3+"px");
        $('#indicadoresCard').css("height", +alto3+"px");
        console.log("alto3:"+alto3);
    }else if(alto1>alto2 && alto1>=alto2){
        //console.log('1 mayor');
        //console.log('TRUE2');
        alto1=alto1+15;
        $('#alcancesCard').css("height", +alto1+"px");
        $('#indicadoresCard').css("height", +alto1+"px");
        $('#objetivosCard').css("height", +alto1+"px");
        console.log("alto1:"+alto1);
        //document.getElementById("alcancesCard").setAttribute("style","height:"+alto1+"px"); 
    }else if(alto2>alto1 && alto2>=alto3){
        alto2=alto2+15;
        $('#objetivosCard').css("height", +alto2+"px");
        $('#indicadoresCard').css("height", +alto2+"px");
        $('#alcancesCard').css("height", +alto2+"px");
        console.log("alto2:"+alto2);
    }else if(alto2>=alto1 && alto2>alto3){
        alto2=alto2+15;
        $('#objetivosCard').css("height", +alto2+"px");
        $('#indicadoresCard').css("height", +alto2+"px");
        $('#alcancesCard').css("height", +alto2+"px");
        console.log("alto2:"+alto2);
    }else if(alto3>=alto1 && alto3>alto2){
        alto3=alto3+15;
        $('#objetivosCard').css("height", +alto3+"px");
        $('#alcancesCard').css("height", +alto3+"px");
        $('#indicadoresCard').css("height", +alto3+"px");
        console.log("alto3:"+alto3);
    } else 
    if(alto1>=alto2 && alto1>alto3){
        alto1=alto1+15;
        $('#objetivosCard').css("height", +alto1+"px");
        $('#indicadoresCard').css("height", +alto1+"px");
        $('#objetivosCard').css("height", +alto1+"px");
        console.log("alto2:"+alto2);
    } 
}, 1500);

