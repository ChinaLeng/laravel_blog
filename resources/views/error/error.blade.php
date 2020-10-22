
<!doctype html>

<html lang="en">
   
   
    <head>
       
       
        <!-- META -->
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
       
        <!-- PAGE TITLE -->
        <title>迷路了~</title>
       
        <!-- FAVICON -->
        <link rel="shortcut icon" href="assets/img/favicon.png">
       
        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,700&amp;subset=latin-ext" rel="stylesheet">
       
        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="/index/css/plugins.css">
        <link rel="stylesheet" type="text/css" href="/index/css/main.css">
        
        
    </head>
<body>

    
       
        <!-- HERO -->
        <div class="hero">
          
          
           <!-- FRONT CONTENT -->
           <div class="front-content">

              
               <!-- CONTAINER MID -->
               <div class="container-mid">
                 
                  <h1>
                    @if(isset($code))
                    {{$code}}
                    @else
                    404
                    @endif
                  </h1>
                  <p class="subline">
                    @if(isset($msg))
                    {{$msg}}
                    @else
                    你访问的页面不存在!
                    @endif</p>
                  <a href="/">返回首页</a>  

               </div>
               <!-- /CONTAINER MID -->
           </div>
           <!-- /FRONT CONTENT -->
          
          
           <!-- BACKGROUND CONTENT -->
           <div class="background-content">
              
               <div class="background-overlay"></div>
               <div class="background-img"></div>

           </div>
           <!-- /BACKGROUND CONTENT -->

       
        </div>
        <!-- /HERO -->
        
        
        <!-- JAVASCRIPTS -->
        <script type="/index/text/javascript" src="js/plugins.js"></script>
        <script type="/index/text/javascript" src="js/main.js"></script>
   
   
    </body> 
    
    
</html>