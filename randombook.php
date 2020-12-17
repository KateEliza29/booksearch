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



            <?php 
                //Establish database connection.
                $link = mysqli_connect("shareddb-z.hosting.stackcp.net", "bookSearch-313635128b", "u953gkcocp", "bookSearch-313635128b");

                //Get length of db. 
                $query1 = "SELECT COUNT(`Title`) AS total FROM `bookInfo` ";
                $result1 = mysqli_query($link, $query1); 
                $row1 = mysqli_fetch_object($result1); 
                $dbLength = $row1->total;

                //Establish variables. 
                $randNum = rand(1, $dbLength);

                //Send query to db.
                $query2 = "SELECT * from `bookInfo` WHERE `id` = ".$randNum;
                $result2 = mysqli_query($link, $query2);
                
                //Display the results.
                while($row2 = mysqli_fetch_array($result2)) {
                    echo "<details>
                            <summary id=".$row2["id"].">".$row2["Title"]." - ".$row2["Author"]."</summary> 
                            <div class='container'>
                                <a href='' target='_blank'><img class='cover' src=''></a>
                                <div class='info'>
                                    <p><strong>Title: </strong>".$row2["Title"]."</p>
                                    <p><strong>Author: </strong>".$row2["Author"]."</p>
                                    <p><strong>Illustrator: </strong>".$row2["Illustrator"]."</p>
                                    <p><strong>For Children Over: </strong>".$row2["AgeLower"]."</p>    
                                    <p><strong>Categories: </strong>".$row2["Categories"]."</p>
                                    <p><strong>Published In: </strong>".$row2["Published"]."</p>
                                    <p><strong>Rating: </strong>".$row2["Rating"]."</p>
                                    <p><strong>Page Count: </strong></p><div class='pages'></div>
                                    <p><strong>ISBN: </strong></p><div class='isbn'>".$row2["ISBN"]."</div>
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