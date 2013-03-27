<!doctype html>
<html>

<head>

    <title>Footer onderaan</title>
    <style>
    
	html, body {
	   
		margin: 0;
		padding: 0;
		height: 100%;
        
	}
    
    #container {
        
        min-height: 100%;
        position: relative;
        
    }
    
    #content {
        
        padding-bottom: 150px;
        /* padding-bottom moet even hoog zijn als de footer */
        
    }
    
    #bottom {
        
        position: absolute;
        bottom: 0;
        background: black;
        width: 100%;
        height: 150px;
        
    }
    
    </style>
    
</head>
<body>

    <div id="container">
    
        <div id="content">
        
            Blablablagertisgayblablabla
        
        </div>
        
        <div id="bottom">
        
            Blablablafooterblablabla
        
        </div>
    
    </div>

</body>

</html>