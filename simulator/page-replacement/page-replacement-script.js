//fifo algorithm
function fifo(){

	//requests
	var inputs = document.getElementById("inputs");
	var arr = inputs.value.split(" "); //split the inputs into an array
	//number of frames
	var frames = document.getElementById("nFrames").valueAsNumber;
	if(Number.isNaN(frames)){
		alert("Enter the no. of frames");
		location.reload();
	}
// console.log(arr)
 var length_of_reference_string=arr.length;
// console.log(length_of_reference_string);
	var max_size=25;
if(length_of_reference_string>max_size){
alert("Reference string should be of size less than or equal to 25");
location.reload();
}
if(length_of_reference_string==1){
	if(arr[0]=="")
	{alert("Enter valid Order of Pages");
	location.reload();}
}
	//list to be updated
	var list = [];

	//temp to store each step
	var temp = [];
  var indexes=new Map();
	//page fault
	var fault = 0;
	var hit = 0;

	var table = document.getElementById("tab"); //table in html
	table.style.display = "table";
	var rowReq = document.getElementById("req"); //request row prebuilt in html

	if(count_click>1){
		var rowCount = $("#tab tr").length;
		if(rowCount>1){
			for(var i=1;i<rowCount;i++){
			document.getElementById("tab").deleteRow(-1);
			}
		}
		var colCount = $("#tab td").length;
		// alert(colCount);
		if(colCount>1){
			// alert(temp);
			for(var i=1;i<colCount;i++){
			document.getElementById("req").deleteCell(-1);
			}
		}
	}


	// for loop to put the requests inside the table
	for(var i = 0; i < arr.length; i++)
	{
		var column = rowReq.insertCell(-1);
		column.innerHTML = arr[i];
	}

	// for loop to add the frames
	for(var i =1; i <= frames; i++)
	{
		var rowrow = table.insertRow(-1);
		rowrow.setAttribute("id", "frame" + i)
		var cell1 = rowrow.insertCell(-1);
		cell1.innerHTML += "Frame " + (i) + ": ";
		cell1.setAttribute("id", "arr" +i);

		// insert the pages
		for(var j=1; j <= arr.length; j++)
		{
			var rowTemp = document.getElementById("frame" + i);
			var column = rowTemp.insertCell(-1);
			//column.innerHTML = list[i -1];
			column.setAttribute("id", "col" + j)

			if(temp[i-1] == null)
				column.innerHTML = "";
		}

	}

var k=0;
	//algorithm
	for(i = 0; i < arr.length; i++)
	{
		console.log(arr[i])
		if(temp.length == 0) //determine if the first page has been inserted
		{
			temp.push(arr[i]); //first job
			indexes.set(arr[i],i);
			list = temp;
			console.log(list);
			fault++;
		}

		else if((temp.length >= frames) && !(temp.includes(arr[i])))
		{

			let ind = Number.MAX_VALUE, val = Number.MIN_VALUE;
		 	// alert(temp);
		  for (let x=0;x<temp.length;x++) {
			  let temp1 = temp[x];
			  // alert(indexes.get(temp1));
			  if (indexes.get(temp1) < ind) {
				  ind = indexes.get(temp1);
				  val = temp1;
			  }
		 }


		 	var to_delete=temp.indexOf(val);
		 	temp.splice(to_delete,1);
		 		// alert(temp);
		 	indexes.delete(val);
		 	temp.splice(to_delete,0,arr[i]);
		 	// alert(temp);
		 	fault++;
		 	indexes.set(arr[i],i);
		}

		else if(!temp.includes(arr[i]))
		{
			fault++;
			temp.push(arr[i]);
			indexes.set(arr[i],i);
			list = temp;
		}

		else if(temp.includes(arr[i]))
		{
			list=temp;
			hit++;
		}

		console.log(list);

		list = temp;
		for(j = 1; j < list.length + 1; j++)
		{
			table.rows[j].cells[i+1].innerHTML = list[j-1];
		}
	}

	// var ratio = fault / frames;
	var rate = (fault / arr.length)*100;
	var rate1 = (hit / arr.length)*100;

	console.log(fault);
	console.log(hit);

	document.getElementById("frame").innerHTML ="Number of frames : "+frames;
	document.getElementById("reference").innerHTML = "Order of pages : "+arr;
	document.getElementById("algo").innerHTML = " Algorithm : First in first out (FIFO)";

	document.getElementById("faults").innerHTML ="Page faults: "+fault;
	document.getElementById("faultrate").innerHTML ="Page fault Rate: "+rate.toFixed(2) + "" + "%";
	document.getElementById("hits").innerHTML = "Page Hit: "+hit;
	document.getElementById("hitrate").innerHTML = "Page Hit Rate: "+rate1.toFixed(2) + "" + "%";

	document.getElementById("nums1").style.display = "block";
	document.getElementById("nums").style.display = "block";
	document.getElementById("nums2").style.display = "block";
}



//lru algorithm
function lru(){

	//requests
	var inputs = document.getElementById("inputs");
	var arr = inputs.value.split(" "); //split the inputs into an array
	//number of frames
	var frames = document.getElementById("nFrames").valueAsNumber;
	// console.log(frames);
	if(Number.isNaN(frames)){
		alert("Enter the no. of frames");
		location.reload();
	}
// console.log(arr)
var length_of_reference_string=arr.length;
// console.log(length_of_reference_string);
 var max_size=25;
if(length_of_reference_string>max_size){
alert("Reference string should be of size 25");
location.reload();
}
   if(length_of_reference_string==1){
  if(arr[0]=="")
 {
	 alert("Enter valid Order of Pages");
 location.reload();
}
}
	//list to be updated
	var list = [];

	//temp to store each step
	var temp = [];

  var indexes=new Map();
	//page fault
	var fault = 0;
	var hit = 0;

	var table = document.getElementById("tab"); //table in html
	table.style.display = "table";
	var rowReq = document.getElementById("req"); //request row prebuilt in html


	if(count_click>1){
		var rowCount = $("#tab tr").length;
		if(rowCount>1){
			for(var i=1;i<rowCount;i++){
			document.getElementById("tab").deleteRow(-1);
			}
		}
		var colCount = $("#tab td").length;
		// alert(colCount);
		if(colCount>1){
			// alert(temp);
			for(var i=1;i<colCount;i++){
			document.getElementById("req").deleteCell(-1);
			}
		}
	}



	// for loop to put the requests inside the table
	for(var i = 0; i < arr.length; i++)
	{
		var column = rowReq.insertCell(-1);
		column.innerHTML = arr[i];
	}

	// for loop to add the frames
	for(var i =1; i <= frames; i++)
	{
		var rowrow = table.insertRow(-1);
		rowrow.setAttribute("id", "frame" + i)
		var cell1 = rowrow.insertCell(-1);
		cell1.innerHTML += "Frame " + (i) + ": ";
		cell1.setAttribute("id", "arr" +i);

		// insert the pages
		for(var j=1; j <= arr.length; j++)
		{
			var rowTemp = document.getElementById("frame" + i);
			var column = rowTemp.insertCell(-1);
			// column.innerHTML = list[i -1];
			column.setAttribute("id", "col" + j)

			if(temp[i-1] == null)
				column.innerHTML = "";
		}

	}


	//algorithm
	for(i = 0; i < arr.length; i++){
		if(temp.length == 0) //determine if the first page has been inserted
		{
			temp.push(arr[i]); //first job
			indexes.set(arr[i],i);
			list = temp;
			fault++;
			console.log(fault);

		}
		else if((temp.length >= frames) && !(temp.includes(arr[i])))
		{
			let ind = Number.MAX_VALUE, val = Number.MIN_VALUE;
		 	// alert(temp);
		 for (let x=0;x<temp.length;x++) {
			let temp1 = temp[x];
			 // alert(indexes.get(temp1));
			 if (indexes.get(temp1) < ind) {
				 ind = indexes.get(temp1);
		 		 val = temp1;
		          }
		}

      var to_delete=temp.indexOf(val);
			temp.splice(to_delete,1);
				// alert(temp);
			indexes.delete(val);
			temp.splice(to_delete,0,arr[i]);
			// alert(temp);
			fault++;
			indexes.set(arr[i],i);
      }
		else if(!temp.includes(arr[i]))
		{
			fault++;
			console.log(fault);
			temp.push(arr[i]);
			indexes.set(arr[i],i);
			list = temp;
		}

		else if(temp.includes(arr[i]))
		{
			indexes.set(arr[i],i);
			console.log(temp)
			list=temp;
			hit++;
		}

		console.log(list);

		list = temp;
		for(j = 1; j < list.length + 1; j++)
		{
			table.rows[j].cells[i+1].innerHTML = list[j-1];
		}
	}


	// var ratio = fault / frames;
	var rate = (fault / arr.length)*100;
	var rate1 = (hit / arr.length)*100;

	console.log(fault);

	document.getElementById("frame").innerHTML ="Number of frames :"+frames;
	document.getElementById("reference").innerHTML ="Order of pages : "+ arr;
	document.getElementById("algo").innerHTML = "Algorithm : Least Recently Used (LRU)";

	document.getElementById("faults").innerHTML ="Page faults: "+ fault;
	document.getElementById("faultrate").innerHTML = "Page fault Rate: "+rate.toFixed(2) + "" + "%";
	document.getElementById("hits").innerHTML = "Page Hit: "+hit;
	document.getElementById("hitrate").innerHTML = "Page Hit Rate: "+rate1.toFixed(2) + "" + "%";

	document.getElementById("nums1").style.display = "block";
	document.getElementById("nums").style.display = "block";
	document.getElementById("nums2").style.display = "block";
}

function opt(){

    //requests
    var inputs = document.getElementById("inputs");
    var arr = inputs.value.split(" "); //split the inputs into an array
    //number of frames
    var frames = document.getElementById("nFrames").valueAsNumber;
		if(Number.isNaN(frames)){
			alert("Enter the no. of frames");
			location.reload();
		} 
    console.log(arr);
		var length_of_reference_string=arr.length;
	 // console.log(length_of_reference_string);
		 var max_size=25;
	 if(length_of_reference_string>max_size){
	 alert("Reference string should be of size 25");
	 location.reload();
	 }
	 if(length_of_reference_string==1){
		 if(arr[0]=="")
		 {alert("Enter valid Order of Pages");
		 location.reload();}
	 }
    //list to be updated
    var list = [];

    //temp to store each step
    var temp = [];

    //page fault
    var fault = 0;
    var hit = 0;

    var table = document.getElementById("tab"); //table in html
    table.style.display = "table";
    var rowReq = document.getElementById("req"); //request row prebuilt in html


		if(count_click>1){
			var rowCount = $("#tab tr").length;
			if(rowCount>1){
				for(var i=1;i<rowCount;i++){
				document.getElementById("tab").deleteRow(-1);
				}
			}
			var colCount = $("#tab td").length;
			// alert(colCount);
			if(colCount>1){
				// alert(temp);
				for(var i=1;i<colCount;i++){
				document.getElementById("req").deleteCell(-1);
				}
			}
		}

    // for loop to put the requests inside the table
    for(var i = 0; i < arr.length; i++)
    {
        var column = rowReq.insertCell(-1);
        column.innerHTML = arr[i];
    }
    // for loop to add the frames
    for(var i =1; i <= frames; i++)
    {
        var rowrow = table.insertRow(-1);
        rowrow.setAttribute("id", "frame" + i)
        var cell1 = rowrow.insertCell(-1);
        cell1.innerHTML += "Frame " + (i) + ": ";
        cell1.setAttribute("id", "arr" +i);

        // insert the pages
        for(var j=1; j <= arr.length; j++)
        {
            var rowTemp = document.getElementById("frame" + i);
            var column = rowTemp.insertCell(-1);
            // column.innerHTML = list[i -1];
            column.setAttribute("id", "col" + j)

            if(temp[i-1] == null)
                column.innerHTML = "";
        }

    }


    //algorithm
    for(i = 0; i < arr.length; i++){

        if(temp.length == 0) //determine if the first page has been inserted
        {
            temp.push(arr[i]); //first job
            console.log(temp);
            list = temp;
            console.log("if");
            fault++;

        }

        else if((temp.length >= frames) && !(temp.includes(arr[i])))
        {
           // Store the index of pages which are going
              // to be used recently in future
                  let res = -1, farthest = i+1,ans=-1;
                  for (let x = 0; x < temp.length; x++) {
	                let y;
	                for (y= i+1; y < arr.length; y++) {
			                 if (temp[x] == arr[y]) {
			                   	 if (y > farthest) {
					                    	farthest = y;
				                        		res = x;
			                        	 }
			                	 break;
			                  }
	                  }
	                // Return the page which are
	               // are never referenced in future,
	                     if (y == arr.length){
			         ans=x;
				 break;									 }
                 }
             // If all of the frames were not in future,
             // return any of them, we return 0. Otherwise
             // we return res.
           
		if(ans!=-1){
		   temp[ans]=arr[i];
		}
		else{
	        ans= (res == -1) ? 0 : res;
		 temp[ans]=arr[i];
	       }
             list = temp;
              fault++;
}


        else if(!temp.includes(arr[i]))
        {
            fault++;
            temp.push(arr[i]);
            console.log(temp);
            list = temp;
            console.log("2elif");
        }

        else if(temp.includes(arr[i]))
        {
            console.log(temp);
            list=temp;
            hit++;
        }

        //console.log(list);

        list = temp;
        for(j = 1; j < list.length + 1; j++)
        {
            table.rows[j].cells[i+1].innerHTML = list[j-1];
        }
    }


    //var ratio = fault / frames;
    var rate = (fault / arr.length)*100;
	var rate1 = (hit / arr.length)*100;

	console.log(fault);

	document.getElementById("frame").innerHTML = "Number of frames :"+frames;
	document.getElementById("reference").innerHTML ="Order of pages : "+ arr;
	document.getElementById("algo").innerHTML =  "Algorithm : Optimal (OPT)";

	document.getElementById("faults").innerHTML ="Page faults: "+ fault;
	document.getElementById("faultrate").innerHTML = "Page fault Rate: "+rate.toFixed(2) + "" + "%";
	document.getElementById("hits").innerHTML = "Page Hit: "+hit;
	document.getElementById("hitrate").innerHTML = "Page Hit Rate: "+rate1.toFixed(2) + "" + "%";

	document.getElementById("nums1").style.display = "block";
    document.getElementById("nums").style.display = "block";
    document.getElementById("nums2").style.display = "block";
}
var count_click=0;
function submit(){

	count_click++;
	// if(count_click>1){
	// 	alert("Enter the values again");
	// 	reset();
	// }
	// document.getElementById("body1").style.height = "130%";
	var select = document.getElementById('select');
	//var option = ['First in first Out (FIFO)','Least Recently Used (LRU)']

	var span = document.getElementById('span');

	var boxx = document.getElementById('box');
	boxx.style.display = "block";

	var nums1 = document.getElementById('nums1');
	nums1.style.transition = "1.5s";

	setTimeout(function(){
		if(select.value == 'First in first Out (FIFO)'){
			fifo();
		}
		else if(select.value == 'Least Recently Used (LRU)'){
			lru();
		}
		else{
			opt();
		}

		span.style.display = 'none';

		boxx.style.display = 'none';

	},1000);
	//document.getElementById('submit_button').disabled=true;

}

function reset(){

	location.reload();
}
