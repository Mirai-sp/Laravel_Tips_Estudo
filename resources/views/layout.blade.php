<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudos com o Laravel</title>
<style>

    * {
         margin: 0px;
         padding: 0px;
         font-family: Arial, Helvetica, sans-serif;        
         outline: none;
      }

    input, textarea {
        border: 2px solid #424242;
        border-radius: 5px;
        padding: 7px;
        transition-duration: 0.5s;
    }

    input, textarea:focus {
        border: 2px solid #137d00;
        transition-duration: 0.5s;
    }

    button {
        border : 0px;        
        padding: 5px;
        background: #313331;
        border-radius: 5px;
        color: white;
        transition-duration: 0.5s;
    }

    button:hover {
        background: #1f211f;
        transition-duration: 0.5s;
    }

    .tim {
        border: 0;
        padding: 0;
        display: inline;
        background: none;
        color: white;
        font-weight: bold;
        transition-duration: 0.5s;
    }


    .tim:hover {
        cursor: pointer;    
        color: darkred;
        transition-duration: 0.5s;
    }

    body {    
        background-color: #3d3b3b;
    }

    .container {
        display: flex;        
        justify-content: center;
        /*align-items: center; */
        margin: 10px;
        padding: 10px;
        background-color: #4a4c4f;
        border-radius: 10px;  
    }

    .content {
        justify-content: start;
    }

    h1 {
        color: white;
        font-size: 1.25em;
        margin-bottom: 5px;
        text-shadow: 2px 2px rgba(0,0,0,0.26);;
    }

    a {
        color: white;
        text-decoration: none;
        padding-right: 10px;
        font-weight: bold;
        transition-duration: 0.4s;
    }

    a:hover {
        transition-duration: 0.4s;
        color:darkred;
    }

    table {
        border: 1px solid #232829;    
        border-collapse: separate;
        overflow: hidden;
        border-spacing: 0;
        border-radius: 5px;
        box-shadow: 0px 9px 29px 4px rgba(0,0,0,0.26);
        margin-bottom: 20px;
        /*padding: 5px;*/
    }

    tr td {
        padding: 5px;
    }

    td {
        font-size: 0.9em;
    }

    thead td {
        background-color: #4f4f4f;     
        border-right: 1px solid black;
        border-bottom: 1px solid black;
    }

    thead td:last-child {
        border-right: none;
    }
    

    tbody tr {
        background-color: #6b6b6b ;        
        transition-duration: 0.5s;
    }

    tbody tr:nth-child(even) {        
        background-color: #737373;        
        /*background-color: #6b6b6b ;*/
        transition-duration: 0.5s;
    }

    tbody tr:hover {
        background-color: #969696;
        transition-duration: 0.5s;
    }



</style>
</head>
<body>
   <div class="container">
       <div class="content">
            @yield('content') 
       </div>
   </div>
</body>
</html>