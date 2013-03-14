<!doctype html>

<html>
<header>

    <title>Fixed sidebar</title>

</header>
<body style="margin: 0; padding: 0;">

    <div style="width: 100%; height: 100%">
    
        <div style="float: left; width: 50%; height: 100%; background: black;">
        
            <div style="width: 50%; height: 100%; background: black; position: fixed; color: white;">
            
                Test
            
            </div>
        
        </div>
        <div style="float: right; width: 50%; height: 10000px; background: gray;">
        
            <?php
            
            $i = 1;
            while ($i < 150) {
                
                echo "Test$i<br />";
                $i++;
                
            }
            
            ?>
        
        </div>
    
    </div>

</body>

</html>