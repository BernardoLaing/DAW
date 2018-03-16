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
        && (($_POST["credential"]["name"] == null) || test($NAME, $_POST["credential"]["name"]))
        && (($_POST["credential"]["paternal"] == null) || test($NAME, $_POST["credential"]["paternal"]))
        && (($_POST["credential"]["maternal"]  == null) || test($NAME, $_POST["credential"]["maternal"] ))
        && (($_POST["credential"]["birth"]  == null) || test($DATE, $_POST["credential"]["birth"] ))
        && (($_POST["credential"]["gender"]  == null) || test($GENDER, $_POST["credential"]["gender"] ))
        && (($_POST["credential"]["schooling"]  == null) || test($SCHOOLING, $_POST["credential"]["schooling"] ))
        // Credencial
        && (($_POST["credential"]["fileToUpload"]  == null) || test($EMAIL, $_POST["credential"]["fileToUpload"] ))
        && (($_POST["credential"]["email"]  == null) /*|| test($EMAIL, $_POST["credential"]["email"] )*/)
        && (($_POST["credential"]["street"]  == null) || test($NAME, $_POST["credential"]["street"] ))
        && (($_POST["credential"]["number"]  == null) || test($HOUSENUM, $_POST["credential"]["number"] ))
        && (($_POST["credential"]["neighborhood"]  == null) || test($NAME, $_POST["credential"]["neighborhood"] ))
        && (($_POST["credential"]["postalCode"]  == null) || test($NUMBER, $_POST["credential"]["postalCode"] ))
        && (($_POST["credential"]["phone"]  == null) || test($NUMBER, $_POST["credential"]["phone"] ))
        && (($_POST["credential"]["workName"]  == null) || test($NAME, $_POST["credential"]["workName"] ))
        && (($_POST["credential"]["workPhone"]  == null) || test($NUMBER, $_POST["credential"]["workPhone"] ))
        && (($_POST["credential"]["workStreet"]  == null) || test($NAME, $_POST["credential"]["workStreet"] ))
        && (($_POST["credential"]["workNumber"]  == null) || test($HOUSENUM, $_POST["credential"]["workNumber"] ))
        && (($_POST["credential"]["workNeighborhood"]  == null) || test($NAME, $_POST["credential"]["workNeighborhood"] ))
        && (($_POST["credential"]["workPostalCode"]  == null) || test($NUMBER, $_POST["credential"]["workPostalCode"] ))
        // Fiador
        && (($_POST["credential"]["nameF"] == null) || test($NAME, $_POST["credential"]["nameF"]))
        && (($_POST["credential"]["paternalF"] == null) || test($NAME, $_POST["credential"]["paternalF"]))
        && (($_POST["credential"]["maternalF"]  == null) || test($NAME, $_POST["credential"]["maternalF"] ))
        && (($_POST["credential"]["emailF"]  == null) /*|| test($EMAIL, $_POST["credential"]["emailF"] )*/)
        && (($_POST["credential"]["phoneF"]  == null) || test($NUMBER, $_POST["credential"]["phoneF"] ))
        && (($_POST["credential"]["schoolingF"]  == null) || test($SCHOOLING, $_POST["credential"]["schoolingF"] ))
        && (($_POST["credential"]["streetF"]  == null) || test($NAME, $_POST["credential"]["streetF"] ))
        && (($_POST["credential"]["numberF"]  == null) || test($HOUSENUM, $_POST["credential"]["numberF"] ))
        && (($_POST["credential"]["neighborhoodF"]  == null) || test($NAME, $_POST["credential"]["neighborhoodF"] ))
        && (($_POST["credential"]["postalCodeF"]  == null) || test($NUMBER, $_POST["credential"]["postalCodeF"] ))
        && (($_POST["credential"]["workNameF"]  == null) || test($NAME, $_POST["credential"]["workNameF"] ))
        && (($_POST["credential"]["workPhoneF"]  == null) || test($NUMBER, $_POST["credential"]["workPhoneF"] ))
        && (($_POST["credential"]["workStreetF"]  == null) || test($NAME, $_POST["credential"]["workStreetF"] ))
        && (($_POST["credential"]["workNumberF"]  == null) || test($HOUSENUM, $_POST["credential"]["workNumberF"] ))
        && (($_POST["credential"]["workNeighborhoodF"]  == null) || test($NAME, $_POST["credential"]["workNeighborhoodF"] ))
        && (($_POST["credential"]["workPostalCodeF"]  == null) || test($NUMBER, $_POST["credential"]["workPostalCodeF"] ))
    ){
        echo "Pasaste";
        $nulls = 0;
        foreach($_POST["credential"] as $key => $value){
            if($value != null)
                $info[$key] = htmlspecialchars($value);
            else{
                $info[$key] = "";
                $nulls++;
            }
        }
        if(isset($info)) {
            if($nulls == 0){
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
    }
    ?>
