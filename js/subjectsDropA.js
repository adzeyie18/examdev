//Function to Create Additional and Duplicate Subjects
        var userA;
        var selectedValueA = [];
        var MILGeneratedA = 0;
        function remveSubjectA(userA) {
            if (userA == "Alt English") {
                userA = "MIL";
                subjectsA.remove(userA);
            }
            else if (userA == "MIL") {
                userA = "Alt English";
                subjectsA.remove(userA);
            }
            else if (userA == "Computer Science") {
                userA = "Informatics Practices";
                subjectsA.remove(userA);
            }
            else if (userA == "Informatics Practices") {
                userA = "Computer Science";
                subjectsA.remove(userA);
            }
            else if (userA == "Education") {
                userA = "Psychology";
                subjectsA.remove(userA);
            }
            else if (userA == "Psychology") {
                userA = "Education";
                subjectsA.remove(userA);
            }
        }

        //Array that holds all subjectsA available
        var subjectsA = new Array("History", "Political Science", "Economics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology", "Geography", "Education", "Music", "Computer Science", "Informatics Practices");

        var subjectsMILA = new Array("AO", "Hindi", "Bengali", "Lotha", "Sumi", "Tenyide");

        //Function to add an option to Select Control
        function addOption(selectbox, text, value) {
            var optn = document.createElement("OPTION");
            optn.text = text;
            optn.value = value;
            selectbox.options.add(optn);
        }

        //Function to Add Options Dynamically from array
        function addOption_listA() {

            for (var i = 0; i < subjectsA.length; ++i) {

                addOption(document.myForm.Elective1A, subjectsA[i], subjectsA[i]);
            }
        }

        //Function to remove options already Selected
        function removeOptions(selectbox) {
            var i;
            for (i = selectbox.options.length - 1; i >= 0; i--) {
                selectbox.remove(i);
            }
        }
        function getMILValueA() {
            div = document.getElementById('MILValueA');
            div.innerHTML = MILGeneratedA;
            var div1 = document.getElementById('E1A');
            div1.innerHTML = selectedValueA[0];
            var div2 = document.getElementById('E2A');
            div2.innerHTML = selectedValueA[1];
            var div3 = document.getElementById('E3A');
            div3.innerHTML = selectedValueA[2];
            var div4 = document.getElementById('E4A');
            div4.innerHTML = selectedValueA[3];
        }

        //Generate Elective 2 Subject LIst
        function addOption_listA_elective2A() {
            //using the function:
            removeOptions(document.getElementById("Elective2A"));
            subjectsA = new Array("History", "Political Science", "Economics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology", "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };
            }
            var e = document.getElementById("Elective1A");
            var strUser = e.options[e.selectedIndex].value;
            subjectsA.remove(strUser);
            remveSubjectA(strUser);
            addOption(document.myForm.Elective2A, "Select One", "Select One");
            for (var i = 0; i < subjectsA.length; ++i) {
                addOption(document.myForm.Elective2A, subjectsA[i], subjectsA[i]);
            }
            //addMILA("select");
            selectedValueA[0] = document.getElementById("Elective1A").value;
            if ((selectedValueA[0] == "MIL") && MILGeneratedA !=2)
            {MILGeneratedA = 1;}
            getMILValueA();

        }

        //Generate Elective 3 Subject LIst
        function addOption_listA_elective3A() {
            removeOptions(document.getElementById("Elective3A"));
            subjectsA = new Array("History", "Political Science", "Economics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology", "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };
            }
            var e = document.getElementById("Elective2A");
            var strUser = e.options[e.selectedIndex].value;
            subjectsA.remove(strUser);
            var e1 = document.getElementById("Elective1A");
            var strUser1 = e1.options[e1.selectedIndex].value;
            subjectsA.remove(strUser1);
            remveSubjectA(strUser);
            remveSubjectA(strUser1);
            addOption(document.myForm.Elective3A, "Select One", "Select One");
            for (var i = 0; i < subjectsA.length; ++i) {
                addOption(document.myForm.Elective3A, subjectsA[i], subjectsA[i]);
            }
            selectedValueA[1] = document.getElementById("Elective2A").value;
            if ((selectedValueA[1] == "MIL") && MILGeneratedA != 2)
            { MILGeneratedA = 1; }
            getMILValueA();
        }

        //Generate Elective 4 Subject LIst
        function addOption_listA_elective4A() {
            //using the function:
            removeOptions(document.getElementById("Elective4A"));
            subjectsA = new Array("History", "Political Science", "Economics", "MIL", "Alt English", "Psychology", "Philosophy", "Sociology", "Geography", "Education", "Music", "Computer Science", "Informatics Practices");
            Array.prototype.remove = function (value) {
                if (this.indexOf(value) !== -1) {
                    this.splice(this.indexOf(value), 1);
                    return true;
                } else {
                    return false;
                };

            }
            var e2 = document.getElementById("Elective3A");
            var strUser2 = e2.options[e2.selectedIndex].value;
            subjectsA.remove(strUser2);
            var e = document.getElementById("Elective2A");
            var strUser = e.options[e.selectedIndex].value;
            subjectsA.remove(strUser);
            var e1 = document.getElementById("Elective1A");
            var strUser1 = e1.options[e1.selectedIndex].value;
            subjectsA.remove(strUser1);
            subjectsA.remove(strUser2);
            remveSubjectA(strUser);
            remveSubjectA(strUser1);
            remveSubjectA(strUser2);
            addOption(document.myForm.Elective4A, "Select One", "Select One");
            for (var i = 0; i < subjectsA.length; ++i) {
                addOption(document.myForm.Elective4A, subjectsA[i], subjectsA[i]);
            }
            selectedValueA[2] = document.getElementById("Elective3A").value;
            if ((selectedValueA[2] == "MIL") && MILGeneratedA != 2)
            { MILGeneratedA = 1; }
            getMILValueA();

        }
        //Delete Control
        function AddRemoveMILA() {
            if (MILGeneratedA == 2) 
            {
                addMILA("select");
            }
            else if (MILGeneratedA == 3) {
                if (document.getElementById('MIL')) {
                    document.getElementById("MILContainerA").removeChild(MIL.parentNode);
                    addMILA("select");
                }
            }
            else
            {
                if (document.getElementById('MIL')) {
                    document.getElementById("MILContainerA").removeChild(MIL.parentNode);
                }
            }
            }
//Create MIL subjectsA and DropDownlist
        function addMILA(type) {
            var select = document.createElement("select");
            select.setAttribute("id", "MIL");
			select.setAttribute("name", "nbse_electiveFive");
            select.setAttribute("class","form-control");
            var div = document.createElement('div');
            div.setAttribute("id", "divMIL");
            //div.innerHTML = "Select an MIL";
            document.getElementById("MILContainerA").appendChild(div);
            div.appendChild(select);
            addOption(document.myForm.MIL, "Select MIL", "");
            for (var i = 0; i < subjectsMILA.length; ++i) {
                addOption(document.myForm.MIL, subjectsMILA[i], subjectsMILA[i]);
            }
        }
		function checkMIL4A()
        {
            selectedValueA[3] = document.getElementById("Elective4A").value;
            if ((selectedValueA[3] == "MIL") && MILGeneratedA != 2)
            { MILGeneratedA = 1; }
            getMILValueA();
            checkMILA();
        }
        //Check MIL
        function checkMILA() {
            if (MILGeneratedA == 1) {
                for (i = 0; i <= selectedValueA.length; ++i) {
                    if (selectedValueA[i] == "MIL") {
                        MILGeneratedA = 2;
                        AddRemoveMILA();
                        break;
                    }
                    else {
                        MILGeneratedA = 0;
                        AddRemoveMILA();
                    }
                }

            }
            else if (MILGeneratedA == 2) {
                for (i = 0; i <= selectedValueA.length; ++i) {
                    if (selectedValueA[i] == "MIL") 
                    {
                        MILGeneratedA = 2;
                        AddRemoveMILA();
                        break;
                    }
                    else {
                        MILGeneratedA =99;
                        AddRemoveMILA();
                    }
                }
            }
        }