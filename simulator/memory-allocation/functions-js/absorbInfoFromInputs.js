function absorbInfoFromInputs(){

    type=document.getElementById("type").value;

    holesArray=[];
    processesArray=[];
    memoryBlocksNumber=0;

    for(let i=1;i<=holesNumber;i++){
        //declaring the dynamic named variables
        window[`hole${i}Name`]=document.getElementById(`hole${i}Name`).value;
        window[`hole${i}Size`]=Number(document.getElementById(`hole${i}Size`).value);
        window[`hole${i}StartingAt`]=Number(document.getElementById(`hole${i}StartingAt`).value);
        window[`hole${i}EndingAt`]=window[`hole${i}StartingAt`]+window[`hole${i}Size`];
        //each array element is a Hole object
        holesArray[i-1]=new Hole(window[`hole${i}Name`], window[`hole${i}Size`], window[`hole${i}StartingAt`], window[`hole${i}EndingAt`]);
    }

    for(let i=1;i<=processesNumber;i++){
        //declaring the dynamic named variables
        window[`process${i}Name`]=document.getElementById(`process${i}Name`).value;
        window[`process${i}Size`]=Number(document.getElementById(`process${i}Size`).value);
        //each array element is a Process object
        processesArray[i-1]=new Process(window[`process${i}Name`], window[`process${i}Size`]);
    }

    //Sorting the holes array:
    holesArray.sort((a,b)=>{
        return a.startingAt-b.startingAt;
    });
console.log(holesNumber);
    for(let i=1;i<holesNumber;i++){
      // console.log(holesArray[i-1].endingAt+"  ");
        if(holesArray[i].startingAt<holesArray[i-1].endingAt){
          if(holesArray[i].endingAt< holesArray[i-1].endingAt){
            holesArray[i].endingAt=holesArray[i-1].endingAt;
            holesArray.splice(i,1); //to remove the element of index i
          }
          else{
            holesArray[i-1].endingAt=holesArray[i].endingAt;
            holesArray[i-1].size=holesArray[i-1].endingAt-holesArray[i-1].startingAt;
            holesArray.splice(i,1); //to remove the element of index i
          }
            // holesArray[i-1].endingAt=holesArray[i].endingAt;
            // holesArray[i-1].size=holesArray[i-1].endingAt-holesArray[i-1].startingAt;
            // console.log(holesArray[i-1]);
            // holesArray.splice(i,1); //to remove the element of index i
            holesNumber--;
            console.log(holesArray[i]);
        }
    }

    routine();
}
