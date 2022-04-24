function handleAddAHole(){
    holesNumber++;
    let newInputs=document.createElement('div');
    newInputs.innerHTML=`
        Hole ${holesNumber}
        <input placeholder="Name" type="hidden" id="hole${holesNumber}Name" value="Hole${holesNumber}"/>
        <input type="text" placeholder="Size" id="hole${holesNumber}Size" >
        <br>
        <input type="text" placeholder="Starting From" id="hole${holesNumber}StartingAt"><br>
    `;
    holesInput.appendChild(newInputs);
    routine();
}

function handleAddAProcess(){
    processesNumber++;
    let newInputs=document.createElement('div');
    newInputs.innerHTML+=`
        Process ${processesNumber}
        <input placeholder="Name" type="hidden" id="process${processesNumber}Name" value="Process${processesNumber}"/>
        <input type="text" placeholder="Size" id="process${processesNumber}Size"><br>
    `;
    processesInput.appendChild(newInputs);
    routine();
}

function handleTypeSelect(){
    selectCheck=true;
    routine();
}
