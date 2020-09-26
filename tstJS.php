<html>  
<head>  
<link rel="icon" type="image/png" href="/ico/sd.png">
<title>
	Столовая online
</title>
<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8">  
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>  
  
<body>  
    <div id="cl-common"></div>  
       
    <script>  
        function show()   
        {   
            $.ajax({   
                url: "tst.php",   
                cache: false,   
                success: function(html){   
                    $("#cl-common").html(html);   
                }   
            });   
        }   
       
        $(document).ready(function(){   
            show();   
           setInterval('show()',1000);   
        });   
    </script> 
      
</body>  
</html>
