function routine(){
    if (holesNumber>0 && processesNumber>0){
        impressButton.style.backgroundColor="rgba(0, 0, 0, 0.79)";
    }
    if (holesNumber>0){
        document.getElementById("holesHeader").innerHTML="Holes";
    }
    if (processesNumber>0){
        document.getElementById("processesHeader").innerHTML="Processes";
    }
    if (selectCheck){
        document.getElementById("typeHeader").innerHTML="Type";
    }

    inputErrorArea.innerHTML=``;
    if (inputError){
    }

    allocationErrorArea.innerHTML='';
    for(let i=0;i<allocationError.length;i++){
        if(allocationError[i])
            allocationErrorArea.innerHTML+=`<p style="margin:-10px">${allocationError[i]}</p><br>`;
    }

    
}