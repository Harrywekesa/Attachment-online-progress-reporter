<html>
<title>Logged In</title>
<body>
<h2>Logged in sample page</h2>
<h3><?php echo json_encode($this->session->userdata('admin')); ?></h3>
</body>
</html>