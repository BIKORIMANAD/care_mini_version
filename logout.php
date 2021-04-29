<?php
session_start();
session_destroy();
?>
<span class=success>Success</span>
<script>setTimeout("window.location='./'",1000);</script>