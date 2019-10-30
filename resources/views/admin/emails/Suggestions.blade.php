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
  <tr> <td>Dear Admin!</td></tr>
  <tr><td>User Suggestion details are below:</td></tr>
  <tr><td>Fname:{{ $fname }}</td></tr>
  <tr><td>lname:{{ $lname }}</td></tr>
  <tr><td>Email:{{ $email }}</td></tr>
  <tr><td>Subject:{{ $subject }}</td></tr>
  <tr><td>Message:{{ $comment }}</td></tr>
</table>

</body>
</html>