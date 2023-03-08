<?php
    include 'dbh.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        //jQuery code goes here
        $(document).ready(function() {
            var commentCount = 2;
            $("button").click(function() {
                commentCount = commentCount + 2;
                $("#comments").load("load-comments.php",  {
                 commentNewCount: commentCount    
                });
            });
        });
    </script>

</head>
<body>

<div id="comments">
    <?php
        
        $sql = "SELECT * FROM comments LIMIT 2";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>";
                echo $row['author'];
                echo "<p>";
                echo $row['message'];
                echo "<p>";

            }
        } else {
            echo "There are no comments!"; 
        }
    ?>
</div>

<button>Show more comments</button>
    
</body>
</html>