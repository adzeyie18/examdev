        //Function to Create Additional and Duplicate Subjects
        var userC;
        var selectedValueC = [];
        var MILGeneratedC = 0;
        function remveSubjectC(userC) {
            if (userC == "Alt English") {
                userC = "MIL";
                subjects.remove(userC);
            }
            else if (userC == "MIL") {
                userC = "Alt English";
                subjects.remove(userC);
            }
            else if (userC == "Computer Science") {
                userC = "Informatics Practices";
                subjects.remove(userC);
            }
            else if (userC == "Informatics Practices") {
                userC = "Computer Science";
                subjects.remove(userC);
            }
            else if (userC == "Education") {
                userC = "Psychology";
                subjects.remove(userC);
            }
            else if (userC == "Psychology") {
                userC = "Education";
                subjects.remove(userC);
            }
        }

        //Array that holds all subjects available
        var subjects = new Array("Accountancy", "Finance", "Economics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology",
                   "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
        var subjectsMILC = new Array("AO", "Hindi", "Bengali", "Lotha", "Sumi", "Tenyide");

        //Function to add an option to Select Control
        function addOption(selectbox, text, value) {
            var optn = document.createElement("OPTION");
            optn.text = text;
            optn.value = value;
            selectbox.options.add(optn);
        }

        //Function to Add Options Dynamically from array
        function addOption_listC() {

            for (var i = 0; i < subjects.length; ++i) {

                addOption(document.myForm.Elective1C, subjects[i], subjects[i]);
            }
        }

        //Function to remove options already Selected
        function removeOptions(selectbox) {
            var i;
            for (i = selectbox.options.length - 1; i >= 0; i--) {
                selectbox.remove(i);
            }
        }
        function getMILValueC() {
            div = document.getElementById('MILValueC');
            div.innerHTML = MILGeneratedC;
            var div1 = document.getElementById('E1C');
            div1.innerHTML = selectedValueC[0];
            var div2 = document.getElementById('E2C');
            div2.innerHTML = selectedValueC[1];
            var div3 = document.getElementById('E3C');
            div3.innerHTML = selectedValueC[2];
            var div4 = document.getElementById('E4C');
            div4.innerHTML = selectedValueC[3];
        }
        //Generate Elective 2 Subject LIst
        function addOption_listC_elective2C() {
            //using the function:
            removeOptions(document.getElementById("Elective2C"));
            subjects = new Array("Accountancy", "Finance", "Economics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology",
                   "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };
            }
            var e = document.getElementById("Elective1C");
            var strUser = e.options[e.selectedIndex].value;
            subjects.remove(strUser);
            remveSubjectC(strUser);
            addOption(document.myForm.Elective2C, "Select One", "Select One");
            for (var i = 0; i < subjects.length; ++i) {
                addOption(document.myForm.Elective2C, subjects[i], subjects[i]);
            }
            //addMILC("select");
            selectedValueC[0] = document.getElementById("Elective1C").value;
            if ((selectedValueC[0] == "MIL") && MILGeneratedC !=2)
            {MILGeneratedC = 1;}
            getMILValueC();
        }

        //Generate Elective 3 Subject LIst
        function addOption_listC_elective3C() {
            removeOptions(document.getElementById("Elective3C"));
            subjects = new Array("Accountancy", "Finance", "Economics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology",
                   "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };
            }
            var e = document.getElementById("Elective2C");
            var strUser = e.options[e.selectedIndex].value;
            subjects.remove(strUser);
            var e1 = document.getElementById("Elective1C");
            var strUser1 = e1.options[e1.selectedIndex].value;
            subjects.remove(strUser1);
            remveSubjectC(strUser);
            remveSubjectC(strUser1);
            addOption(document.myForm.Elective3C, "Select One", "Select One");
            for (var i = 0; i < subjects.length; ++i) {
                addOption(document.myForm.Elective3C, subjects[i], subjects[i]);
            }
            selectedValueC[1] = document.getElementById("Elective2C").value;
            if ((selectedValueC[1] == "MIL") && MILGeneratedC != 2)
            { MILGeneratedC = 1; }
            getMILValueC();
        }

        //Generate Elective 4 Subject LIst
        function addOption_listC_elective4C() {
            //using the function:
            removeOptions(document.getElementById("Elective4C"));
            subjects = new Array("Accountancy", "Finance", "Economics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology",
                   "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };
            }
            var e2 = document.getElementById("Elective3C");
            var strUser2 = e2.options[e2.selectedIndex].value;
            subjects.remove(strUser2);
            var e = document.getElementById("Elective2C");
            var strUser = e.options[e.selectedIndex].value;
            subjects.remove(strUser);
            var e1 = document.getElementById("Elective1C");
            var strUser1 = e1.options[e1.selectedIndex].value;
            subjects.remove(strUser1);
            subjects.remove(strUser2);
            remveSubjectC(strUser);
            remveSubjectC(strUser1);
            remveSubjectC(strUser2);
            addOption(document.myForm.Elective4C, "Select One", "Select One");
            for (var i = 0; i < subjects.length; ++i) {
                addOption(document.myForm.Elective4C, subjects[i], subjects[i]);
            }
            selectedValueC[2] = document.getElementById("Elective3C").value;
            if ((selectedValueC[2] == "MIL") && MILGeneratedC != 2)
            { MILGeneratedC = 1; }
            getMILValueC();
        }

//Delete Control
        function AddRemoveMILC() {
            if (MILGeneratedC == 2) {
                addMILC("select");
            }
            else if (MILGeneratedC == 3) {
                if (document.getElementById('MIL')) {
                    document.getElementById("MILContainerC").removeChild(MIL.parentNode);
                    addMILC("select");
                }
            }
            else
            {
                if (document.getElementById('MIL')) {
                    document.getElementById("MILContainerC").removeChild(MIL.parentNode);
                }
            }
            }
//Create MIL subjectsA and DropDownlist
        function addMILC(type) {
            var select = document.createElement("select");
            select.setAttribute("id", "MIL");
            select.setAttribute("name", "nbse_electiveFive");
            var div = document.createElement('div');
            div.setAttribute("id", "divMIL");
            div.innerHTML = "Select an MIL";
            document.getElementById("MILContainerC").appendChild(div);
            div.appendChild(select);

            addOption(document.myForm.MIL, "Select One", "Select One");
            for (var i = 0; i < subjectsMILC.length; ++i) {
                addOption(document.myForm.MIL, subjectsMILC[i], subjectsMILC[i]);
            }
        }
  function checkMIL4C()
        {
            selectedValueC[3] = document.getElementById("Elective4C").value;
            if ((selectedValueC[3] == "MIL") && MILGeneratedC != 2)
            { MILGeneratedC = 1; }
            getMILValueC();
            checkMILC();
        }
        //Check MIL
        function checkMILC() {
            if (MILGeneratedC == 1) {
                for (i = 0; i <= selectedValueC.length; ++i) {
                    if (selectedValueC[i] == "MIL") {
                        MILGeneratedC = 2;
                        AddRemoveMILC();
                        break;
                    }
                    else {
                        MILGeneratedC = 0;
                        AddRemoveMILC();
                    }
                }

            }
            else if (MILGeneratedC == 2) {
                for (i = 0; i <= selectedValueC.length; ++i) {
                    if (selectedValueC[i] == "MIL") {
                        MILGeneratedC = 2;
                        AddRemoveMILC();
                        break;
                    }
                    else {
                        MILGeneratedC =99;
                        AddRemoveMILC();
                    }
                }
            }
        }