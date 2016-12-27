<?php
session_start();
session_destroy();
?>
<script>window.open('login.php?logged_out=true', '_self');</script>
