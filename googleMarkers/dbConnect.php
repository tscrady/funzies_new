<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


        // Make Connection ------------------------------------------------- 
        $servername = "143.95.42.35";
        $username = "tylercra_tscrady";
        $password = "asteios2";
        $dbname = "tylercra_geolocatetesting";

        try{
            $conn = new PDO('mysql:host=143.95.42.35;dbname='.$dbname, $username, $password);
        }
        catch(PDOException $e){
            echo 'Connection failed. PDO says -->'. $e->getMessage();
        }

        // Make Connection ------------------------------------------------- 