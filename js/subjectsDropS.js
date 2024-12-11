        //Function to Create Additional and Duplicate Subjects
        var userS;
        var selectedValueS = [];
        var MILGeneratedS = 0;
        function remveSubjectS(userS) {
            if (userS == "Alt English") {
                userS = "MIL";
                subjectsS.remove(userS);
            }
            else if (userS == "MIL") {
                userS = "Alt English";
                subjectsS.remove(userS);
            }
            else if (userS == "Computer Science") {
                userS = "Informatics Practices";
                subjectsS.remove(userS);
            }
            else if (userS == "Informatics Practices") {
                userS = "Computer Science";
                subjectsS.remove(userS);
            }
            else if (userS == "Education") {
                userS = "Psychology";
                subjectsS.remove(userS);
            }
            else if (userS == "Psychology") {
                userS = "Education";
                subjectsS.remove(userS);
            }
        }

        //Array that holds all subjectsS available
        var subjectsS = new Array("Chemistry", "Physics", "Biology", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology",
                   "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
        var subjectsMILS = new Array("AO", "Hindi", "Bengali", "Lotha", "Sumi", "Tenyide");
        //Function to add an option to Select Control
        function addOption(selectbox, text, value) {
            var optn = document.createElement("OPTION");
            optn.text = text;
            optn.value = value;
            selectbox.options.add(optn);
        }

        //Function to Add Options Dynamically from array
        function addOption_listS() {

            for (var i = 0; i < subjectsS.length; ++i) {

                addOption(document.myForm.Elective1S, subjectsS[i], subjectsS[i]);
            }
        }

        //Function to remove options already Selected
        function removeOptions(selectbox) {
            var i;
            for (i = selectbox.options.length - 1; i >= 0; i--) {
                selectbox.remove(i);
            }
        }
        function getMILValueS() {
            div = document.getElementById('MILValueS');
            div.innerHTML = MILGeneratedS;
            var div1 = document.getElementById('E1S');
            div1.innerHTML = selectedValueS[0];
            var div2 = document.getElementById('E2S');
            div2.innerHTML = selectedValueS[1];
            var div3 = document.getElementById('E3S');
            div3.innerHTML = selectedValueS[2];
            var div4 = document.getElementById('E4S');
            div4.innerHTML = selectedValueS[3];
        }
        //Generate Elective 2 Subject LIst
        function addOption_listS_elective2S() {
            //using the function:
            removeOptions(document.getElementById("Elective2S"));
            subjectsS = new Array("Chemistry", "Physics", "Biology", "Mathemathics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology",
                   "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };
            }
            var e = document.getElementById("Elective1S");
            var strUser = e.options[e.selectedIndex].value;
            subjectsS.remove(strUser);
            remveSubjectS(strUser);
            addOption(document.myForm.Elective2S, "Select One", "Select One");
            for (var i = 0; i < subjectsS.length; ++i) {
                addOption(document.myForm.Elective2S, subjectsS[i], subjectsS[i]);
            }
            //addMILS("select");
            selectedValueS[0] = document.getElementById("Elective1S").value;
            if ((selectedValueS[0] == "MIL") && MILGeneratedS !=2)
            {MILGeneratedS = 1;}
            getMILValueS();
        }

        //Generate Elective 3 Subject LIst
        function addOption_listS_elective3S() {
            removeOptions(document.getElementById("Elective3S"));
            subjectsS = new Array("Chemistry", "Physics", "Biology", "Mathemathics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology",
                   "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };
            }
            var e = document.getElementById("Elective2S");
            var strUser = e.options[e.selectedIndex].value;
            subjectsS.remove(strUser);
            var e1 = document.getElementById("Elective1S");
            var strUser1 = e1.options[e1.selectedIndex].value;
            subjectsS.remove(strUser1);
            remveSubjectS(strUser);
            remveSubjectS(strUser1);
            addOption(document.myForm.Elective3S, "Select One", "Select One");
            for (var i = 0; i < subjectsS.length; ++i) {
                addOption(document.myForm.Elective3S, subjectsS[i], subjectsS[i]);
            }
            selectedValueS[1] = document.getElementById("Elective2S").value;
            if ((selectedValueS[1] == "MIL") && MILGeneratedS != 2)
            { MILGeneratedS = 1; }
            getMILValueS();
        }

        //Generate Elective 4 Subject LIst
        function addOption_listS_elective4S() {
            //using the function:
            removeOptions(document.getElementById("Elective4S"));
            subjectsS = new Array("Chemistry", "Physics", "Biology", "Mathemathics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology",
                   "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };
            }
            var e2 = document.getElementById("Elective3S");
            var strUser2 = e2.options[e2.selectedIndex].value;
            subjectsS.remove(strUser2);
            var e = document.getElementById("Elective2S");
            var strUser = e.options[e.selectedIndex].value;
            subjectsS.remove(strUser);
            var e1 = document.getElementById("Elective1S");
            var strUser1 = e1.options[e1.selectedIndex].value;
            subjectsS.remove(strUser1);
            subjectsS.remove(strUser2);
            remveSubjectS(strUser);
            remveSubjectS(strUser1);
            remveSubjectS(strUser2);
            addOption(document.myForm.Elective4S, "Select One", "Select One");
            for (var i = 0; i < subjectsS.length; ++i) {
                addOption(document.myForm.Elective4S, subjectsS[i], subjectsS[i]);
            }
            selectedValueS[2] = document.getElementById("Elective3S").value;
            if ((selectedValueS[2] == "MIL") && MILGeneratedS != 2)
            { MILGeneratedS = 1; }
            getMILValueS();
        }
        //Delete Control
        function AddRemoveMILS() {
            if (MILGeneratedS == 2) {
                addMILS("select");
            }
            else if (MILGeneratedS == 3) {
                if (document.getElementById('MIL')) {
                    document.getElementById("MILContainerS").removeChild(MIL.parentNode);
                    addMILS("select");
                }
            }
            else
            {
                if (document.getElementById('MIL')) {
                    document.getElementById("MILContainerS").removeChild(MIL.parentNode);
                }
            }
            }
//Create MIL subjectsA and DropDownlist
        function addMILS(type) {
            var select = document.createElement("select");
            select.setAttribute("id", "MIL");
            select.setAttribute("name", "nbse_electiveFive");
            var div = document.createElement('div');
            div.setAttribute("id", "divMIL");
            div.innerHTML = "Select an MIL";
            document.getElementById("MILContainerS").appendChild(div);
            div.appendChild(select);

            addOption(document.myForm.MIL, "Select One", "Select One");
            for (var i = 0; i < subjectsMILS.length; ++i) {
                addOption(document.myForm.MIL, subjectsMILS[i], subjectsMILS[i]);
            }
        }
  function checkMIL4S()
        {
            selectedValueS[3] = document.getElementById("Elective4S").value;
            if ((selectedValueS[3] == "MIL") && MILGeneratedS != 2)
            { MILGeneratedS = 1; }
            getMILValueS();
            checkMILS();
        }
        //Check MIL
        function checkMILS() {
            if (MILGeneratedS == 1) {
                for (i = 0; i <= selectedValueS.length; ++i) {
                    if (selectedValueS[i] == "MIL") {
                        MILGeneratedS = 2;
                        AddRemoveMILS();
                        break;
                    }
                    else {
                        MILGeneratedS = 0;
                        AddRemoveMILS();
                    }
                }

            }
            else if (MILGeneratedS == 2) {
                for (i = 0; i <= selectedValueS.length; ++i) {
                    if (selectedValueS[i] == "MIL") {
                        MILGeneratedS = 2;
                        AddRemoveMILS();
                        break;
                    }
                    else {
                        MILGeneratedS =99;
                        AddRemoveMILS();
                    }
                }
            }
        }