<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/frontend/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Agrobd</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    @stack('css')
</head>
<body>
@include('layouts.frontend.partial.header')
<!---------featured category--------->

<!---------featured category--------->

@yield('contain')

<!---------Offer--------->

<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('assets/frontend/image/offer.png') }}" height="450px" width="400" class="offer-img">
            </div>
            <dir class="col-2">
                <p>Exculusiv Offer Avaliable</p>
                <h1>Tracktor Motor Indian</h1>
                <small>The indian tracktor has the comfort and
                    <br>convenience features to keep you smiling
                    even during the longest day<br></small>
                <a href="" class="btn">Buy Now &#8594;</a>
            </dir>
        </div>
    </div>
</div>
@include('layouts.frontend.partial.footer')
<div class="copyright">
    <p>Copyright @ 2021 SP2 member</p>
</div>
<!--add idem doggle-->

<!--end add idem doggle-->
<!----------js toggle-------->

<script>
    var menuitem = document.getElementById("menuitem");
    menuitem.style.maxHeight = "0px";
    function menutoggle(){
        if( menuitem.style.maxHeight == "0px"){
            menuitem.style.maxHeight = "200px";
        }
        else{
            menuitem.style.maxHeight = "0px";
        }
    }
</script>
@stack('js')
</body>
</html>
