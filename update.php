<!DOCTYPE html>
<html>
  <head>
    <title>Update</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #ff0000;
      }
      h1 {
      margin: 0 0 20px;
      font-weight: 400;
      color: #1c87c9;
      }
      p {
      margin: 0 0 5px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #000000;
      }
      form {
      padding: 25px;
      margin: 25px;
      box-shadow: 0 2px 5px #f5f5f5; 
      background: #000000; 
      }
      .fas {
      margin: 25px 10px 0;
      font-size: 72px;
      color: #fff;
      }
      .fa-envelope {
      transform: rotate(-20deg);
      }
      .fa-at , .fa-mail-bulk{
      transform: rotate(10deg);
      }
      input, textarea {
      width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #1c87c9;
      outline: none;
      }
      input::placeholder {
      color: #666;
      }
      button {
      width: 100%;
      padding: 10px;
      border: none;
      background: #ff0505; 
      font-size: 16px;
      font-weight: 400;
      color: #000000;
      }
      button:hover {
      background: #ff0000;
      }    
      @media (min-width: 568px) {
      .main-block {
      flex-direction: row;
      }
      .left-part, form {
      width: 50%;
      }
      .fa-envelope {
      margin-top: 0;
      margin-left: 20%;
      }
      .fa-at {
      margin-top: -10%;
      margin-left: 65%;
      }
      .fa-mail-bulk {
      margin-top: 2%;
      margin-left: 28%;
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
      </div>
      <form action="usermof.php" method="POST" >
        <h1>Update Profile
        </h1>
        <div class="info">
        
        <input class="ider" type="text" name="id" placeholder="<?= $_POST['modif']?>" value="<?= $_POST['modif']?>">
          <input class="fname" type="text" name="name" placeholder="Full name">
          <input type="text" name="Email" placeholder="Email">
          <input type="text" name="Age" placeholder="Age">
        </div>
        <label for="pet-select">Choose a plan:</label>

<select name="plans" id="plan-select">
    <option value="">--Please choose an option--</option>
    <option value="IPTV">IPTV</option>
    <option value="VOD">VOD</option>
    <option value="Audio_Books">Audio_Books</option>
   
</select>
<br>
<br>
<br>
<br>
<br>

        <button type="submit" href="/">Apply</button>
      </form>
      
      
      


     

    </div>
  </body>
</html>
