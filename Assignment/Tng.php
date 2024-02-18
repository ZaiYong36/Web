<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touch'N Go Payment page</title>
    <body background="https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></body>

</head>
<style>
    #qr1{
        background-color: aqua;
        width: 600px;
        height: 600px;
        text-align: center;
        font-size: 100px;
        position: relative;
        left: 450px;
}
#bttonrtrn{
    position: relative;
    left: 450px;
}
#bttonrfrshqr{
    position: relative;
    left: 852px;
}
</style>
<body>
    <h1 style="color:greenyellow;">Please Scan The QR Code To Make Payment</h1>
    <div id="qr1">
        <img src="qrcode.png" width="600px" height="600px">
    </div>
    <a href="Payment.php"><button id="bttonrtrn" style="font-size: 15px;">Return</button></a>
    <a href="receipt.php"><button id="bttonrfrshqr" style="font-size: 15px;">Refresh QR Code</button></a>
</body>
</html>
