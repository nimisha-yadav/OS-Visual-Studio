function mixConsecutiveHoles(){

    i=0; //i is the memory blocks counter

    while(i<memoryBlocksNumber-1){
        if(memory[i].blockType=="hole" && memory[i+1].blockType=="hole"){
            memory[i].endingAt=memory[i+1].endingAt;
            memory[i].size=memory[i].size+memory[i+1].size;
            memory[i].colorCode=memory[i+1].colorCode;            
            memory.splice(i+1,1); //to remove the element of index i+1
            holesNumber--;
            memoryBlocksNumber--;
            continue;
        }
        i++;
    }

}