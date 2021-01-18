<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booksearch.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Langar&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="icon" href="images/thymeLogo.png">
    <title>Which Book?</title>
</head>
<body>
    
        <main>
            <header>
                <h1>Which<br><span>Book?</span></h1>
                <br>
                <hr>
            </header>


            <?php //print_r($_POST);
            
                //Establish database connection.
                $link = mysqli_connect("", "", "", "");
                
                //Set up variables.
                $topic = $_POST["topic"];
                $lowerAge = $_POST["lowerAge"];
                $published = $_POST["published"];
                
                switch($published) {
                    case "bef2000":
                        $lowerDate = 0; 
                        $upperDate = 1999;
                        break;
                    case "aft2000":
                        $lowerDate = 2000; 
                        $upperDate = 2090;
                        break;
                    default:
                        $lowerDate = 0;
                        $upperDate = 2090;
                        break;
                }
            
                    
                //Set up and submit the query.
                $query = "SELECT * from `bookInfo` WHERE `Categories` LIKE '%".$topic."%' AND `AgeLower` >= ".$lowerAge." AND `Published` >= ".$lowerDate." AND `Published` <= ".$upperDate;
                $result = mysqli_query($link, $query);
            
            
                //Display the results.    
                while($row = mysqli_fetch_array($result)) {
                    echo "<details>
                            <summary id=".$row["id"].">".$row["Title"]." - ".$row["Author"]."</summary> 
                            <div class='container'>
                                <a href='' target='_blank'><img class='cover' src=''></a>
                                <div class='info'>
                                    <p><strong>Title: </strong>".$row["Title"]."</p>
                                    <p><strong>Author: </strong>".$row["Author"]."</p>
                                    <p><strong>Illustrator: </strong>".$row["Illustrator"]."</p>
                                    <p><strong>For Children Over: </strong>".$row["AgeLower"]."</p>    
                                    <p><strong>Categories: </strong>".$row["Categories"]."</p>
                                    <p><strong>Published In: </strong>".$row["Published"]."</p>
                                    <p><strong>Rating: </strong>".$row["Rating"]."</p>
                                    <p><strong>Page Count: </strong></p><div class='pages'></div>
                                    <p><strong>ISBN: </strong></p><div class='isbn'>".$row["ISBN"]."</div>
                                </div>
                                <div class='desc'></div>
                            </div>
                        </details>";
                }
                
            ?>

        </main>
        <footer>
            <div>Back to <a href="http://www.thymeforphonics.co.uk">Thyme For Phonics</a></div><img src="images/thymeLogo.png" alt="Thyme for Phonics Logo">
        </footer>
        
    <script src="api.js"></script>    
        
</body>
</html>
