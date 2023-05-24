<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>PHP Calculator</h2>
        <form method="post" action="">
            <div class="form-group">
                <input type="text" class="form-control" name="num1" placeholder="Masukan number 1" >
            </div>
            <div class="form-group">
                <select class="form-control" name="operator" required>
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="num2" placeholder="Masukan number 2">
            </div>
            <div class="container">
        <h2>Konversi US Dolar ke Indonesia Rupiah</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="usd" placeholder="Masukan Jumlah dolar">
            </div>
           
<div class="container">
        <h2>Konversi Indonesia Rupiah ke US Dolar</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="idr" placeholder="Masukan Jumlah Rupiah">
            </div>
</div>
<div class="form-group">
<h2>pilih mode</h2>
                <select class="form-control" name="mode" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>  
                    <option value="12">12</option>  
                    <option value="13">13</option>  
                    <option value="14">14</option>  
                    <option value="15">15</option>  
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>

        <?php
        class Calculator {
            public function calculate($num1, $num2, $operator) {
                switch ($operator) {
                    case '+':
                        return $num1 + $num2;
                    case '-':
                        return $num1 - $num2;
                    case '*':
                        return $num1 * $num2;
                    case '/':
                        if ($num2 != 0) {
                            return $num1 / $num2;
                        } else {
                            return "Division by zero error";
                        }
                    default:
                        return "Invalid operator";
                }
            }

            public function convertCurrency($amount, $fromCurrency, $toCurrency) {
               
                $conversionRate =14.941;

                $convertedAmount = $amount * $conversionRate;
                return $convertedAmount;
            }

            public function convertCurrency2($amount2, $fromCurrency2, $toCurrency2) {
               
                $conversionRate = 0.000067;

                $convertedAmount = $amount2 * $conversionRate;
                return $convertedAmount;
            }

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if($_POST["mode"] == 1){
                echo "<h4>menggunakan mode 1</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 2){
                echo "<h4>menggunakan mode 2</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 3){
                echo "<h4>menggunakan mode 3</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 4){
                echo "<h4>menggunakan mode 4</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 5){
                echo "<h4>menggunakan mode 5</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 6){
                echo "<h4>menggunakan mode 6</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 7){
                echo "<h4>menggunakan mode 7</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 8){
                echo "<h4>menggunakan mode 8</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 9){
                echo "<h4>menggunakan mode 9</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 10){
                echo "<h4>menggunakan mode 10</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 12){
                echo "<h4>menggunakan mode 12</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 11){
                echo "<h4>menggunakan mode 11</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 13){
                echo "<h4>menggunakan mode 13</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 14){
                echo "<h4>menggunakan mode 14</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }
            else if($_POST["mode"] == 15){
                echo "<h4>menggunakan mode 15</h4>";
                if ($_POST["num1"] != null &&  $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null){
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
        
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
    
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operator = $_POST["operator"];
        
                    $calculator = new Calculator();
                    $result = $calculator->calculate($num1, $num2, $operator);
                    echo "<h4>Hasil penjumlahan: " . $result . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
    
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
                    
                    $calculator = new Calculator();
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    $calculator = new Calculator();
                   
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
                else if ($_POST["num1"] != null && $_POST["num2"] == null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
                    
                    $calculator = new Calculator();
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] != null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                
                    $amount2 =$_POST["idr"]; 
                    $fromCurrency2 = "IDR"; 
                    $toCurrency2 = "USD"; 
                   
                    $convertedAmount2 = $calculator->convertCurrency2($amount2, $fromCurrency2, $toCurrency2);
                    echo "<h4>hasil konversi USD." . $convertedAmount2. " " . $toCurrency2 . "</h4>";
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] != null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                    $calculator = new Calculator();
                    $amount =$_POST["usd"]; 
                    $fromCurrency = "USD"; 
                    $toCurrency = "IDR"; 
        
                    $convertedAmount = $calculator->convertCurrency($amount, $fromCurrency, $toCurrency);
                    echo "<h4>hasil konversi Rp." . $convertedAmount . " " . $toCurrency . "</h4>";
                }
    
                else if ($_POST["num1"] != null && $_POST["num2"] = null && $_POST["usd"] == null && $_POST["idr"] == null) {
                    echo "<h4>Number ke 1
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
                else if ($_POST["num1"] == null && $_POST["num2"] != null && $_POST["usd"] == null && $_POST["idr"] = null) {
                    echo "<h4>Number ke 2
                    pada tools kalkulator
                    kosong kakak</h4>";
    
                }
    
                else{
                    echo "<h4>Tidak ada yang bisa dikerjakan adik adik</h4>";
                }
            }

           
        }
        ?>
    </div>
</body>
</html>
