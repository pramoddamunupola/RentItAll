<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body{
        justify-content: center;
        align-items: center;
    }
    .header {
    width: 100%;
    height: 140px; 
    border: none;
    left: 0;
    position: relative;
            }
    footer {
    width: 100%;
    height: 170px;
    border: none;
    position: fixed;
    bottom: 0;
    left: 0;
    
            }
    .footer{
        width: 100%;
        height: 100%;
        bottom: 0;
        padding: 0;
    }
    iframe{
        height: 170px;
        bottom: 0;
        width: 100%;
        border: none;
        
    }
    .container{
        max-width: 1300px;
        justify-content: center;
        margin: 0 auto;
    }
    .back{
        width: 150px;
        height: 30px;
        background-color: #387478;
        color: white;
        border-radius: 5px 5px 5px 5px;
        border: none;
        font-size: 15px;
        box-sizing: border-box;
        
    }
    .navigation{
        display: flex;
        justify-content: space-between;
        margin-left: 10px;
        
        
    }
    .search-bar {
      display: flex;
      margin-right: 10px;
      
        
    }

    .search-bar input {
      width: 400px;
      height: 30px;
      font-size: 14px;
      padding-left: 20px;
      background-color: whitesmoke;
      border: solid 1px black;
      border-radius: 5px 0 0 5px;
    }

    .search-bar button {
      padding-left: 10px;
      padding-right: 10px;
      border-radius: 0 5px 5px 0;
      border: none;
      color: white;
      background-color: rgb(126, 39, 39);
      font-size: 14px;
      cursor: pointer;
      
    }
    .body1{
        display: flex;
        margin-left: 10px;
        margin-right: 10px;
        justify-content: center;
    }
    .leftnavigation{
        display: flex;
        flex-direction: column;
        width: 150px;
        background-color:#629584;
        color: white;
        text-align: left;
        padding-left: 20px;
        padding-bottom: 20px;
        margin-top: 20px;
        margin-right:10px;
        box-sizing:content-box;
    }
    .items{
        background-color: #E2F1E7;
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 20px;
        box-sizing: border-box;
    }
    .items{
        background-color: #E2F1E7;
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 20px;
        box-sizing: border-box;
        padding: 10px;
        gap: 10px;
        
    }
    .item{
        display: flex;
        gap: 10px;
        background-color: #c9c9c9;
        max-height: 150px;
    }
    img{
        width:30%;
        max-width: 250px;
        height: auto;
    }
    .details{
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        
    }
    </style>
</head>
<body>
    <header><iframe src="header.html" class="header"></iframe></header>
   <div class="container"> 
    <div class="navigation"><div class="back"><button class="back" onclick="history.back()"><i class="fa fa-angle-left"></i> Back</button></div>
                            <div class="search-bar">
                                <input type="text" placeholder="Search your items">
                                <button>Search</button>
                              </div>
    </div>
    <div class = body1>
        <div class="leftnavigation">
            <h4>Categories</h4>
            <br>
            <p>Vehicles</p>
            <p>Properties</p>
            <p>Tools</p>
            <p>Party Items</p>
            <p>Others</p>
        </div>

        <div class="items">
            <div class="item">
                <img src="recources/test.jpg">
                <div class="details">
                <p>Masserati</p>
                <p>price:</p>
                <p>location</p>
                <p>example</p>
                </div>
        </div>
    </div>
    </div>
   <footer><iframe src="footer.html"></iframe></footer>
</body>
</html>