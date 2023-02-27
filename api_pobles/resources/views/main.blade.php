@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title>API test</title>

       <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
    </head>
    <body>
        <style>

            .navbar{
                background: linear-gradient(135deg, #f2cd06, #ac0707);

            }

            a{
                color: white !important;
            }
            .header{
                height: 191px;
                background: linear-gradient(135deg, #f2cd06, #ac0707);
                margin-top: -40px;
                padding: 20px 0;
                width: 100%;
                margin-bottom: 15px;
                -webkit-box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.2), 0 13px 24px -11px rgba(242, 204, 0, 0.6);
                box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.2), 0 13px 24px -11px rgba(242, 204, 0, 0.6);
                border-radius: 6px;
            }

            .center {
                margin: auto;
               
              
                padding: 10px;
            }

            .input{
                border-radius: 1rem;
                border: #c95a07;
                border-top-style: none;
                border-right-style: none;
                border-bottom-style: none;
                border-left-style: none;
                height: 3rem;
                border-style: solid;
            }

            .card-style{
                -webkit-box-shadow: 17px 12px 10px 3px #dddddd;
                -moz-box-shadow: 17px 12px 10px 3px #dddddd;
                box-shadow: 17px 12px 10px 3px #dddddd;
                border-radius: 2rem;
                transition: transform .2s;
            }

            .card-style:hover{
                -webkit-box-shadow: 17px 12px 10px 3px #dddddd;
                -moz-box-shadow: 17px 12px 10px 3px #dddddd;
                box-shadow: 17px 12px 10px 3px #dddddd;
                border-radius: 2rem;
                transform: scale(1.05);
            }


           

            .filter{
                border-radius: 1rem;
                border-color: #c04107;
              
                border-style: solid;

            }

        </style>

        <div class="header">
            <div class="container">
                <div class="row center" style="margin-top: 9rem;">
                    <div class="col-md-8">
                        
                        <input class="w-100 input" type="text" id="q" placeholder="Cercar..." onkeyup="search()">
                    </div>
                    <div class="col">
                        <div class="mb-3">
                           
                            <select class="form-select form-select-lg filter" name="" id="filter">
                                <option value="name" selected>Nom</option>
                                <option value="com">Comarca</option>
                                <option value="prov">Provincia</option>
                            </select>
                            
                        </div>
                    </div>
                
                </div>
                
            </div>
            
        </div>
        
        <div class="container my-5"  >
            
            <div class="row row-cols-1 row-cols-md-3 g-4" id="the_table_body" style="margin-top: 6rem;">
               
                    @foreach($characters as $character)
                   
                        <div class="col">
                            <a style="color:black !important; text-decoration: none !important;" href="http://www.google.com/maps/place/ <?php echo $character["latitud"] ?>,<?php echo $character["longitud"] ?>" target="_blank">
                                <div class="card card-style">
                                    <div class="card-body">
                                        <h2 class="card-title text-center">{{$character["nom"]}}  <i  style="color: #e14b4b;" class="fa-solid fa-location-dot"></i></h2>
                                        <h4 class="card-text text-center">Provincia: {{$character["provincia"]}}</h4>
                                        <?php $img = str_replace("50" , "350" ,$character["img"]) ?>
                                        <img class="" src="{{$img}}" height="300"  style="border-radius: 10rem; width: 83% !important; margin-left: 2rem;border-style: solid;">
                                        <br>
                                        <p class="card-text text-center">Comarca: {{$character["comarca"]}}</p>
                                        <p class="card-text text-center">Descripcio: {{$character["descripcio"]}}</p>
                                        
                                    </div>
                                </div>
                            </a> 
                        </div>
                   
                    @endforeach 
                    
        </div>
      
</div>
    </body>
</html>
<script type="text/javascript">
    function search(){
        var num_cols, display, input, filter, table_body, div, h2, i, txtValue;
        num_cols = 3;
        input = document.getElementById("q");
        filter = input.value.toUpperCase();
        table_body = document.getElementById("the_table_body");
        tr = table_body.getElementsByTagName("div");

        for(i=0; i< tr.length; i++){				
            display = "none";
            for(j=0; j < num_cols; j++){

                
                if($( "#filter" ).val() == "name"){
                    td = tr[i].getElementsByTagName("h2")[j];
                }else if($( "#filter" ).val() == "com"){
                    td = tr[i].getElementsByTagName("p")[j];
                }else if($( "#filter" ).val() == "prov"){
                    td = tr[i].getElementsByTagName("h4")[j];
                }
                
                if(td){
                    txtValue = td.textContent || td.innerText;
                    if(txtValue.toUpperCase().indexOf(filter) > -1){
                        display = "";
                    }
                }
            }
            tr[i].style.display = display;
        }
    }		
</script>

@endsection