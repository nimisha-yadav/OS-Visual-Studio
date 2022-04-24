function deallocate(p){

    if(p.state=="deallocated"){
        return 1;
    }

    let i=0; //i is the memory blocks counter

    let deallocatedCheck=false;

    while(i<memoryBlocksNumber){
        if(memory[i].blockName==p.name){
            memory[i].blockType="hole";
            memory[i].blockName=`hole${holesNumber+1}`;
            memory[i].colorCode=Math.floor(Math.random()*(999999-111111+1))+111111;
            holesNumber++;
            deallocatedCheck=true;
            break;
        }
        i++;
    }
    if(!deallocatedCheck){
        return 0;
    } else {
        p.state="deallocated";
        mixConsecutiveHoles();
        return 1;        
    }

};