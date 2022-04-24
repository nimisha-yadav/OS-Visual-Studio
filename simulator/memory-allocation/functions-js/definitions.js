//Dom Elements
let body=document.getElementsByTagName("body")[0];

//Dom Elements: areas
let holesInput = document.getElementById("holesInput");
let processesInput = document.getElementById("processesInput");
let test = document.getElementById("test");
let answer = document.getElementById("answer");
let inputErrorArea = document.getElementById("inputErrorArea");
let allocationErrorArea = document.getElementById("allocationErrorArea");

//Dom Elements: buttons
let impressButton=document.getElementById("impressButton");


//Arrays
let holesArray=[];
let processesArray=[];

//Variables
let holesNumber=0;
let processesNumber=0;
let selectCheck=false;
let type;
let inputError='';
let allocationError=[];

//Memory variables
let memory=[];
let currentMemoryPosition=0;
let lastMemoryPosition; //notice that firstMemoryPosition is 0
let memoryBlocksNumber=0;
let emptyMemory=[];