<!DOCTYPE html>
<html lang="en">
<?php
session_start (); 
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
    <script>
        function validateForm() {
            var nom = document.forms["myForm"]["nom"].value;
            var prenom = document.forms["myForm"]["prenom"].value;
            var daten = document.forms["myForm"]["daten"].value;
            var img = document.forms["myForm"]["img"].value;
            
            var errorMessages = document.getElementsByClassName("error-message");
        while (errorMessages.length > 0) {
            errorMessages[0].parentNode.removeChild(errorMessages[0]);
        }



            if (nom == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ nom est obligatoire.";
            document.getElementsByName("nom")[0].parentNode.appendChild(errorMessage);
        }
        if (prenom == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ prénom est obligatoire.";
            document.getElementsByName("prenom")[0].parentNode.appendChild(errorMessage);
        }
        if (daten == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ date de naissance est obligatoire.";
            document.getElementsByName("daten")[0].parentNode.appendChild(errorMessage);
        }
        if (img == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ image est obligatoire.";
            document.getElementsByName("img")[0].parentNode.appendChild(errorMessage);
        }

        if (nom == "" || prenom == "" || daten == "" || img == "") {
            return false;
        }
    }
</script>

</head>
<body>
    <form method="POST" action="crudajout.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
        <table id="example1" class="table table-striped">
            <caption></caption>
            <tr>
                <td>nom</td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>prenom</td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>dateN</td>
                <td><input type="Date" name="daten"></td>
            </tr>
            <tr>
                <td>img</td>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="ajouter" class="btn btn-danger"></td>
            </tr>
        </table>
    </form>
</body>
</html>