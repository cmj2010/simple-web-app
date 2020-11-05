<center>
<table class='table table-bordered'>
<tr><th>Meta-Data</th><th>Value</th></tr>
<?php
  #The URL root is the AWS meta data service URL where metadata
  # requests regarding the running instance can be made
  $urlRoot="http://169.254.169.254/latest/meta-data/";
  $instanceId = file_get_contents($urlRoot . 'instance-id');
  $availabilityZone = file_get_contents($urlRoot . 'placement/availability-zone');
  # Get the instance ID from meta-data and print to the screen
  echo "<tr><td>InstanceId</td><td><i>" . $instanceId . "</i></td><tr>";
  # Availability Zone
  echo "<tr><td>Availability Zone</td><td><i>" . $availabilityZone . "</i></td><tr>";
  # Get Remote IP
  echo "<tr><td>Remote IP</td><td><i>" . $_SERVER['REMOTE_ADDR'] . "</i></td><tr>";
?>
</center>
<?php
//This is a simple EC2_metadata example for testing with RDS

// RDS configuration
  $rdsURL = "sample2.c0xukwf0j31z.rds.cn-northwest-1.amazonaws.com.cn";
  $rdsDB = "myapp";
  $rdsUser = "fortinet";
  $rdsPwd = "fortinet";

// Get remote IP
  $remoteIp = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "";

// Connect to the RDS database
  $mysqli = new mysqli($rdsURL, $rdsUser, $rdsPwd, $rdsDB);

// Set mysql connection character set
  if (!$mysqli->set_charset('utf8')) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit;
  }

// Insert data into ec2_metadata tbale in RDS
  $sql = "INSERT INTO ec2_metadata (instanceId, availabilityZone, remoteIp)
        VALUES ('${instanceId}', '${availabilityZone}', '${remoteIp}')";
  if (!$mysqli->query( $sql))
    echo "<div>Error: " . $sql . "<br>" . $mysqli->error . "</div>";

 $mysqli->close();
?>