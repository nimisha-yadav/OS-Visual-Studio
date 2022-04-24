function draw(){
    answer.innerHTML=``;

    let memoryHeight=memory[memoryBlocksNumber-1].endingAt;

    for(let i=0;i<memoryBlocksNumber;i++){
        //answer.innerHTML+=`<b>${memory[i].blockType}</b> ,size = ${memory[i].size} , from ${memory[i].startingAt} to ${memory[i].endingAt} `;

        let blockHeight=(memory[i].size / memoryHeight) * 70;
        let labelTop=(memory[i].size / memoryHeight) * 70 - (0.2*(memory[i].size / memoryHeight) * 70);
        let blockColorCode=Math.floor(Math.random()*(999999-111111+1))+111111;

        if(memory[i].blockType=="process"){

            if(i==memoryBlocksNumber-1){
                answer.innerHTML+=`
                <div class="memoryBlockContainer">
                    <h5 class="startingAtLabel label" >${memory[i].startingAt}</h5>
                    <div
                    class="memoryBlock"
                    style="width:200px;
                    height:${blockHeight}vh;
                    background-color:#${memory[i].colorCode};
                    "
                    >
                    <p id="blockType">${memory[i].blockName}</p>
                    </div>
                    <h5 class="endingAtLabel label"
                    style="top:${labelTop}vh"
                    >${memory[i].endingAt}</h5>
                </div>
                `;
            }
            else {
                answer.innerHTML+=`
                <div class="memoryBlockContainer">
                    <h5 class="startingAtLabel label">${memory[i].startingAt}</h5>
                    <div
                    class="memoryBlock"
                    style="width:200px;
                    height:${blockHeight}vh;
                    background-color:#${memory[i].colorCode};
                    "
                    >
                    <p id="blockType">${memory[i].blockName}</p>
                    </div>
                </div>
                `;
            }
        }
        else {
            if(i==memoryBlocksNumber-1){
                answer.innerHTML+=`
                <div class="memoryBlockContainer">
                    <h5 class="startingAtLabel label">${memory[i].startingAt}</h5>
                    <div
                    class="memoryBlock"
                    style="width:200px;
                    height:${blockHeight}vh;
                    background-color:#${memory[i].colorCode};
                    "
                    >
                    <p id="blockType">${memory[i].blockType}</p>
                    </div>
                    <h5 class="endingAtLabel label"
                    style="top:${labelTop}vh;
                    "
                    >${memory[i].endingAt}</h5>
                </div>
                `;
            }
            else {
                answer.innerHTML+=`
                <div class="memoryBlockContainer">
                    <h5 class="startingAtLabel label" >${memory[i].startingAt}</h5>
                    <div
                    class="memoryBlock"
                    style="width:200px;
                    height:${blockHeight}vh;
                    background-color:#${memory[i].colorCode};
                    "
                    >
                    <p id="blockType">${memory[i].blockType}</p>
                    </div>
                </div>
                `;
            }
        }

    }
}
