class Hole{
    constructor(name, size, startingAt, endingAt, isEmpty=true){
        this.name=name;
        this.size=size;
        this.startingAt=startingAt;
        this.endingAt=endingAt;
        this.isEmpty=isEmpty;
        this.colorCode=Math.floor(Math.random()*(999999-111111+1))+111111;        
    }
}

class Process{
    constructor(name, size, startingAt=0, endingAt=0, isWaiting=false, state="deallocated"){
        this.name=name;
        this.size=size;
        this.startingAt=startingAt;
        this.endingAt=endingAt;
        this.isWaiting=isWaiting;
        this.state=state;
        this.colorCode=Math.floor(Math.random()*(999999-111111+1))+111111;        
    }
}

class Block{
    constructor(blockType, blockName, startingAt=0, endingAt=0, size, colorCode){
        this.blockType=blockType;
        this.blockName=blockName;        
        this.startingAt=startingAt;
        this.endingAt=endingAt;   
        this.size=size;
        this.uniqueIdentifier=Math.random();
        this.colorCode=colorCode;
    }
}
