$(function () {
        $("#navbarToggle").blur(function (event) {
          var screenWidth = window.innerWidth;
          if (screenWidth < 768) {
            $("#collapsable-nav").collapse('hide');
          }
        });

        $("#navbarToggle").click(function (event) {
          $(event.target).focus();
        });
});



/***** GRAPH *****/
function admSelectCheck(nameSelect)
{
    console.log(nameSelect);
    console.log("hello");
    if(nameSelect){
      var  g3 = document.getElementById("o3").value;
      var  g4 = document.getElementById("o4").value;
      var  g5 = document.getElementById("o5").value;
      var  g6 = document.getElementById("o6").value;
      // var  g7 = document.getElementById("o7").value;
        if(g3 == nameSelect.value || g4 == nameSelect.value || g5 == nameSelect.value || g6 == nameSelect.value){
            document.getElementById("admDivCheck").style.display = "block";
        }
        else{
            document.getElementById("admDivCheck").style.display = "none";
        }
    }
    else{
        document.getElementById("admDivCheck").style.display = "none";
    }
}

var pre,v1,v2,v3,v4,v5,v6;

function fcfs(inp, ini, final){
        var x1=[];
        var y1=[];
        var seek=0;
        x1.push(ini);
        y1.push(0);
        var a1;
        for(a1=1;a1<=inp.length;++a1){
                x1.push(inp[a1-1]);
                y1.push(-1*a1);
                if(a1==1){
                        seek=seek+Math.abs(ini-inp[a1-1]);
                }
                else{
                        seek=seek+Math.abs(inp[a1-2]-inp[a1-1]);
                }
        }

        var trace1 = {
                x: x1,
                y: y1,
                type: 'scatter'
        };

        var data = [trace1];
        v1=seek;

        return [data, seek];

}

function sstf(inp, ini, final){
        var x1=[];
        var y1=[];
        var seek=0;
        var visited=[];
        var a1,a2;
        for(a1=0;a1<inp.length;++a1){
                visited[a1]=0;
        }

        x1.push(ini);
        y1.push(0);
        var hold=ini;
        for(a1=1;a1<=inp.length;++a1){
                var mn=10000;
                var idx;
                for(a2=0;a2<inp.length;++a2){
                        if(visited[a2]==0){
                                if(Math.abs(hold-inp[a2])<mn){
                                        idx=a2;
                                        mn=Math.abs(hold-inp[a2]);
                                }
                        }
                }
                seek=seek+Math.abs(hold-inp[idx]);
                visited[idx]=1;
                hold=inp[idx];
                x1.push(inp[idx]);
                y1.push(-1*a1);
        }

        var trace1 = {
                x: x1,
                y: y1,
                type: 'scatter'
        };

        var data = [trace1];
        v2=seek;

        return [data,seek];
}

function scan(inp, ini, final, dir){
        var x1=[];
        var y1=[];
        var seek=0;
        var visited=[];
        var a1,a2;
        console.log(inp);
        for(a1=0;a1<inp.length;++a1){
                visited[a1]=0;
        }

        x1.push(ini);
        y1.push(0);
        inp.sort(function(a, b){return a-b});
        if((ini<inp[0])||(ini>inp[inp.length-1])){
                var scan_use = sstf(inp,ini,final);
                var data = scan_use[0];
                var seek = scan_use[1];
                seek=v2;
                v3=seek;
                return [data,seek];
        }
        if(dir=="left"){
                var store,hold=ini;
                for(a1=0;a1<inp.length;++a1){if(inp[a1]<=ini){store=a1;}}
                var count=1;
                for(a1=store;a1>=0;--a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }
                x1.push(0);
                y1.push(-1*count);
                seek=seek+hold;
                hold=0;
                ++count;
                for(a1=store+1;a1<inp.length;++a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }
        }
        else{
                var store,hold=ini;
                for(a1=0;a1<inp.length;++a1){if(inp[a1]>=ini){store=a1;break}}
                var count=1;
                for(a1=store;a1<inp.length;++a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }
                x1.push(final);
                y1.push(-1*count);
                seek=seek+parseInt(final)-hold;
                hold=final;
                ++count;
                for(a1=store-1;a1>=0;--a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }

        }

        var trace1 = {
                x: x1,
                y: y1,
                type: 'scatter'
        };

        var data = [trace1];
        v3=seek;
        console.log(seek);
        console.log(x1);
        return [data, seek];
}

function cscan(inp, ini, final, dir){
        var x1=[];
        var y1=[];
        var x2=[];
        var y2=[];
        var x3=[];
        var y3=[];
        var seek=0;
        var visited=[];
        var a1,a2;
        for(a1=0;a1<inp.length;++a1){
                visited[a1]=0;
        }

        x1.push(ini);
        y1.push(0);
        inp.sort(function(a, b){return a-b});
        if((ini<inp[0])||(ini>inp[inp.length-1])){
                var cscan_use = sstf(inp,ini,final);
                var data = cscan_use[0];
                var seek = cscan_use[1];
                seek=v2;
                v4=seek;
                return [data,seek];
        }
        if(dir=="left"){
                var store,hold=ini;
                for(a1=0;a1<inp.length;++a1){if(inp[a1]<=ini){store=a1;}}
                var count=1;
                for(a1=store;a1>=0;--a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }
                x1.push(0);
                y1.push(-1*count);
                seek=seek+hold;
                hold=final;
                x2.push(0);
                y2.push(-1*count);
                x2.push(final);
                y2.push(-1*count);

                x3.push(final);
                y3.push(-1*count);
                ++count;
                for(a1=inp.length-1;a1>store;--a1){
                        x3.push(inp[a1]);
                        y3.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }
        }
        else{
                var store,hold=ini;
                for(a1=0;a1<inp.length;++a1){if(inp[a1]>=ini){store=a1;break;}}
                var count=1;
                for(a1=store;a1<inp.length;++a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }
                x1.push(final);
                y1.push(-1*count);
                seek=seek+final-hold;
                hold=0;
                x2.push(final);
                y2.push(-1*count);
                x2.push(0);
                y2.push(-1*count);

                x3.push(0);
                y3.push(-1*count);
                ++count;
                for(a1=0;a1<store;++a1){
                        x3.push(inp[a1]);
                        y3.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }

        }
        var trace1 = {
                x: x1,
                y: y1,
                type: 'scatter',
                name: ''
        };
        var trace2 = {
                x: x2,
                y: y2,
                mode: 'lines',
                name: '',
                line: {
                        dash: 'dashdot',
                        width: 4
                }
        };
        var trace3 = {
                x: x3,
                y: y3,
                type: 'scatter',
                name: ''
        };

        v4=seek;

        var data = [trace1,trace2,trace3];
        var max1 = Math.max(...trace1.x);
        var max2 = Math.max(...trace2.x);
        var max3 = Math.max(...trace3.x);

        var min1 = Math.min(...trace1.x);
        var min2 = Math.min(...trace2.x);
        var min3 = Math.min(...trace3.x);

        seek = max1 + max2 + max3 - min1 - min2 - min3;






        return [data, seek];
}

function look(inp, ini, final, dir){
        var x1=[];
        var y1=[];
        var seek=0;
        var visited=[];
        var a1,a2;
        for(a1=0;a1<inp.length;++a1){
                visited[a1]=0;
        }

        x1.push(ini);
        y1.push(0);
        inp.sort(function(a, b){return a-b});
        if((ini<inp[0])||(ini>inp[inp.length-1])){
                var look_use = sstf(inp,ini,final);
                var data = look_use[0];
                var seek = look_use[1];
                seek=v2;
                v5=seek;
                return [data,seek];
        }
        if(dir=="left"){
                var store,hold=ini;
                for(a1=0;a1<inp.length;++a1){if(inp[a1]<=ini){store=a1;}}
                var count=1;
                for(a1=store;a1>=0;--a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }

                for(a1=store+1;a1<inp.length;++a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }
        }
        else{
                var store,hold=ini;
                for(a1=0;a1<inp.length;++a1){if(inp[a1]>=ini){store=a1;break}}
                var count=1;
                for(a1=store;a1<inp.length;++a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }

                for(a1=store-1;a1>=0;--a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }

        }

        var trace1 = {
                x: x1,
                y: y1,
                type: 'scatter'
        };

        var data = [trace1];
        v5=seek;

        return [data, seek];
}

function clook(inp, ini, final, dir){
        var x1=[];
        var y1=[];
        var x2=[];
        var y2=[];
        var x3=[];
        var y3=[];
        var seek=0;
        var visited=[];
        var a1,a2;
        for(a1=0;a1<inp.length;++a1){
                visited[a1]=0;
        }

        x1.push(ini);
        y1.push(0);
        inp.sort(function(a, b){return a-b});
        if((ini<inp[0])||(ini>inp[inp.length-1])){
                var clook_use = sstf(inp,ini,final);
                var data = clook_use[0];
                var seek = clook_use[1];
                seek=v2;
                v6=seek;
                return [data, seek];
        }
        if(dir=="left"){
                var store,hold=ini;
                for(a1=0;a1<inp.length;++a1){if(inp[a1]<=ini){store=a1;}}
                var count=1;
                for(a1=store;a1>=0;--a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }

                x2.push(hold);
                y2.push(-1*(count-1));
                x2.push(inp[inp.length-1]);
                y2.push(-1*(count-1));
                x3.push(inp[inp.length-1]);
                y3.push(-1*(count-1));

                hold=inp[inp.length-1];
                for(a1=inp.length-2;a1>store;--a1){
                        x3.push(inp[a1]);
                        y3.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }
        }
        else{
                var store,hold=ini;
                for(a1=0;a1<inp.length;++a1){if(inp[a1]>=ini){store=a1;break;}}
                var count=1;
                for(a1=store;a1<inp.length;++a1){
                        x1.push(inp[a1]);
                        y1.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }

                x2.push(hold);
                y2.push(-1*(count-1));
                x2.push(inp[0]);
                y2.push(-1*(count-1));

                x3.push(inp[0]);
                y3.push(-1*(count-1));

                hold=inp[0];
                for(a1=1;a1<store;++a1){
                        x3.push(inp[a1]);
                        y3.push(-1*count);
                        ++count;
                        seek=seek+Math.abs(hold-inp[a1]);
                        hold=inp[a1];
                }

        }

        var trace1 = {
                x: x1,
                y: y1,
                type: 'scatter',
                name: ''
        };
        var trace2 = {
                x: x2,
                y: y2,
                mode: 'lines',
                name: '',
                line: {
                        dash: 'dashdot',
                        width: 4
                }
        };
        var trace3 = {
                x: x3,
                y: y3,
                type: 'scatter',
                name: ''
        };

        var data = [trace1,trace2,trace3];
        v6=seek;

        var data = [trace1,trace2,trace3];
        var max1 = Math.max(...trace1.x);
        var max2 = Math.max(...trace2.x);
        var max3 = Math.max(...trace3.x);

        var min1 = Math.min(...trace1.x);
        var min2 = Math.min(...trace2.x);
        var min3 = Math.min(...trace3.x);

        seek = max1 + max2 + max3 - min1 - min2 - min3;

        return [data, seek];
}

function getBitStreamAndPlot(event, r1, ini, final, alg, side){
        var b = document.forms["myForm"]["bitstream-input"].value;
        var i = document.forms["myForm"]["initial-input"].value;
        if(b == ""){
                alert("Enter the Sequence of Request queue!");
                return false;
        }
        if (b!= "" && i == "") {
                alert("Enter the value of Initial Cylinder!");
                return false;
        }

        var inp=[],r2=r1.split(" "),r3;
        for(a1=0;a1<r2.length;++a1){
                if(r2[a1]==""){continue;}
                r3=parseInt(r2[a1]);
                inp.push(r3);

                if((r3>parseInt(final)) || (parseInt(ini)>parseInt(final))){
                                alert("Invalid Input: Final cylinder has to be Greater!");
                                return;
                }
        }

        final=parseInt(final);
        ini=parseInt(ini);
        dir=side;
        pre=1;
        if(alg=="fcfs"){
                var alg_use = fcfs(inp, ini, final);
                var plt_alg = "FCFS";
        }
        if(alg=="sstf"){
                var alg_use = sstf(inp, ini, final);
                var plt_alg = "SSTF";

        }
        if(alg=="scan"){
                var f = document.forms["myForm"]["final-input"].value;

                if(f == ""){
                        alert("Enter the value of Final Cylinder");
                        return false;
                }

                var alg_use = scan(inp, ini, final, dir);
                var plt_alg = "SCAN";

        }
        if(alg=="c-scan"){
                var alg_use = cscan(inp, ini, final, dir);
                var plt_alg = "C-SCAN";

                var f = document.forms["myForm"]["final-input"].value;

                if(f == ""){
                        alert("Enter the value of Final Cylinder");
                        return false;
                }

        }
        if(alg=="look"){
                var alg_use = look(inp, ini, final, dir);
                var plt_alg = "LOOK";
        }
        if(alg=="c-look"){
                var alg_use = clook(inp, ini, final, dir);
                var plt_alg = "C-LOOK";
        }

        var data = alg_use[0];
        var seek = alg_use[1];

        var layout = {
                xaxis: {
                        autorange: true,
                        showgrid: true,
                        zeroline: false,
                        showline: true,
                        autotick: true,
                        ticks: '',
                        showticklabels: true,
                        title: 'Cylinder Number'
                },
                yaxis: {
                        autorange: true,
                        showgrid: false,
                        zeroline: false,
                        showline: false,
                        autotick: true,
                        ticks: '',
                        showticklabels: false,
                }
        };

        if(pre){
                Plotly.newPlot('graph_area', data, layout);
                var val = data[0].x;
                var tot_seek = "Seek-Time: ";
                for(var i=1; i<val.length; i++){
                        tot_seek = tot_seek + "|" + val[i].toString() + "-" + val[i-1].toString()  + "|" ;
                        if(i<val.length-1)
                                tot_seek = tot_seek + "+";

                }
                document.getElementById("plt_alg_name").innerHTML = plt_alg;
                document.getElementById("cal-seek").innerHTML = tot_seek + " = " + seek;

                document.getElementById("graph_area").style.visibility = "visible";
                cmprPlot(event, document.getElementById('bitstream-input').value, document.getElementById('initial-input').value, document.getElementById('final-input').value, document.getElementById('direction').value);
        }

}

function cmprPlot(event, r1, ini, final, alg, side){

        document.getElementById("cmpr-head").innerHTML="Comparison-Chart";

        var b = document.forms["myForm"]["bitstream-input"].value;
        var i = document.forms["myForm"]["initial-input"].value;
        if(b == ""){
                alert("Enter the Sequence of Request queue!");
                return false;
        }
        if (b!= "" && i == "") {
                alert("Enter the value of Initial Cylinder!");
                return false;
        }

        var ini = parseInt(document.getElementById('initial-input').value);
        var final =  parseInt(document.getElementById('final-input').value);
        var str = document.getElementById('bitstream-input').value;
        var dir = document.getElementById('direction').value;

        var inp=[],r2=str.split(" "),r3;
        for(a1=0;a1<r2.length;++a1){
                if(r2[a1]==""){continue;}
                r3=parseInt(r2[a1]);
                inp.push(r3);

                if((r3>parseInt(final)) || (parseInt(ini)>parseInt(final))){
                                alert("Invalid Input: Final cylinder has to be Greater!");
                                return;
                }
        }

        final=parseInt(final);
        ini=parseInt(ini);

        var op1 = fcfs(inp, ini, final);
        var seek1 = op1[1];

        var op2 = sstf(inp, ini, final);
        var seek2 = op2[1];

        var op3 = scan(inp, ini, final, dir);
        var seek3 = op3[1];

        var op4 = cscan(inp, ini, final, dir);
        var seek4 = op4[1];

        var op5 = look(inp, ini, final, dir);
        var seek5 = op5[1];

        var op6 = clook(inp, ini, final, dir);
        var seek6 = op6[1];

        var data = [
                {
                  x: ['FCFS', 'SSTF', 'SCAN', 'C-SCAN', 'LOOK', 'C-LOOK'],
                  y: [seek1, seek2, seek3, seek4, seek5, seek6],
                  type: 'bar'
                }
              ];

              Plotly.newPlot('cmpr_area', data);

              document.getElementById("cmpr_area").style.visibility = "visible";
}
