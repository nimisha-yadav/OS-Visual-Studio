function constructMemory(){

    memory=[];
    currentMemoryPosition=0;
  console.log(holesNumber);
    lastMemoryPosition=holesArray[holesNumber-1].endingAt;

    let i=0; //i is the memory blocks counter
    let j=0; //j is the holes counter

    while(j<=holesNumber-1){
        if(holesArray[j].startingAt==currentMemoryPosition){
            memory[i]=new Block("hole", holesArray[j].name, currentMemoryPosition, holesArray[j].endingAt, holesArray[j].endingAt-currentMemoryPosition, holesArray[j].colorCode);
            currentMemoryPosition=holesArray[j].endingAt;
            j++;
        } else {
            memory[i]=new Block("nothing", "nothing", currentMemoryPosition, holesArray[j].startingAt, holesArray[j].startingAt-currentMemoryPosition, 100000);
            currentMemoryPosition=holesArray[j].startingAt;
        }
        i++;
    }

    mixConsecutiveHoles();

    memoryBlocksNumber=i;
    emptyMemory=memory.slice(); // to copy the empty memory array by value
}
