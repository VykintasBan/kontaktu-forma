<?php
/**
 * 
 * Template Name: Kontaktai PHP
 * 
 * 
 * @package hello-elementor
 * @licence GPLv2
 */

    $messageSent = false;
    
    if(isset($_POST['pastas']) && $_POST['pastas'] != '') {
        //tikrinama ar el pastas nera tuscias
        if(filter_var($_POST['pastas'], FILTER_VALIDATE_EMAIL)) {
            //tikrinama ar el pastas yra validus
            //forma issiunciama
            $userName = $_POST['vardas'];
            $userEmail = $_POST['pastas'];
            $messageSubject = $_POST['tema'];
            $message = $_POST['zinute'];
            //$_FILES= $_POST['failas'];
        
            $to = "interjeras@rsdesign.lt";
            $body = "";
        
            $body .="Laiskas nuo ".$userName. "\r\n";
            $body .="El. pastas: ".$userEmail. "\r\n";
            $body .="Tema ".$messageSubject. "\r\n";
            $body .="Laiskas ".$message. "\r\n";
        
            mail($to, $messageSubject, $body);

            $messageSent = true;
        }
    }
    
get_header();

?>


<html lang="en">

<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        h1 {text-align: center; color:#B1A2A2; font-size: 55px;}
        <!--p {text-align: center;}-->
        <!--div {text-align: center;}-->
        body {
            font-family: 'Montserrat';font-size: 22px;
        }
        h1.light {
            font-weight: lighter;
        }
    </style>
    <h1 class="light">KONTAKTAI</h1>
    <div class="d1">Veiklą vykdome Vilniuje ir miesto apskrityje. Jeigu turite klausimų dėl paslaugų, norite patarimų ar konsultacijos, užpildykite formą ir mes su jumis susisieksime,         arba naudokitės žėmiau pateiktais kontaktais.</div>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="formos-stilius.css" media="all">

</head>

<body>
    <?php
    if($messageSent):
    ?>
    
        <h3>Jūsų laiškas išsiųstas. Greitu metu su jumis susisieksime</h3>

    <?php
    else:
    ?>

    <div class="container">
        <form action="" method="POST" class="form">
            <div class="form-group">
                <label for="vardas" class="form-label">Jūsų vardas</label>
                <input type="text" class="form-control" id="name" name="vardas" placeholder="Vardenis Pavardenis" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="pastas" class="form-label">Jūsų el. paštas</label>
                <input type="email" class="form-control" id="email" name="pastas" placeholder="vardenis@pastas.lt" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="tema" class="form-label">Tema</label>
                <input type="text" class="form-control" id="subject" name="tema" placeholder="Užsakymas nr. 1" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="zinute" class="form-label">Jūsų žinutė</label>
                <textarea rows="6" cols="30" id="message" name="zinute" placeholder="Savo laišką rašykite čia" tabindex="4"></textarea>
            </div>
            <!--<div class="form-group">
                <label for="failas" class="form-label">Prisekite reikalingą dokumentą</label>
                <form action="/action_page.php">
                    <input type="file" id="failas" name="file_pav" tabindex="5">
                </form>
            </div>-->

            <div>
                <button type="submit" class="btn">Siųsti laišką</button>
            </div>

        </form>

    </div>
    <?php
    endif;
    ?>
</body>

</html>
<?php get_footer(); ?>