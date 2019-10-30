
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>
</head>
<body>
 <?php $total_all = 0 ?>
 <center>
<h2>Medicens Store</h2>
<img src="/final_proje/public/uplode/blog2.jpg" width="100" height="100" class="img-responsive"/>
<center>
<p>Thank you for order your order details is below :</p>

<table>
  <tr>
    <th>Name product</th>
    <th>price</th>
    <th>quantity</th>
    <th>total</th>
  </tr>

          
 @foreach($name_pro as $details)
<tr>
<td>{{ $details->name_pro }}</td>
<td>{{ $details->price }}</td>
<td>{{ $details->quantity }}</td>
<td>{{ $details->price*$details->quantity }}</td>

  <?php $total_all += $details->price  * $details->quantity ?>
</tr>
   @endforeach
      
</table>
total 

<label>{{ $total_all }}</label>
</body>
</html>


      