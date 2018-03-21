<?php 
    include("../regexps.php");
    include("../utils.php");
    if(count($_POST)>0){
        if(!isset($_POST["credential"]["gender"]) || !test($GENDER, $_POST["credential"]["gender"])){
            $_POST["credential"]["gender"] = null;
        }
        if(!isset($_POST["credential"]["schooling"]) || !test($SCHOOLING, $_POST["credential"]["schooling"])){
            $_POST["credential"]["schooling"] = null;
        }
    }

    
    if(count($_POST)>0
        // Visitante
        && (test($NAME, $_POST["credential"]["name"]))
        && (test($NAME, $_POST["credential"]["paternal"]))
        && (test($NAME, $_POST["credential"]["maternal"] ))
        && (test($DATE, $_POST["credential"]["birth"] ))
        && (test($GENDER, $_POST["credential"]["gender"] ))
        && (test($SCHOOLING, $_POST["credential"]["schooling"] ))
        // Credencial
        && ((getimagesize($_FILES["fileToUpload"]["tmp_name"]) != FALSE))
        && (($_POST["credential"]["email"]  !== null) /*|| test($EMAIL, $_POST["credential"]["email"] )*/)
        && (test($NAME, $_POST["credential"]["street"] ))
        && (test($HOUSENUM, $_POST["credential"]["number"] ))
        && (test($NAME, $_POST["credential"]["neighborhood"] ))
        && (test($NUMBER, $_POST["credential"]["postalCode"] ))
        && (test($NUMBER, $_POST["credential"]["phone"] ))
        && (test($NAME, $_POST["credential"]["workName"] ))
        && (test($NUMBER, $_POST["credential"]["workPhone"] ))
        && (test($NAME, $_POST["credential"]["workStreet"] ))
        && (test($HOUSENUM, $_POST["credential"]["workNumber"] ))
        && (test($NAME, $_POST["credential"]["workNeighborhood"] ))
        && (test($NUMBER, $_POST["credential"]["workPostalCode"] ))
        // Fiador
        && (test($NAME, $_POST["credential"]["nameF"]))
        && (test($NAME, $_POST["credential"]["paternalF"]))
        && (test($NAME, $_POST["credential"]["maternalF"] ))
        && (($_POST["credential"]["emailF"]  != null) /*|| test($EMAIL, $_POST["credential"]["emailF"] )*/)
        && (test($NUMBER, $_POST["credential"]["phoneF"] ))
        && (test($SCHOOLING, $_POST["credential"]["schoolingF"] ))
        && (test($NAME, $_POST["credential"]["streetF"] ))
        && (test($HOUSENUM, $_POST["credential"]["numberF"] ))
        && (test($NAME, $_POST["credential"]["neighborhoodF"] ))
        && (test($NUMBER, $_POST["credential"]["postalCodeF"] ))
        && (test($NAME, $_POST["credential"]["workNameF"] ))
        && (test($NUMBER, $_POST["credential"]["workPhoneF"] ))
        && (test($NAME, $_POST["credential"]["workStreetF"] ))
        && (test($HOUSENUM, $_POST["credential"]["workNumberF"] ))
        && (test($NAME, $_POST["credential"]["workNeighborhoodF"] ))
        && (test($NUMBER, $_POST["credential"]["workPostalCodeF"] ))
    ){
        exit("entro");
        $nulls = 0;
        foreach($_POST["credential"] as $key => $value){
            if($value != null)
                $info[$key] = htmlspecialchars($value);
            else{
                $info[$key] = "";
                $nulls++;
            }
        }
        if($_FILES["fileToUpload"]["tmp_name"] != null){
            exit("entro");
            $info["fileToUpload"] = $_FILES["fileToUpload"]["tmp_name"];
        }else{
            $info["fileToUpload"] = "";
            $nulls++;
        }
        if(isset($info)) {
            if($nulls == 0){
                exit("entro");
                insertCredential(
                    // Visitante
                    $info["name"],
                    $info["paternal"],
                    $info["maternal"],
                    $info["birth"],
                    $info["schooling"],
                    $info["gender"],
                    // Credencial
                    $info["fileToUpload"],
                    $info["neighborhood"],
                    $info["street"],
                    $info["number"],
                    $info["postalCode"],
                    $info["phone"],
                    $info["email"],
                    $info["workName"],
                    $info["workPhone"],
                    $info["workNeighborhood"],
                    $info["workStreet"],
                    $info["workNumber"],
                    $info["workPostalCode"],
                    //Fiador
                    $info["nameF"],
                    $info["paternalF"],
                    $info["maternalF"],
                    $info["emailF"],
                    $info["phoneF"],
                    $info["streetF"],
                    $info["numberF"],
                    $info["neighborhoodF"],
                    $info["postalCodeF"],
                    $info["workNameF"],
                    $info["workPhoneF"],
                    $info["workStreetF"],
                    $info["workNumberF"],
                    $info["workNeighborhoodF"],
                    $info["workPostalCodeF"],
                    $info["schoolingF"]
                );
            }
        }
    }else{
        exit("no entro");
    }

    //header("Location: ../credential.php");
    ?>
