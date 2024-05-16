<?php
    // Function to sanitize user input to prevent XSS attacks
    function sanitizeInput($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    function validateForm() {
    global $teilnahme, $vorname, $name, $firma, $email, $essenspraferenz, $mitteilung, $vorname2, $name2, $firma2, $email2, $essenspraferenz2;

    $errors = [];

    if (empty($_POST["teilnahme"])) {
        $errors["teilnahme"] = "Bitte wählen Sie mindestens eine Option aus";
    } else {
        $teilnahme = $_POST["teilnahme"];
    }

    if (empty($_POST["vorname"])) {
        $errors["vorname"] = "Vorname ist erforderlich";
    } else {
        $vorname = filter_var($_POST["vorname"], FILTER_SANITIZE_STRING);
        if (empty($vorname)) {
            $errors["vorname"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["name"])) {
        $errors["name"] = "Name ist erforderlich";
    } else {
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        if (empty($name)) {
            $errors["name"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["firma"])) {
        $errors["firma"] = "Firma ist erforderlich";
    } else {
        $firma = filter_var($_POST["firma"], FILTER_SANITIZE_STRING);
        if (empty($firma)) {
            $errors["firma"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["email"])) {
        $errors["email"] = "Email ist erforderlich";
    } else {
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $errors["email"] = "Diese Email Adresse ist nicht korrekt";
        }
    }

    if (isset($_POST["essenspraferenz"])) {
        $essenspraferenz = $_POST["essenspraferenz"];
    }

    if (!empty($_POST["mitteilung"])) {
        $mitteilung = htmlspecialchars($_POST["mitteilung"]);
    }

    // Zusätzliche Person 
    if ($teilnahme == 'Ja, ich nehme gerne teil und komme in Begleitung') {
        if (empty($_POST["vorname2"])) {
            $errors["vorname2"] = "Vorname ist erforderlich";
        } else {
            $vorname2 = filter_var($_POST["vorname2"], FILTER_SANITIZE_STRING);
            if (empty($vorname2)) {
                $errors["vorname2"] = "Es sind nur Buchstaben erlaubt";
            }
        }
    
        if (empty($_POST["name2"])) {
            $errors["name2"] = "Name ist erforderlich";
        } else {
            $name2 = filter_var($_POST["name2"], FILTER_SANITIZE_STRING);
            if (empty($name2)) {
                $errors["name2"] = "Es sind nur Buchstaben erlaubt";
            }
        }
    
        if (empty($_POST["firma2"])) {
            $errors["firma2"] = "Firma ist erforderlich";
        } else {
            $firma2 = filter_var($_POST["firma2"], FILTER_SANITIZE_STRING);
            if (empty($firma2)) {
                $errors["firma2"] = "Es sind nur Buchstaben erlaubt";
            }
        }
    
        if (empty($_POST["email2"])) {
            $errors["email2"] = "Email ist erforderlich";
        } else {
            $email2 = filter_var($_POST["email2"], FILTER_VALIDATE_EMAIL);
            if (!$email2) {
                $errors["email2"] = "Diese Email Adresse ist nicht korrekt";
            }
        }

        if (isset($_POST["essenspraferenz2"])) {
            $essenspraferenz2 = $_POST["essenspraferenz2"];
        }
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = validateForm();
    
    if (empty($errors)) {
        $message_body = "";
        unset($_POST["submit"]);
        foreach($_POST as $key => $value){
            if (is_array($value)) {
                $value = implode(", ", $value);
            }
            $message_body = "Anmeldung zur Veranstaltung\n\n";
            $message_body .= "Teilnahme: " . sanitizeInput($teilnahme) . "\n";
            $message_body .= "Vorname: " . sanitizeInput($vorname) . "\n";
            $message_body .= "Name: " . sanitizeInput($name) . "\n";
            $message_body .= "Firma: " . sanitizeInput($firma) . "\n";
            $message_body .= "Email: " . sanitizeInput($email) . "\n";
            if (isset($essenspraferenz)) {
                $message_body .= "Essenspräferenz: " . sanitizeInput($essenspraferenz) . "\n";
            }

            if ($teilnahme == 'Ja, ich nehme gerne teil und komme in Begleitung') {
                $message_body .= "\nWeitere Person:\n";
                $message_body .= "Vorname: " . sanitizeInput($vorname2) . "\n";
                $message_body .= "Name: " . sanitizeInput($name2) . "\n";
                $message_body .= "Firma: " . sanitizeInput($firma2) . "\n";
                $message_body .= "Email: " . sanitizeInput($email2) . "\n";
                if (isset($essenspraferenz2)) {
                    $message_body .= "Essenspräferenz: " . sanitizeInput($essenspraferenz2) . "\n";
                }
            }

            $message_body .= "Mitteilung: " . sanitizeInput($mitteilung) . "\n";            
        }
         
        $headers = "From: anmeldung@funk-gruppe-event.ch";
        $to = "info@funk-gruppe.ch";
        $subject = "Funk Gruppe Event | Zeitlos";
        $headers .= "\r\nContent-Type: text/plain; charset=utf-8\r\n";
            
        if (mail($to, $subject, $message_body, $headers)){
            $success = "";
            $teilnahme = $vorname = $name = $firma = $email = $essenspraferenz = $mitteilung = "";
        }
        } else {
            $teilnahme = isset($_POST["teilnahme"]) ? $_POST["teilnahme"] : "";
            $vorname = isset($_POST["vorname"]) ? $_POST["vorname"] : "";
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $firma = isset($_POST["firma"]) ? $_POST["firma"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $essenspraferenz = isset($_POST["essenspraferenz"]) ? $_POST["essenspraferenz"] : "";
            $mitteilung = isset($_POST["mitteilung"]) ? $_POST["mitteilung"] : "";
        }
}
?>
