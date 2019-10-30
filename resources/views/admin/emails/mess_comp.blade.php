<!DOCTYPE html>
<html>
<head>
<title>Suggestion Email</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr> <td>Dear Company!</td></tr>
  <tr><td>User Suggestion details are below:</td></tr>
  <tr><td>{{ $reason }}</td></tr>
</table>

</body>
</html>