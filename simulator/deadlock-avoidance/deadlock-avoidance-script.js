

function toast(data) {
    Materialize.toast(data, 2000);
}

function init() {
    interblocage = false;
    nbResources = 0;
    resources = [];
    available = [];
    allocation = [];
    max = [];
    nbProc = 0;
    need = [];
    seq = [];
    $("#div0").hide();
    html = '<h4 style="color: solid grey;">Enter Resource Numbers</h4>  <input type="number" id="nbRes" placeholder="Number of Resources"> <center> <button class="button special" onclick="validerRsc()">Proceed</button> </center>';
    $("#div0").html(html).show(1500);
    $("#restart").hide();
    document.getElementById("nbRes").focus();

}
init();

function scrollme(page, vitesse) {
    $('html, body').animate({
        scrollTop: $(page).offset().top
    }, vitesse); // Go
}

function sout(data) {
    console.log(data);
}

function checkInput(input, msg) {
    var test = true;
    if (input.length == 0) {
        toast("Attention! " + msg + " is empty.");
        test = false;
    } else if (input <= 0) {
        toast("Attention! " + msg + " is invalid.");
        test = false;
    }
    return test;
}

function checkPR(input, msg) {
    var test = true;
    if (input.length == 0) {
        toast("Attention! " + msg + " is empty.");
        test = false;
    } else if (input < 0) {
        toast("Attention! " + msg + " is negative.");
        test = false;
    }
    return test;
}

function proceder() {
    $("#div2").empty().hide();

    test = true;
    resources = [];
    for (i = 0; i < nbResources; i++) {
        val = $("#r" + i).val();
        resources.push(parseInt(val));
        if (!checkInput(val, "Resource Number" + (i + 1))) {
            test = false;
        }
    }
    if (test) {
        html = "<h4 style='color: solid grey;'>Enter Process Numbers</h4><center>" +
            "<input type='number' id='nbProc' placeholder='Number of Processes'><br>" +
            "<button class='button special' onclick='suivantMax()'>Proceed</button>" +
            "</center>";
        $("#div2").append(html);

    }
    $("#div2").show(500);

}

function suivantMax() {
    //affichage max
    $("#div3").empty().hide();

    nbProc = $("#nbProc").val();
    if (checkInput(nbProc, "The Number of Processes")) {
        $("#div3").append("<h4 style='color: solid grey;'>Entering the Max Matrix</h4>")
        html = "<table class='alt'>";
        for (i = 0; i < nbProc; i++) {
            html += "<tr>";
            for (j = 0; j < nbResources; j++) {
                html += "<td><input placeholder='Max(P" + (i + 1) + ",R" + (j + 1) + ")' type='number' id='max-" + i + "-" + j + "'> </td>"
            }
            html += "</tr>";

        }
        html += "</table><br><center><button class='button special' onclick='suivantAllocation()'>Proceed</button></center>";

        $("#div3").append(html);
    }
    $("#div3").show(500, function () {
        scrollme("#div3", 0);
    });

}

function sommeColonne(col) {
    sum = 0;
    for (i = 0; i < nbProc; i++) {
        sum += allocation[i][col];
    }
    return sum;
}

function testAllocation() {

    var test = true;
    for (i = 0; i < nbProc; i++) {
        for (j = 0; j < nbResources; j++) {
            if (max[i][j] < allocation[i][j]) {
                toast("Invalid input data: The number of allocated resources is more than the number of processes.");
                $("#alloc-" + i + "-" + j).css("color", "red");
                test = false;
            }
            else {
                $("#alloc-" + i + "-" + j).css("color", "black");
            }
        }

    }

    if (test) {
        for (k = 0; k < nbResources; k++) {
            if (sommeColonne(k) > resources[k]) {
                test = false;
            }
        }
        if (!test) {
            toast("False Entry: Number of Assets > Number of Resources");
        }
    }

    return test;
}

function testMax() {
    var test = true;
    for (i = 0; i < nbProc; i++) {
        for (j = 0; j < nbResources; j++) {
            if (max[i][j] > resources[j]) {
                test = false;
                $("#max-" + i + "-" + j).css("color", "red");
                toast("The number of resources requested by P" + (i + 1) + " is unavailable.");
            }
            else {
                $("#max-" + i + "-" + j).css("color", "black");
            }
        }
    }
    return test;
}

function suivantAllocation() {
    $("#div4").empty().hide();
    test = true;
    max = [];
    for (i = 0; i < nbProc; i++) {
        max[i] = [];
        for (j = 0; j < nbResources; j++) {
            val = ($("#max-" + i + "-" + j).val());
            max[i][j] = parseInt(val);
            if (!checkPR(val, "Max(" + (i + 1) + "," + (j + 1 + ")"))) {
                test = false;
            }
        }
    }
    if (test) {
        if (testMax()) {
            $("#div4").append("<h4 style='color: solid grey;'>Entering the Allocation Matrix</h4>")
            html = "<table class='alt'>";
            for (i = 0; i < nbProc; i++) {
                html += "<tr>";
                for (j = 0; j < nbResources; j++) {
                    html += "<td><input placeholder='Alloc(P" + (i + 1) + ",R" + (j + 1) + ")' type='number' id='alloc-" + i + "-" + j + "'> </td>"
                }
                html += "</tr>";

            }
            html += "</table><br><center><button class='button special' onclick='suivantCalcul()'>Submit</button></center>";

            $("#div4").append(html);
        }
    }
    $("#div4").show(500, function () {
        scrollme("#div4", 0);
    });

}

function getAvailable(res) {
    result = resources[res];
    for (i = 0; i < nbProc; i++) {
        result -= (allocation[i][res]);
    }
    return result;
}

function isEmpty() {
    test = true;
    for (i = 0; i < nbProc; i++) {
        for (j = 0; j < nbResources; j++) {
            if (allocation[i][j] != 0) {
                test = false;
            }
        }
    }

    return test;
}

function isEmptyNeed() {
    test = true;
    for (i = 0; i < nbProc; i++) {
        for (j = 0; j < nbResources; j++) {
            if (need[i][j] != 0) {
                test = false;
            }
        }
    }

    return test;
}

function additionner(line) {
    for (j = 0; j < nbResources; j++) {
        available[j] += allocation[line][j];
    }
}

function setLineEmpty(line) {
    for (i = 0; i < nbResources; i++) {
        allocation[line][i] = 0;
        need[line][i] = 0;
    }
}

function isLineEmpty(line) {
    test = true;
    for (i = 0; i < nbResources; i++) {
        if (need[line][i] != 0) {
            test = false;
        }
    }
    return test;
}

function getLineAvailable() {
    i = -1;
    retour = -1;
    test = false;
    while ((++i < nbProc) && (!test)) {
        test = true;
        sm = 0;
        for (k = 0; k < nbResources; k++) {
            sm += need[i][k];
            sout(need[i][k] + " " + available[k]);
            if ((need[i][k] > available[k])) {
                test = false;
            }
        }
        sout("\n");

        if (sm == 0) {
            test = false;
        }

        if (test) {
            retour = i;
        }
    }
    return retour;
}

function restart() {
    $("#count,#div2,#div3,#div4,#div5,#cont, #restart").hide();
    $("#nbRes").val("");
    init();
}

function entete() {
    result = "";
    result += "<tr>";
    for (x = 0; x < nbResources; x++) {
        if (x == 0)
            result = result + "<td>&nbsp;</td>"
        result = result + "<td style='color:solid grey;'>R" + (x + 1) + "</td>"
    }
    result += "</tr>";
    return result;
}

function iterate() {
    i = 0;
    count = 0;
    test = true;
    begin = new Date().getTime();
    if (isEmptyNeed()) {
        toast("No iteration...");
    }
    //&& !isEmpty()
    while (!interblocage && !isEmptyNeed()) {
        i++;

        line = getLineAvailable();
        sout("line" + line);
        html = "<h4 style='margin-bottom:50px;background: #e89980; color: whitesmoke; border-radius: 54px; padding: 7px;'>Iteration " + (++count) + "</h4>";
        $("#div4").append(html);
        if (line == -1) {
            interblocage = true;
            sout("interblocage");
            html = "<h1 style='background: crimson;color: whitesmoke;padding: 5px;'>Deadlock</h1>"
        }
        else {
            seq.push(line);
            additionner(line);
            setLineEmpty(line);

            html = "<h5><span class='fp'>Table Allocation:</span></h5><table class='alt'>";
            for (i = 0; i < nbProc; i++) {
                if (i == 0) {
                    html += entete();
                }
                html += "<tr>";
                for (j = 0; j < nbResources; j++) {
                    if (j == 0)
                        html += "<td style='color: solid grey;'>P" + (i + 1) + " </td>"
                    html += "<td>" + (allocation[i][j]) + " </td>"
                }
                html += "</tr>";

            }
            html += "</table><br>";

            $("#div4").append(html);
            sout("allocation");
            sout(allocation);
            html = "<h5><span class='fp'>Table Need:</span></h5><table class='alt'>";
            for (i = 0; i < nbProc; i++) {
                if (i == 0) {
                    html += entete();
                }
                html += "<tr>";
                for (j = 0; j < nbResources; j++) {
                    if (j == 0)
                        html += "<td style='color: solid grey;'>P" + (i + 1) + " </td>"
                    html += "<td>" + (need[i][j]) + " </td>"
                }
                html += "</tr>";

            }
            html += "</table><br>";

            $("#div4").append(html);
            sout("need");
            sout(need);
            html = "<h5><span class='fp'>Table Available:</span></h5><table class='alt'><tr>";
            for (i = 0; i < nbResources; i++) {
                html += "<td style='color: solid grey;'>R" + (i + 1) + " </td>"
            }
            html += "</tr><tr>";
            for (i = 0; i < nbResources; i++) {
                html += "<td>" + available[i] + " </td>"
            }
            html += "</tr></table><br>";

            $("#div4").append(html);
            sout("available");
            sout(available);
        }

    }
    end = new Date().getTime();
    time = end - begin;
    $("#exec_time").html(time);
}

function suivantCalcul() {
    $("#div5").empty();
    $("#div5").show(500);
    var test = true;
    allocation = [];
    available = [];
    need = [];
    for (i = 0; i < nbProc; i++) {
        allocation[i] = [];
        for (j = 0; j < nbResources; j++) {
            val = ($("#alloc-" + i + "-" + j).val());
            allocation[i][j] = parseInt(val);
            if (!checkPR(val, "Alloc(" + (i + 1) + "," + (j + 1 + ")"))) {
                test = false;
            }
        }
    }
    if (test) {
        if (testAllocation()) {
            for (i = 0; i < nbProc; i++) {
                need[i] = [];
                for (j = 0; j < nbResources; j++) {
                    need[i][j] = max[i][j] - allocation[i][j];
                }
            }
            sout(need);

            $("#cont").empty();

            html = "<h5><span class='fp'>Resource List:</span></h5><table class='alt'><tr>";
            for (i = 0; i < nbResources; i++) {
                html += "<td>" + (resources[i]) + " </td>"
            }
            html += "</tr></table><br>";

            $("#cont").append(html);

            $("#div2").empty();
            html = "<h5><span class='fp'>Table Max:</span> </h5><table class='alt'>";
            for (i = 0; i < nbProc; i++) {
                html += "<tr>";
                for (j = 0; j < nbResources; j++) {
                    html += "<td>" + (max[i][j]) + " </td>"
                }
                html += "</tr>";

            }
            html += "</table><br>";

            $("#div2").append(html);
            $("#div3").empty();
            html = "<h5><span class='fp'>Table Allocation:</span></h5><table class='alt'>";
            for (i = 0; i < nbProc; i++) {
                html += "<tr>";
                for (j = 0; j < nbResources; j++) {
                    html += "<td>" + (allocation[i][j]) + " </td>"
                }
                html += "</tr>";
            }
            html += "</table><br>";

            $("#div3").append(html);
            $("#div4").empty();

            sout(nbResources);
            for (x = 0; x < nbResources; x++) {
                available.push(getAvailable(x));
            }

            html = "<h5><span class='fp'>Table Available:</span></h5><table class='alt'><tr>";
            for (i = 0; i < nbResources; i++) {
                html += "<td>" + available[i] + "</td>"
            }
            html += "</tr></table>";

            $("#div4").append(html);
            sout(available);

            $("#div0").hide();
            iterate();
            var notif;

            if (!interblocage) {
                notif = new Audio("simulator/deadlock-avoidance/notif.mp3")
                $("#div0").hide();
                html = "  <div style='padding: 15px;background-color: darkgreen;color:whitesmoke;'><h1 style='color:whitesmoke'>No Deadlock</h1> <h5 style='color:whitesmoke'>Sequence:</h5><table><tr>";
                for (u = 0; u < seq.length; u++) {
                    html += "<td style='padding: 15px;background-color: darkgreen;color:whitesmoke;'>P" + seq[u] + "</td>"
                    //html += "<td style='background-color: darkgreen;color:whitesmoke'>P" + seq[u] + "</td>"
                    //html += "<td style='color:whitesmoke'>P" + seq[u] + "</td>"
                }

                html += "</tr></table></div>";
                $("#div5").append(html);
                Materialize.toast("No deadlock", 5000, "greenToast");
            }
            else {
                notif = new Audio("simulator/deadlock-avoidance/error.mp3")

                html = "  <div style='padding: 15px;background-color: crimson;color:whitesmoke;'><h1>Deadlock!</h1><h5>Incomplete sequence!</h5></div>";
                $("#div5").append(html);
                Materialize.toast("Deadlock!", 5000, "redToast");
            }
            notif.play();
            $("#restart").show(1000);
        }

    }
}

function validerRsc() {
    $("#cont").hide();

    nbResources = $("#nbRes").val();
    if (checkInput(nbResources, "The number of resources")) {
        $("#cont").empty();
        var html = " <h4 style='color: solid grey;'>Entering Resource Instances</h4> <table class='alt'><tr>";
        for (i = 0; i < nbResources; i++) {
            html += "<td style='text-align: center  '>R" + (i + 1) + "</td>";
        }
        html += "</tr><tr>";
        for (i = 0; i < nbResources; i++) {
            html += "<td><input type='number' id='r" + i + "' placeholder='Resource Instances" + (i + 1) + "'></td>";
        }
        html += "</tr></table><br><center><button class='button special' onclick='proceder()'>Proceed</button></center>";
        $("#cont").append(html);
    }
    $("#cont").show(1500);
}

var interblocage = false;
var nbResources;
var resources = [];
var available = [];
var allocation = [];
var max = [];
var nbProc;
var need = [];
var seq = [];

