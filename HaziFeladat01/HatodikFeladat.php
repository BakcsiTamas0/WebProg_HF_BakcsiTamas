<!Doctype html>
<html>
    <head>
        <title>Hatodik Feladat</title>
    </head>
    <body>
        <main>
            <form action="" method="POST">
                <input id="text1" type="text" name="text1">
                <button id="btn" type="submit">Submit</button>
            </form>
            <p id="result"></p>
        </main>
        <?php
            function calc_month($test1){
                if (in_array($test1, ["January", "February", "March"])){
                    return 1;
                } elseif (in_array($test1, ["April", "May", "June"])){
                    return 2;
                } elseif (in_array($test1, ["July", "August", "September"])){
                    return 3;
                } elseif (in_array($test1, ["October", "November", "December"])){
                    return 4;
                }
            }

            $text1 = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $text1 = $_POST["text1"];

                $result = calc_month($text1);

                switch($result){
                    case 1: $text1 = "Winter"; break;
                    case 2: $text1 = "Spring"; break;
                    case 3: $text1 = "Summer"; break;
                    case 4: $text1 = "Autumn"; break;}
        }

        echo '<script>
                document.getElementById("result").textContent = "Result: ' . $text1 . '"
            </script>';

        ?>
    </body>
</html>